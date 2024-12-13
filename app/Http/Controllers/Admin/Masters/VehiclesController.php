<?php

namespace App\Http\Controllers\Admin\Masters;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\Masters\StoreVehicles;
use App\Http\Requests\Admin\Masters\UpdateVehicles;
use App\Models\vehicles;
use App\Models\vehicleType;
use App\Models\CapacityOfVehicle;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class VehiclesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vehicles = vehicles::whereNull('deleted_by')->get();
        $vehicleType = vehicleType::whereNull('deleted_by')->get();

        return view('admin.masters.vehicles')->with(['vehicles'=> $vehicles, 'vehicleType' => $vehicleType]);
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
    public function store(StoreVehicles $request)
    {
        try
        {

            DB::beginTransaction();

            $input = $request->validated();
            $vehicle = vehicles::create($input); // Save vehicle first and get the ID if necessary

            if (isset($request->total_capacity) && count($request->total_capacity) > 0) {
                for ($i = 0; $i < count($request->total_capacity); $i++) {

                        CapacityOfVehicle::create([
                            'vehicle_id' => $vehicle->id,
                            'waste_types' => $request->waste_types[$i],
                            'capacity_in_kg' => $request->capacity_in_kg[$i],
                            'total_capacity' => $request->total_capacity[$i],
                            'ip_address' => $request->ip(),
                        ]);
                    // }
                }
            }

            DB::commit();

            return response()->json(['success'=> 'vehicles created successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'creating', 'vehicles');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $vehicles = DB::table('vehicles')->where('id', $id)->first();
        $wasteManagements = DB::table('capacity_of_vehicles')->whereNull('deleted_at')->where('vehicle_id', $id)->get();

        if ($vehicles) {
            $response = [
                'result' => 1,
                'vehicles' => $vehicles,
                'wasteManagements' => $wasteManagements
            ];
        } else {
            $response = ['result' => 0];
        }
        return $response;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateVehicles $request, string $id)
    {
        try
        {

            DB::beginTransaction();

            $input = $request->validated();
            $vehicle = vehicles::find($id); // Save vehicle first and get the ID if necessary
            $vehicle->update($input);
            if (isset($request->total_capacity) && count($request->total_capacity) > 0) {
                CapacityOfVehicle::where('vehicle_id', $vehicle->id)->delete();

                for ($i = 0; $i < count($request->total_capacity); $i++) {

                        CapacityOfVehicle::create([
                            'vehicle_id' => $vehicle->id,
                            'waste_types' => $request->waste_types[$i],
                            'capacity_in_kg' => $request->capacity_in_kg[$i],
                            'total_capacity' => $request->total_capacity[$i],
                            'ip_address' => $request->ip(),
                        ]);
                    // }
                }
            }

            DB::commit();

            return response()->json(['success'=> 'vehicles created successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'creating', 'vehicles');
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
            DB::table('vehicles')->where('id', $id)->update([
                'deleted_by' => auth()->user()->id,
                'deleted_at' => now(),
            ]);
            DB::commit();

            return response()->json(['success'=> 'vehicles deleted successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'deleting', 'vehicles');
        }
    }

    /**
     * Handle AJAX response for exceptions.
     */
    public function respondWithAjax($e, $action, $model)
    {
        // Log the error message
        \Log::error("Error during $action action for $model: " . $e->getMessage());

        // Return a JSON response with error details
        return response()->json([
            'error' => 'Something went wrong!',
            'message' => $e->getMessage(),
            'code' => $e->getCode()
        ], 500); // HTTP 500 is for server errors
    }
}
