<?php

namespace App\Http\Controllers\Admin\Masters;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\Masters\StoreCollectionType;
use App\Http\Requests\Admin\Masters\UpdateCollectionType;
use App\Models\CollectionType;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class CollectionTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $CollectionType = CollectionType::latest()->get();

        return view('admin.masters.collectionType')->with(['CollectionType'=> $CollectionType]);
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
    public function store(StoreCollectionType $request)
    {
        try
        {
            DB::beginTransaction();
            $input = $request->validated();
            CollectionType::create( $input );
            DB::commit();

            return response()->json(['success'=> 'collection type created successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'creating', 'collection type');
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
    public function edit(CollectionType $CollectionType)
    {
        if ($CollectionType)
        {
            $response = [
                'result' => 1,
                'CollectionType' => $CollectionType,
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
    public function update(UpdateCollectionType $request, CollectionType $CollectionType)
    {
        try
        {
            DB::beginTransaction();
            $input = $request->validated();
            $CollectionType->update( $input );
            DB::commit();

            return response()->json(['success'=> 'collectionType updated successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'updating', 'collectionType');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CollectionType $CollectionType)
    {try
        {
            DB::beginTransaction();
            $CollectionType ->delete();
            DB::commit();

            return response()->json(['success'=> 'CollectionType deleted successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'deleting', 'CollectionType');
        }
    }
    }

