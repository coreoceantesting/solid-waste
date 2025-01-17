<?php

namespace App\Http\Controllers\Admin\Masters;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\Masters\StoreCollectionCenter;
use App\Http\Requests\Admin\Masters\UpdateCollectionCenter;
use App\Models\collectionCenters;
use App\Models\VehicleDetails;
use App\Models\EmployeeDetails;
use App\Models\VehicleType;
use App\Models\Designation;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class CollectionCenterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $collectionCenters = collectionCenters::latest()->get();
        $vehicledetails = VehicleDetails::whereNull('deleted_by')->get();
        $employeedetails = EmployeeDetails::whereNull('deleted_by')->get();
        $vehicletype = VehicleType::whereNull('deleted_at')->get();
        $designation = Designation::whereNull('deleted_at')->get();

        return view('admin.masters.collectionCenter')->with([
            'collectionCenters' => $collectionCenters,
            'VehicleDetails' => $vehicledetails,
            'VehicleType' => $vehicletype,
            'Designation'=> $designation
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCollectionCenter $request)
    {
        try {
            DB::beginTransaction();
            $input = $request->validated();

            // File Upload: p_view
            if ($request->hasFile('p_views')) {
                $Doc = $request->file('p_views');
                $DocPath = $Doc->store('p_view', 'public');
                $input['p_view'] = $DocPath;
            }

            // File Upload: m_view
            if ($request->hasFile('m_views')) {
                $Doc = $request->file('m_views');
                $DocPath = $Doc->store('m_view', 'public');
                $input['m_view'] = $DocPath;
            }
            // dd($request->all());
            // Insert Collection Center
            $collectionCenter = collectionCenters::create($input);

            // $vehicletype = VehicleType::create($input);
            // $designation = Designation::create($input);

            // Insert Vehicle Details
            if (isset($request->vehicle_type) && count($request->available_count) > 0) {
                for ($i = 0; $i < count($request->vehicle_type); $i++) {
                    VehicleDetails::create([
                        'collection_id' => $collectionCenter->id,
                        'vehicle_id'=> $request->vehicle_type[$i],
                        'vehicle_type' => $request->vehicle_type[$i],
                        'available_count' => $request->available_count[$i],
                        'required_count' => $request->required_count[$i],
                        'ip_address' => $request->ip(),
                    ]);
                }
            }

            if (isset($request->designation) && count($request->available_count) > 0) {
                for ($i = 0; $i < count($request->designation); $i++) {
                    EmployeeDetails::create([
                        'collection_id' => $collectionCenter->id,
                        'designation_id'=> $request->designation[$i],
                        'designation' => $request->designation[$i],
                        'available_count' => $request->emp_available_count[$i],
                        'required_count' => $request->emp_required_count[$i],
                        'ip_address' => $request->ip(),
                    ]);
                }
            }

            DB::commit();

            return response()->json(['success' => 'Collection Center created successfully!']);
        } catch (\Exception $e) {
            return $this->respondWithAjax($e, 'creating', 'Collection Center');
        }
    }

    public function show(string $id)
    {
        try {
            // Retrieve the VehicleSchedulingInformation by ID
            $collectionCenters = collectionCenters::findOrFail($id);

            // Retrieve related VehicleInformation for this vehicle scheduling ID
            // $VehicleDetails = VehicleDetails::where('collection_id', $id)
            //                                         ->whereNull('deleted_at')  // Ensure deleted data is not included
            //                                         ->get();
            $VehicleDetails = VehicleDetails::join('vehicle_types','vehicle_details.vehicle_id','=','vehicle_types.id')
                                              ->where('vehicle_details.collection_id',$id)
                                              ->select('vehicle_details.*','vehicle_types.name')
                                              ->get();

            $EmployeeDetails = EmployeeDetails::join('designations','employee_details.designation_id','=','designations.id')
                                                ->where('employee_details.collection_id',$id)
                                                ->select('employee_details.*','designations.name')  // Ensure deleted data is not included
                                                ->get();

            // Return the data as a JSON response
            return response()->json([
                'result' => 1,
                'collectionCenters' => $collectionCenters,
                'VehicleDetails' => $VehicleDetails,
                'EmployeeDetails' => $EmployeeDetails
            ]);
        } catch (\Exception $e) {
            // Return error response in case of failure
            return response()->json([
                'result' => 0,
                'message' => 'Error retrieving vehicle scheduling information.',
                'error' => $e->getMessage(),
            ]);
        }
    }

    /**
     * Edit the specified resource.
     */
    public function edit(string $id)
    {
        $collectionCenters = DB::table('collection_centers')->where('id', $id)->first();
        $VehicleDetails = DB::table('vehicle_details')->whereNull('deleted_at')->where('collection_id', $id)->get();
        $EmployeeDetails = DB::table('employee_details')->whereNull('deleted_at')->where('collection_id', $id)->get();

        if ($collectionCenters) {
            return response()->json([
                'result' => 1,
                'collectionCenters' => $collectionCenters,
                'vehicleDetails' => $VehicleDetails,
                'employeedetails' => $EmployeeDetails
            ]);
        } else {
            return response()->json(['result' => 0]);
        }
    }

    public function update(UpdateCollectionCenter $request, string $id)
    {
        try {
            DB::beginTransaction();

            // Validate the request input
            $input = $request->validated();

            // Find the collection center by ID
            $collectionCenters = collectionCenters::find($id);
            if (!$collectionCenters) {
                return response()->json(['error' => 'Collection center not found']);
            }

            // File Upload: p_view
            if ($request->hasFile('p_views')) {


                $Doc = $request->file('p_views');
                $DocPath = $Doc->store('p_view', 'public');
                $input['p_view'] = $DocPath;

                // Delete the old file if it exists
                if ($collectionCenters->p_view && Storage::disk('public')->exists($collectionCenters->p_view)) {
                    Storage::disk('public')->delete($collectionCenters->p_view);
                }
            }

            // File Upload: m_view
            if ($request->hasFile('m_views')) {
                $Doc = $request->file('m_views');
                $DocPath = $Doc->store('m_view', 'public');
                $input['m_view'] = $DocPath;

                // Delete the old file if it exists
                if ($collectionCenters->m_view && Storage::disk('public')->exists($collectionCenters->m_view)) {
                    Storage::disk('public')->delete($collectionCenters->m_view);
                }
            }

            // Update the collection center details
            $collectionCenters->update($input);

            // Update Vehicle Details
            if (isset($request->vehicle_type) && count($request->available_count) > 0) {
                VehicleDetails::where('collection_id', $collectionCenters->id)->delete();
                for ($i = 0; $i < count($request->vehicle_type); $i++) {
                    VehicleDetails::create([
                        'collection_id' => $collectionCenters->id,
                        'vehicle_id' => $request->vehicle_type[$i],
                        'vehicle_type' => $request->vehicle_type[$i],
                        'available_count' => $request->available_count[$i],
                        'required_count' => $request->required_count[$i],
                        'ip_address' => $request->ip(),
                    ]);
                }
            }

            // Update Employee Details
            if (isset($request->designation) && count($request->available_count) > 0) {
                EmployeeDetails::where('collection_id', $collectionCenters->id)->delete();
                for ($i = 0; $i < count($request->designation); $i++) {
                    EmployeeDetails::create([
                        'collection_id' => $collectionCenters->id,
                        'designation_id' => $request->designation[$i],
                        'designation' => $request->designation[$i],
                        'available_count' => $request->emp_available_count[$i],
                        'required_count' => $request->emp_required_count[$i],
                        'ip_address' => $request->ip(),
                    ]);
                }
            }

            DB::commit();
            return response()->json(['success' => 'Collection center updated successfully!']);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['error' => 'Something went wrong', 'message' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            DB::beginTransaction();

            $collectionCenter = collectionCenters::findOrFail($id);
            $collectionCenter->update([
                'deleted_by' => auth()->user()->id,
                'deleted_at' => now(),
            ]);

            DB::commit();

            return response()->json(['success' => 'Collection Center deleted successfully!']);
        } catch (\Exception $e) {
            return $this->respondWithAjax($e, 'deleting', 'Collection Center');
        }
    }

    /**
     * Handle AJAX exceptions and send a standard JSON response.
     */
    private function respondWithAjax($e, $action, $model)
    {
        // Log the error
        \Log::error("Error {$action} {$model}: " . $e->getMessage());

        // Return a standardized JSON response
        return response()->json([
            'error' => true,
            'message' => "An error occurred while {$action} the {$model}. Please try again later.",
            'details' => $e->getMessage(),
        ], 500);
    }
}
