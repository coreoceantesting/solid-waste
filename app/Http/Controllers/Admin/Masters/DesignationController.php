<?php

namespace App\Http\Controllers\Admin\Masters;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\Masters\StoreDesignation;
use App\Http\Requests\Admin\Masters\UpdateDesignation;
use App\Models\Designation;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class DesignationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Designation = Designation::whereNull('deleted_by')->get();

        return view('admin.masters.designation')->with(['Designation'=> $Designation]);
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
    public function store(StoreDesignation $request)
    {
        try
        {

            DB::beginTransaction();
            $input = $request->validated();
            Designation::create( $input );
            DB::commit();

            return response()->json(['success'=> 'Designation created successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'creating', 'Designation');
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
        $Designation=DB::table('designations')->where('id', $id)->first();
        if ($Designation)
        {
            $response = [
                'result' => 1,
                'Designation' => $Designation,
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
    public function update(UpdateDesignation $request, string $id)
    {
        try
        {
            DB::beginTransaction();
            $input = $request->validated();
            DB::table('designations')->where('id', $id)->update($input);
            DB::commit();

            return response()->json(['success'=> 'designations updated successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'updating', 'designations');
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
            DB::table('designations')->where('id', $id)->update([
                'deleted_by' => auth()->user()->id,
                'deleted_at' => now(),

            ]);
            DB::commit();

            return response()->json(['success'=> 'designations deleted successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'deleting', 'designations');

    }
    }
}
