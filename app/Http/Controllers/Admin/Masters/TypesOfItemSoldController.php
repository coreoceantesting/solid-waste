<?php

namespace App\Http\Controllers\Admin\Masters;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\Masters\StoreTypesOfItemSold;
use App\Http\Requests\Admin\Masters\UpdateTypesOfItemSold;
use App\Models\TypesOfItemSold;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;



class TypesOfItemSoldController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $TypesOfItemSold = TypesOfItemSold::whereNull('deleted_by')->get();

       return view('admin.masters.typesOfItemSold')->with(['TypesOfItemSold'=> $TypesOfItemSold]);

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
    public function store(StoreTypesOfItemSold $request)
    {
        try
        {

            DB::beginTransaction();
            $input = $request->validated();
            TypesOfItemSold::create( $input );
            DB::commit();

            return response()->json(['success'=> 'Types Of Item Sold created successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'creating', 'Types Of Item Sold');
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
        $TypesOfItemSold=DB::table('types_of_item_solds')->where('id', $id)->first();
        if ($TypesOfItemSold)
        {
            $response = [
                'result' => 1,
                'TypesOfItemSold' => $TypesOfItemSold,
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
    public function update(UpdateTypesOfItemSold $request, string $id)
    {
        try
        {
            DB::beginTransaction();
            $input = $request->validated();
            DB::table('types_of_item_solds')->where('id', $id)->update($input);
            DB::commit();

            return response()->json(['success'=> 'Types Of Item Sold updated successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'updating', 'TypesOfItemSold');
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
            DB::table('types_of_item_solds')->where('id', $id)->update([
                'deleted_by' => auth()->user()->id,
                'deleted_at' => now(),

            ]);
            DB::commit();

            return response()->json(['success'=> 'types of item solds deleted successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'deleting', 'types of item solds');

    }

    }
}
