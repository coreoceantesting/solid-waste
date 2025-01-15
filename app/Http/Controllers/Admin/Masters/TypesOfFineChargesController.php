<?php

namespace App\Http\Controllers\Admin\Masters;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\Masters\StoreTypesOfFineCharges;
use App\Http\Requests\Admin\Masters\UpdateTypesOfFineCharges;
use App\Models\TypesOfFineCharges;
use Illuminate\Support\Facades\DB;

class TypesOfFineChargesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $TypesOfFineCharges = TypesOfFineCharges::whereNull('deleted_by')->get();
        return view('admin.masters.TypesOfFineCharges')->with(['TypesOfFineCharges' => $TypesOfFineCharges]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Optional: Return a view for creating a new record
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTypesOfFineCharges $request)
    {
        try {
            DB::beginTransaction();

            $input = $request->validated();
            TypesOfFineCharges::create($input);

            DB::commit();
            return response()->json(['success' => 'Types Of Fine Charges created successfully!']);
        } catch (\Exception $e) {
            DB::rollBack();
            return $this->respondWithAjax($e, 'creating', 'Types Of Fine Charges');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Optional: Return details of a specific record
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $TypesOfFineCharges = TypesOfFineCharges::find($id);

        if ($TypesOfFineCharges) {
            return response()->json([
                'result' => 1,
                'TypesOfFineCharges' => $TypesOfFineCharges,
            ]);
        }

        return response()->json(['result' => 0]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTypesOfFineCharges $request, string $id)
    {
        try {
            DB::beginTransaction();

            $input = $request->validated();
            $fineCharge = TypesOfFineCharges::findOrFail($id);
            $fineCharge->update($input);

            DB::commit();
            return response()->json(['success' => 'Types Of Fine Charges updated successfully!']);
        } catch (\Exception $e) {
            DB::rollBack();
            return $this->respondWithAjax($e, 'updating', 'Types Of Fine Charges');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            DB::beginTransaction();

            $fineCharge = TypesOfFineCharges::findOrFail($id);
            $fineCharge->update([
                'deleted_by' => auth()->user()->id,
                'deleted_at' => now(),
            ]);

            DB::commit();
            return response()->json(['success' => 'Types Of Fine Charges deleted successfully!']);
        } catch (\Exception $e) {
            DB::rollBack();
            return $this->respondWithAjax($e, 'deleting', 'Types Of Fine Charges');
        }
    }

    /**
     * Handle exceptions and respond with JSON.
     */
    protected function respondWithAjax(\Exception $e, string $action, string $resource)
    {
        return response()->json([
            'error' => true,
            'message' => "An error occurred while $action the $resource. Details: {$e->getMessage()}",
        ], 500);
    }
}
