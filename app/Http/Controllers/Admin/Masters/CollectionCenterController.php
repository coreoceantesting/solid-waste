<?php

namespace App\Http\Controllers\Admin\Masters;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\Masters\StoreCollectionCenter;
use App\Http\Requests\Admin\Masters\UpdateCollectionCenter;
use App\Models\collectionCenters;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class CollectionCenterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $collectionCenters = collectionCenters::latest()->get();

        return view('admin.masters.collectionCenter')->with(['collectionCenters'=> $collectionCenters]);
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
    public function store(StoreCollectionCenter $request)
    {
        try
        {
            DB::beginTransaction();
            $input = $request->validated();
            if ($request->hasFile('p_view')) {
                $Doc = $request->file('p_view');
                $DocPath = $Doc->store('p_view', 'public');
                $input['p_view'] = $DocPath;
            }
            if ($request->hasFile('m_view')) {
                $Doc = $request->file('m_view');
                $DocPath = $Doc->store('m_view', 'public');
                $input['m_view'] = $DocPath;
            }
            collectionCenters::create( $input );
            DB::commit();

            return response()->json(['success'=> 'Collection Center created successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'creating', 'Collection Center');
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
        $collectionCenters =  DB::table('collection_centers')->where('id', $id)->first();
        // dd($collectionCenters);
        if ($collectionCenters)
        {
            $response = [
                'result' => 1,
                'collectionCenters' => $collectionCenters,
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
    public function update(UpdateCollectionCenter $request, string $id)
    {
        try
        {

            DB::beginTransaction();
            $input = $request->validated();
            DB::table('collection_centers')->where('id', $id)->update($input);
            DB::commit();

            return response()->json(['success'=> 'collection centers updated successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'updating', 'CollectionCenter');
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
            DB::table('collection_centers')->where('id', $id)->update([
                'deleted_by' => auth()->user()->id,
                'deleted_at' => now(),

            ]);
            // $CensusYears->delete();
            DB::commit();

            return response()->json(['success'=> 'CollectionCenter deleted successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'deleting', 'CollectionCenter');
        }

    }
}
