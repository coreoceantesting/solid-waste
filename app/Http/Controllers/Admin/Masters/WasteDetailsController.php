<?php

namespace App\Http\Controllers\Admin\Masters;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\Masters\StoreWasteDetails;
use App\Http\Requests\Admin\Masters\UpdateWasteDetails;
use App\Models\WasteDetails;
use App\Models\Segregation;
use App\Models\collectionCenters;
use App\Models\CapacityOfVehicle;
use App\Models\Prefix;
use App\Models\PrefixDetails;
use Illuminate\Support\Facades\DB;

class WasteDetailsController extends Controller
{
    /**
     * Display a listing of the resources.
     */
    public function index()
    {
        $WasteDetails = WasteDetails::whereNull('deleted_at')->get();
        $Segregation = Segregation::whereNull('deleted_at')->get();
        $collectionCenters = collectionCenters::whereNull('deleted_at')->get();
        $CapacityOfVehicle = CapacityOfVehicle::whereNull('deleted_at')->get();

        $Prefix = DB::table('prefixes')->where('Prefix_Name','WST')->whereNull('deleted_at')->first();
        $PrefixDetails = DB::table('prefix_details')->where('Main_Prefix',$Prefix->id)->whereNull('deleted_at')->get();

        return view('admin.masters.wasteDetails')->with([
            'WasteDetails' => $WasteDetails,
            'Segregation' => $Segregation,
            'collectionCenters'=>$collectionCenters,
            'CapacityOfVehicle'=>$CapacityOfVehicle,
            'PrefixDetails'=>$PrefixDetails,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreWasteDetails $request)
    {
        try {
            DB::beginTransaction();

            $input = $request->validated();
            $WasteDetails = WasteDetails::create($input);


            if (isset($request->waste_type) && count($request->waste_sub_type1) > 0) {
                for ($i = 0; $i < count($request->waste_sub_type1); $i++) {
                    Segregation::create([
                        'waste_detail_id' => $WasteDetails->id,
                        'waste_type' => $request->waste_type[$i],
                        'waste_sub_type1' => $request->waste_sub_type1[$i],
                        'waste_sub_type2' => $request->waste_sub_type2[$i],
                        'volume' => $request->volume[$i],
                        'ip_address' => $request->ip(),
                    ]);
                }
            }

            DB::commit();

            return response()->json(['success' => 'Waste Details created successfully!']);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['error' => 'Error creating Waste Details: ' . $e->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            // Retrieve the VehicleSchedulingInformation by ID///
            $WasteDetails = WasteDetails::findOrFail($id);

            // Retrieve related VehicleInformation for this vehicle scheduling ID
            $Segregation = Segregation::with(['WasteType'])->where('waste_detail_id', $id)
                                                    ->whereNull('deleted_at')  // Ensure deleted data is not included
                                                    ->get();

            // $Segregation = Segregation::join('prefix_details','segregations.waste_type','=','prefix_details.Main_Prefix')
            //              ->where('segregations.waste_detail_id',$id)
            //              ->select('segregations.*','prefix_details.value')
            //              ->get();
            // Return the data as a JSON response
            return response()->json([
                'result' => 1,
                'WasteDetails' => $WasteDetails ,
                'Segregation' => $Segregation,
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
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // $WasteDetails = WasteDetails::find($id);
        $WasteDetails = DB::table('waste_details')->where('id', $id)->first();
        $Segregation = DB::table('segregations')->whereNull('deleted_at')->where('waste_detail_id', $id)->get();
        if ($WasteDetails) {
            return response()->json([
                'result' => 1,
                'WasteDetails' => $WasteDetails,
                'Segregation'=> $Segregation
            ]);
        }

        return response()->json(['result' => 0, 'message' => 'WasteDetails not found.'], 404);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateWasteDetails $request, string $id)
    {
        try {
            DB::beginTransaction();

            $input = $request->validated();
            // $WasteDetails = WasteDetails::find($id);

            $WasteDetails = WasteDetails::find($id);
            if (!$WasteDetails) {
                return response()->json(['error' => 'Waste Details not found']);
            }

            // Update the collection center details
            $WasteDetails->update($input);

            // Check if vehicle data is provided in the request
            if (isset($request->waste_type) && count($request->waste_sub_type1) > 0) {
                // Loop through each vehicle type and create vehicle details
                Segregation::where('waste_detail_id', $WasteDetails->id)->delete();
                for ($i = 0; $i < count($request->waste_type); $i++) {
                    Segregation::create([
                        'waste_detail_id' => $WasteDetails->id, // Use correct variable name
                        'waste_type' => $request->waste_type[$i], // Use vehicle_type from the request
                        'waste_sub_type1' => $request->waste_sub_type1[$i], // Same value as vehicle_id
                        'waste_sub_type2' => $request->waste_sub_type2[$i],
                        'volume' => $request->volume[$i],
                        'ip_address' => $request->ip(),
                    ]);
                }
            }

            // $WasteDetails->update($input);

            DB::commit();

            return response()->json(['success' => 'Waste Details updated successfully!']);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['error' => 'Error updating Waste Details: ' . $e->getMessage()], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            DB::beginTransaction();

            $WasteDetails = WasteDetails::find($id);

            if (!$WasteDetails) {
                return response()->json(['error' => 'Waste Details not found.'], 404);
            }

            $WasteDetails->update([
                'deleted_by' => auth()->user()->id,
                'deleted_at' => now(),
            ]);

            DB::commit();

            return response()->json(['success' => 'WasteDetails deleted successfully!']);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['error' => 'Error deleting Waste Details: ' . $e->getMessage()], 500);
        }
    }
}
