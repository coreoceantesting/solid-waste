<?php

namespace App\Http\Controllers\Admin\Masters;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\Masters\StoreMaintenanceTypes;
use App\Http\Requests\Admin\Masters\UpdateMaintenanceTypes;
use App\Models\MaintenanceTypes;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class MaintenanceTypesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $MaintenanceTypes = MaintenanceTypes::whereNull('deleted_by')->get();

        return view('admin.masters.maintenanceTypes')->with(['MaintenanceTypes'=> $MaintenanceTypes]);
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
    public function store(StoreMaintenanceTypes $request)
    {
        try
        {

            DB::beginTransaction();
            $input = $request->validated();
            MaintenanceTypes::create( $input );
            DB::commit();

            return response()->json(['success'=> 'Maintenance Typese created successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'creating', 'Maintenance Types');
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
        $MaintenanceTypes=  DB::table('maintenance_types')->where('id', $id)->first();
        if ($MaintenanceTypes)
        {
            $response = [
                'result' => 1,
                'MaintenanceTypes' => $MaintenanceTypes,
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
    public function update(UpdateMaintenanceTypes $request, string $id)
    {
        try
        {
            DB::beginTransaction();
            $input = $request->validated();
            DB::table('maintenance_types')->where('id', $id)->update($input);
            DB::commit();

            return response()->json(['success'=> 'maintenance types type updated successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'updating', 'maintenancetypes');
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
            DB::table('maintenance_types')->where('id', $id)->update([
                'deleted_by' => auth()->user()->id,
                'deleted_at' => now(),

            ]);
            DB::commit();

            return response()->json(['success'=> 'maintenance types deleted successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'deleting', 'maintenance typestype');
        }
    }
}
