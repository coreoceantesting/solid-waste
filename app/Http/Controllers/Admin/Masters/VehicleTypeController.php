<?php

namespace App\Http\Controllers\Admin\Masters;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\Masters\StoreVehicleType;
use App\Http\Requests\Admin\Masters\UpdateVehicleType;
use App\Models\VehicleType;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class VehicleTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $VehicleType = VehicleType::whereNull('deleted_by')->get();

        return view('admin.masters.VehicleType')->with(['VehicleType'=> $VehicleType]);

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
    public function store(StoreVehicleType $request)
    {
        try
        {

            DB::beginTransaction();
            $input = $request->validated();
            VehicleType::create( $input );
            DB::commit();

            return response()->json(['success'=> 'Vehicle Type created successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'creating', 'Vehicle Type');
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
        $VehicleType=DB::table('vehicle_types')->where('id', $id)->first();
        if ($VehicleType)
        {
            $response = [
                'result' => 1,
                'VehicleType' => $VehicleType,
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
    public function update(UpdateVehicleType $request, string $id)
    {
        try
        {
            DB::beginTransaction();
            $input = $request->validated();
            DB::table('vehicle_types')->where('id', $id)->update($input);
            DB::commit();

            return response()->json(['success'=> 'Vehicle Type updated successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'updating', 'VehicleType');
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
            DB::table('vehicle_types')->where('id', $id)->update([
                'deleted_by' => auth()->user()->id,
                'deleted_at' => now(),

            ]);
            DB::commit();

            return response()->json(['success'=> 'types of item solds deleted successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'deleting', 'vehicle types');

    }
}
}
