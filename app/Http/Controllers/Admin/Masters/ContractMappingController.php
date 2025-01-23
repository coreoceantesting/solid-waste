<?php

namespace App\Http\Controllers\Admin\Masters;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\Masters\StoreContractMapping;
use App\Http\Requests\Admin\Masters\UpdateContractMapping;
use App\Models\ContractMapping;
use App\Models\TaskMapping;
use App\Models\SlrmEmployeeDetails;
use App\Models\CapacityOfVehicle;
use App\Models\Ward;
use App\Models\Prefix;
use App\Models\PrefixDetails;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class ContractMappingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ContractMapping = ContractMapping::latest()->get();
        $taskmappings = TaskMapping::whereNull('deleted_at')->get();
        $SlrmEmployeeDetails = SlrmEmployeeDetails::whereNull('deleted_at')->get();
        $CapacityOfVehicle = CapacityOfVehicle::whereNull('deleted_at')->get();
        $Ward = Ward::whereNull('deleted_at')->get();
        // $Prefix = Prefix::whereNull('deleted_at')->get();

        $ZonePrefix = DB::table('prefixes')->where('Prefix_Name', 'Zn')->whereNull('deleted_at')->first();
        $ZoneDetails = [];
        if ($ZonePrefix) {
            $ZoneDetails = DB::table('prefix_details')->where('Main_Prefix', $ZonePrefix->id)->whereNull('deleted_at')->get();
        }
// Retrieve Waste Type Prefix Details
        $WasteTypePrefix = DB::table('prefixes')->where('Prefix_Name', 'WST')->whereNull('deleted_at')->first();
        $WasteTypeDetails = [];
        if ($WasteTypePrefix) {
            $WasteTypeDetails = DB::table('prefix_details')->where('Main_Prefix', $WasteTypePrefix->id)->whereNull('deleted_at')->get();
        }
        return view('admin.masters.contractMapping')->with(['ContractMapping'=> $ContractMapping,'TaskMapping'=> $taskmappings,'SlrmEmployeeDetails'=>$SlrmEmployeeDetails,'CapacityOfVehicle'=>$CapacityOfVehicle,'Ward'=>$Ward, 'ZonePrefix'=>$ZonePrefix,'ZoneDetails'=>$ZoneDetails,'WasteTypePrefix'=>$WasteTypePrefix,'WasteTypeDetails'=>$WasteTypeDetails]);
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
    public function store(StoreContractMapping $request)
    {
        try
        {
            DB::beginTransaction();
            $input = $request->validated();
            $ContractMapping = ContractMapping::create( $input );

            if (isset($request->zone) && count($request->ward) > 0) {
                for ($i = 0; $i < count($request->colony); $i++) {
                    TaskMapping::create([
                        'contract_mapping_id' => $ContractMapping->id,
                        'zone'=> $request->zone[$i],
                        'ward' => $request->ward[$i],
                        'colony' => $request->colony[$i],
                        'society' => $request->society[$i],
                        'task' => $request->task[$i],
                        'waste_type' => $request->waste_type[$i],
                        'garbage_volume' => $request->garbage_volume[$i],
                        'beat_number' => $request->beat_number[$i],
                        'employee_count' => $request->employee_count[$i],
                        'vehicle_count' => $request->vehicle_count[$i],
                        'ip_address' => $request->ip(),
                    ]);
                }
            }
            DB::commit();

            return response()->json(['success'=> 'Contract Mapping created successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'creating', 'Contract Mapping');
        }

    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            // Retrieve the VehicleSchedulingInformation by ID
            $ContractMapping = ContractMapping::findOrFail($id);

            // Retrieve related VehicleInformation for this vehicle scheduling ID
            // $TaskMapping = TaskMapping::where('contract_mapping_id', $id)
            //                                         ->whereNull('deleted_at')  // Ensure deleted data is not included
            //                                         ->get();


            $TaskMapping = TaskMapping::join('prefix_details as zone_details', 'task_mappings.zone', '=', 'zone_details.Main_Prefix')
            ->join('prefix_details as waste_details', 'task_mappings.waste_type', '=', 'waste_details.Main_Prefix')
            ->where('task_mappings.contract_mapping_id', $id)
            ->select(
                'task_mappings.*',
                'zone_details.value as zone_value',
                'waste_details.value as waste_type_value'
            )
            ->get();

            // $TaskMapping = TaskMapping::join('prefix_details','task_mappings.waste_type','=','prefix_details.Main_Prefix')
            //              ->where('task_mappings.contract_mapping_id',$id)
            //              ->select('task_mappings.*','prefix_details.value')
            //              ->get();

            // Return the data as a JSON response
            return response()->json([
                'result' => 1,
                'ContractMapping' => $ContractMapping ,
                'TaskMapping' => $TaskMapping,
            ]);
        } catch (\Exception $e) {
            // Return error response in case of failure
            return response()->json([
                'result' => 0,
                'message' => 'Error retrieving task mapping.',
                'error' => $e->getMessage(),
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $ContractMapping =  DB::table('contract_mappings')->where('id', $id)->first();
        $TaskMapping = DB::table('task_mappings')->whereNull('deleted_at')->where('contract_mapping_id', $id)->get();
        if ($ContractMapping)
        {
            $response = [
                'result' => 1,
                'ContractMapping' => $ContractMapping,
                'TaskMapping'=> $TaskMapping
            ];
        }
        else
        {
            $response = ['result' => 0];
        }
        return $response;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateContractMapping $request, string $id)
    {
        try
        {
            DB::beginTransaction();
            $input = $request->validated();

            // Find the ContractMapping by ID
            $ContractMapping = ContractMapping::find($id);
            if (!$ContractMapping) {
                return response()->json(['error' => 'Contract Mapping not found']);
            }

            // Update the ContractMapping details
            $ContractMapping->update($input);

            // Check if vehicle data is provided in the request
            if (isset($request->zone) && count($request->zone) > 0) {
                // Delete the existing TaskMapping for this ContractMapping
                TaskMapping::where('contract_mapping_id', $ContractMapping->id)->delete();

                // Loop through each vehicle type and create TaskMapping entries
                for ($i = 0; $i < count($request->ward); $i++) {
                    TaskMapping::create([
                        'contract_mapping_id' => $ContractMapping->id,  // Correct reference
                        'zone' => $request->zone[$i],  // Correct value assignment
                        'ward' => $request->ward[$i],  // Correct value assignment
                        'colony' => $request->colony[$i],  // Correct value assignment
                        'society' => $request->society[$i],
                        'task' => $request->task[$i],
                        'waste_type' => $request->waste_type[$i],
                        'garbage_volume' => $request->garbage_volume[$i],
                        'beat_number' => $request->beat_number[$i],
                        'employee_count' => $request->employee_count[$i],
                        'vehicle_count' => $request->vehicle_count[$i],
                        'ip_address' => $request->ip(),
                    ]);
                }
            }

            DB::commit();
            return response()->json(['success'=> 'Contract Mapping updated successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'updating', 'Contract Mapping');
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try
        {
            DB::beginTransaction();
            DB::table('contract_mappings')->where('id', $id)->update([
                'deleted_by' => auth()->user()->id,
                'deleted_at' => now(),

            ]);
            DB::commit();

            return response()->json(['success'=> 'Contract Mappings deleted successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'deleting', 'ContractMappings');
        }
    }
}
