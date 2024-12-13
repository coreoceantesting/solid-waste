<?php

namespace App\Http\Controllers\Admin\Masters;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\Masters\StoreTypesOfFineCharges;
use App\Http\Requests\Admin\Masters\UpdateTypesOfFineCharges;
use App\Models\TypesOfFineCharges;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;


class TypesOfFineChargesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $TypesOfFineCharges = TypesOfFineCharges::whereNull('deleted_by')->get();

        return view('admin.masters.TypesOfFineCharges')->with(['TypesOfFineCharges'=> $TypesOfFineCharges]);
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
    public function store(StoreTypesOfFineCharges $request)
    {
        try
        {

            DB::beginTransaction();
            $input = $request->validated();
            TypesOfFineCharges::create( $input );
            DB::commit();

            return response()->json(['success'=> 'Types Of Fine Charges created successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'creating', 'Types Of Fine Charges');
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
        $TypesOfFineCharges =  DB::table('types_of_fine_charges')->where('id', $id)->first();
        if ($TypesOfFineCharges)
        {
            $response = [
                'result' => 1,
                'TypesOfFineCharges' => $TypesOfFineCharges,
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
    public function update(UpdateTypesOfFineCharges $request, string $id)
    {
        try
        {
            DB::beginTransaction();
            $input = $request->validated();
            DB::table('Types_Of_Fine_Charges')->where('id', $id)->update($input);
            DB::commit();

            return response()->json(['success'=> 'TypesOfFineCharges updated successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'updating', 'TypesOfFineCharges');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {try
        {
            DB::beginTransaction();
            DB::table('Types_Of_Fine_Charges')->where('id', $id)->update([
                'deleted_by' => auth()->user()->id,
                'deleted_at' => now(),

            ]);
            DB::commit();

            return response()->json(['success'=> 'TypesOfFineCharges deleted successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'deleting', 'TypesOfFineCharges');
        }
    }
}
