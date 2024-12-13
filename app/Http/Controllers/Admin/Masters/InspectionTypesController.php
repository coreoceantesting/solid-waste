<?php

namespace App\Http\Controllers\Admin\Masters;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\Masters\StoreInspectionTypes;
use App\Http\Requests\Admin\Masters\UpdateInspectionTypes;
use App\Models\InspectionType;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class InspectionTypesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $InspectionType = InspectionType::whereNull('deleted_by')->get();

        return view('admin.masters.InspectionType')->with(['InspectionType'=> $InspectionType]);

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
    public function store(StoreInspectionTypes $request)
    {
        try
        {

            DB::beginTransaction();
            $input = $request->validated();
            InspectionType::create( $input );
            DB::commit();

            return response()->json(['success'=> 'Inspection Types created successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'creating', 'Inspection Types');
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
        $InspectionTypes =  DB::table('inspection_types')->where('id', $id)->first();
        if ($InspectionTypes)
        {
            $response = [
                'result' => 1,
                'InspectionTypes' => $InspectionTypes,
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
    public function update(UpdateInspectionTypes $request, string $id)
    {
        try
        {
            DB::beginTransaction();
            $input = $request->validated();
            DB::table('inspection_types')->where('id', $id)->update($input);
            DB::commit();

            return response()->json(['success'=> 'InspectionTypes updated successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'updating', 'InspectionTypes');
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
            DB::table('inspection_types')->where('id', $id)->update([
                'deleted_by' => auth()->user()->id,
                'deleted_at' => now(),

            ]);
            DB::commit();

            return response()->json(['success'=> 'inspection types deleted successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'deleting', 'InspectionTypes');
        }
    }
}
