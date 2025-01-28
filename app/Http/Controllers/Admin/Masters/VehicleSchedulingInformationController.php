<?php

namespace App\Http\Controllers\Admin\Masters;

use App\Http\Controllers\Admin\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\Masters\StoreVehicleSchedulingInformation;
use App\Http\Requests\Admin\Masters\UpdateVehicleSchedulingInformation;
use App\Models\VehicleSchedulingInformation;
use App\Models\vehicles;
use App\Models\VehicleInformation;
use App\Models\Ward;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class VehicleSchedulingInformationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $VehicleSchedulingInformation = VehicleSchedulingInformation::whereNull('deleted_by')->get();
        $vehicles = vehicles::whereNull('deleted_at')->get();
        $VehicleInformation = VehicleInformation::whereNull('deleted_at')->get();
        $Ward = Ward::whereNull('deleted_at')->get();


        return view('admin.masters.vehicleSchedulingInformation')->with(['vehicleSchedulingInformation'=> $VehicleSchedulingInformation,'vehicles'=>$vehicles,'VehicleInformation'=>$VehicleInformation,'Ward'=>$Ward]);

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
    public function store(StoreVehicleSchedulingInformation $request)
    {
        try
        {

            DB::beginTransaction();
            $input = $request->validated();
            $VehicleSchedulingInformation = VehicleSchedulingInformation::create( $input );

            if (isset($request->employee_name) && count($request->employee_name) > 0) {
                for ($i = 0; $i < count($request->employee_name); $i++) {
                    if (!empty($request->waste_gen_type[$i])) {
                        VehicleInformation::create([
                            'vehicle_scheduling_id'=>$VehicleSchedulingInformation->id,
                            'beat_number' => $request->beat_number[$i],
                            'employee_name' => $request->employee_name[$i],
                            'waste_gen_type' => $request->waste_gen_type[$i],
                            'in_time' => $request->in_time[$i],
                            'out_time' => $request->out_time[$i],
                            'ip_address' => $request->ip(),
                        ]);
                    }
                }
            }

            DB::commit();

            return response()->json(['success'=> 'Collection Scheduling created successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'creating', 'Collection Scheduling');
        }

    }

    /**
     * Display the specified resource.
     */
    /**
 * Display the specified resource.
 */
public function show(string $id)
{
    try {
        // Retrieve the VehicleSchedulingInformation by ID
        $vehicleSchedulingInformation = VehicleSchedulingInformation::findOrFail($id);

        // Retrieve related VehicleInformation for this vehicle scheduling ID
        $vehicleInformation = VehicleInformation::where('vehicle_scheduling_id', $id)
                                                ->whereNull('deleted_at')  // Ensure deleted data is not included
                                                ->get();

        // Return the data as a JSON response
        return response()->json([
            'result' => 1,
            'vehicleSchedulingInformation' => $vehicleSchedulingInformation,
            'vehicleInformation' => $vehicleInformation,
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
        $vehicleSchedulingInformation=DB::table('vehicle_scheduling_information')->where('id', $id)->first();

        $VehicleInformation = DB::table('vehicle_information')->whereNull('deleted_at')->where('vehicle_scheduling_id', $id)->get();

        if ($vehicleSchedulingInformation)
        {
            $response = [
                'result' => 1,
                'vehicleSchedulingInformation' => $vehicleSchedulingInformation,
                'VehicleInformation' => $VehicleInformation
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
    public function update(UpdateVehicleSchedulingInformation $request, string $id)
    {
        try
        {
            DB::beginTransaction();
            $input = $request->validated();
            // DB::table('vehicle_scheduling_information')->where('id', $id)->update($input);

              // Find the collection center by ID
              $VehicleSchedulingInformation = VehicleSchedulingInformation::find($id);
              if (!$VehicleSchedulingInformation) {
                  return response()->json(['error' => 'Collection center not found']);
              }

              // Update the collection center details
              $VehicleSchedulingInformation->update($input);

              // Check if vehicle data is provided in the request
              if (isset($request->beat_number) && count($request->employee_name) > 0) {
                  // Loop through each vehicle type and create vehicle details
                  VehicleInformation::where('vehicle_scheduling_id', $VehicleSchedulingInformation->id)->delete();
                  for ($i = 0; $i < count($request->employee_name); $i++) {
                    VehicleInformation::create([
                          'vehicle_scheduling_id' => $VehicleSchedulingInformation->id, // Use correct variable name
                          'beat_number' => $request->beat_number[$i], // Use vehicle_type from the request
                          'employee_name' => $request->employee_name[$i], // Same value as vehicle_id
                          'waste_gen_type' => $request->waste_gen_type[$i],
                          'in_time' => $request->in_time[$i],
                          'out_time' => $request->out_time[$i],
                          'ip_address' => $request->ip(),
                      ]);
                  }
              }
            DB::commit();

            return response()->json(['success'=> 'Collection Scheduling updated successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'updating', 'Collection Scheduling');
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
            DB::table('vehicle_scheduling_information')->where('id', $id)->update([
                'deleted_by' => auth()->user()->id,
                'deleted_at' => now(),

            ]);
            DB::commit();

            return response()->json(['success'=> 'Collection Scheduling!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'deleting', 'Collection Scheduling');

        }
    }
}

//     // public function getVehicalDetails(Request $request){
//     //     if($request->ajax()){
//     //         // dd($request->all());
//     //     }
//     // }
// }
