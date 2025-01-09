<?php

namespace App\Http\Controllers\Admin\Masters;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\Masters\StoreLocalityServiceType;
use App\Http\Requests\Admin\Masters\UpdateLocalityServiceType;
use App\Models\LocalityServiceType;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class LocalityServiceTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $LocalityServiceType = LocalityServiceType::whereNull('deleted_by')->get();

        return view('admin.masters.localityservicetype')->with(['LocalityServiceType'=> $LocalityServiceType]);

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
    public function store(StoreLocalityServiceType $request)
    {
        try
        {

            DB::beginTransaction();
            $input = $request->validated();
            LocalityServiceType::create( $input );
            DB::commit();

            return response()->json(['success'=> 'Locality Service Type created successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'creating', 'Locality Service Type');
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
        $LocalityServiceType =  DB::table('locality_service_types')->where('id', $id)->first();
        if ($LocalityServiceType)
        {
            $response = [
                'result' => 1,
                'LocalityServiceType' => $LocalityServiceType,
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
    public function update(UpdateLocalityServiceType $request, string $id)
    {
        try
        {
            DB::beginTransaction();
            $input = $request->validated();
            DB::table('locality_service_types')->where('id', $id)->update($input);
            DB::commit();

            return response()->json(['success'=> 'locality service type updated successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'updating', 'LocalityServiceType');
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
            DB::table('locality_service_types')->where('id', $id)->update([
                'deleted_by' => auth()->user()->id,
                'deleted_at' => now(),

            ]);
            DB::commit();

            return response()->json(['success'=> 'locality service type deleted successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'deleting', 'locality service type');
        }

    }
}
