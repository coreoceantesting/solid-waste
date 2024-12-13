<?php

namespace App\Http\Controllers\Admin\Masters;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\Masters\StoreCollectionTransport;
use App\Http\Requests\Admin\Masters\UpdateCollectionTransport;
use App\Models\collectionTransport;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class CollectionTransportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $collectionTransport = collectionTransport::latest()->get();

        return view('admin.masters.collectionTransport')->with(['collectionTransport'=> $collectionTransport]);
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
    public function store(StoreCollectionTransport $request)
    {
        try
        {
            DB::beginTransaction();
            $input = $request->validated();
            collectionTransport::create( $input );
            DB::commit();

            return response()->json(['success'=> 'collection Transport created successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'creating', 'collection Transport');
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
        $collectionTransport =  DB::table('collection_transports')->where('id', $id)->first();
        if ($collectionTransport)
        {
            $response = [
                'result' => 1,
                'collectionTransport' => $collectionTransport,
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
    public function update(UpdateCollectionTransport $request, string $id)
    {
        try
        {
            DB::beginTransaction();
            $input = $request->validated();
            DB::table('collection_transports')->where('id', $id)->update($input);
            DB::commit();

            return response()->json(['success'=> 'collectiontransports updated successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'updating', 'collectiontransports');
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
            DB::table('collection_transports')->where('id', $id)->update([
                'deleted_by' => auth()->user()->id,
                'deleted_at' => now(),

            ]);
            DB::commit();

            return response()->json(['success'=> 'collection transports deleted successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'deleting', 'collectiontransports');
        }
    }
}
