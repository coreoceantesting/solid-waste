<?php

namespace App\Http\Controllers\Admin\Masters;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\Masters\StoreVehicleTarget;
use App\Http\Requests\Admin\Masters\UpdateVehicleTarget;
use App\Models\VehicleTarget;
use App\Models\VehicleTargetDetail;
use App\Models\vehicles;
use App\Models\Ward;
use Illuminate\Support\Facades\DB;

class VehicleTargetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $VehicleTarget = VehicleTarget::whereNull('deleted_by')->get();
        $VehicleTargetDetail = VehicleTargetDetail::whereNull('deleted_by')->get();
        $vehicles = vehicles::whereNull('deleted_by')->get();
        $Ward = Ward::whereNull('deleted_by')->get();

        $Prefix = DB::table('prefixes')->where('Prefix_Name','Un')->whereNull('deleted_at')->first();
        $PrefixDetails = DB::table('prefix_details')->where('Main_Prefix',$Prefix->id)->whereNull('deleted_at')->get();

        return view('admin.masters.vehicleTarget')->with(['VehicleTarget' => $VehicleTarget,'VehicleTargetDetail' => $VehicleTargetDetail,'vehicles' =>$vehicles,'Ward'=>$Ward,'Prefix'=> $Prefix ,'PrefixDetails'=> $PrefixDetails]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreVehicleTarget $request)
    {
        try {
            DB::beginTransaction();

            $input = $request->validated();
            $VehicleTarget = VehicleTarget::create($input);

            if (isset($request->vehicle_number) && count($request->vehicle_number) > 0) {
                for ($i = 0; $i < count($request->vehicle_number); $i++) {
                    VehicleTargetDetail::create([
                        'vehicle_target_id' => $VehicleTarget->id,
                        'vehicle_number' => $request->vehicle_number[$i],
                        'beat_number' => $request->beat_number[$i],
                        'garbage_volumne' => $request->garbage_volumne[$i],
                        'ip_address' => $request->ip(),
                    ]);
                }
            }

            DB::commit();

            return response()->json(['success' => 'Vehicle Target created successfully!']);
        } catch (\Exception $e) {
            return $this->respondWithAjax($e, 'creating', 'Vehicle Target');
        }
    }

    public function show(string $id)
    {
        try {
            // Retrieve the VehicleSchedulingInformation by ID
            $VehicleTarget = VehicleTarget::findOrFail($id);

            // Retrieve related VehicleInformation for this vehicle scheduling ID
            $VehicleTargetDetail = VehicleTargetDetail::where('vehicle_target_id', $id)
                                                    ->whereNull('deleted_at')  // Ensure deleted data is not included
                                                    ->get();

            // Return the data as a JSON response
            return response()->json([
                'result' => 1,
                'VehicleTarget' => $VehicleTarget,
                'VehicleTargetDetail' => $VehicleTargetDetail,
            ]);
        } catch (\Exception $e) {
            // Return error response in case of failure
            return response()->json([
                'result' => 0,
                'message' => 'Error retrieving vehicle target.',
                'error' => $e->getMessage(),
            ]);
        }

    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $VehicleTarget = DB::table('vehicle_targets')->where('id', $id)->first();
        $VehicleTargetDetail = DB::table('vehicle_target_details')->whereNull('deleted_at')->where('vehicle_target_id', $id)->get();

        if ($VehicleTarget) {
            $response = [
                'result' => 1,
                'VehicleTarget' => $VehicleTarget,
                'VehicleTargetDetail'=>$VehicleTargetDetail
            ];
        } else {
            $response = ['result' => 0];
        }

        return $response;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateVehicleTarget $request, string $id)
    {
        try {
            DB::beginTransaction();

            $input = $request->validated();

            // Find the collection center by ID
            $VehicleTarget = VehicleTarget::find($id);
            if (!$VehicleTarget) {
                return response()->json(['error' => 'Vehicle Target not found']);
            }

            // Update the collection center details
            $VehicleTarget->update($input);

            // Check if vehicle data is provided in the request
            if (isset($request->vehicle_number) && count($request->beat_number) > 0) {
                // Loop through each vehicle type and create vehicle details
                VehicleTargetDetail::where('vehicle_target_id', $VehicleTarget->id)->delete();
                for ($i = 0; $i < count($request->vehicle_number); $i++) {
                    VehicleTargetDetail::create([
                        'vehicle_target_id' => $VehicleTarget->id, // Use correct variable name
                        // 'vehicle_id' => $collectionCenters->id, // Use vehicle_type from the request
                        'vehicle_number' => $request->vehicle_number[$i], // Same value as vehicle_id
                        'beat_number' => $request->beat_number[$i],
                        'garbage_volumne' => $request->garbage_volumne[$i],
                        'ip_address' => $request->ip(),
                    ]);
                }
            }

            // DB::table('vehicle_targets')->where('id', $id)->update($input);

            DB::commit();

            return response()->json(['success' => 'Vehicle targets updated successfully!']);
        } catch (\Exception $e) {
            return $this->respondWithAjax($e, 'updating', 'Vehicle Target');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            DB::beginTransaction();

            DB::table('vehicle_targets')->where('id', $id)->update([
                'deleted_by' => auth()->user()->id,
                'deleted_at' => now(),
            ]);

            DB::commit();

            return response()->json(['success' => 'Vehicle targets deleted successfully!']);
        } catch (\Exception $e) {
            return $this->respondWithAjax($e, 'deleting', 'Vehicle targets');
        }
    }

    /**
     * Custom method to handle exceptions and provide consistent AJAX responses.
     */
    protected function respondWithAjax(\Exception $e, string $action, string $resource)
    {
        DB::rollBack();

        return response()->json([
            'error' => "An error occurred while $action the $resource.",
            'message' => $e->getMessage(),
        ], 500);
    }
}
