<?php

namespace App\Http\Controllers\Admin\Masters;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\Masters\StorePopulation;
use App\Http\Requests\Admin\Masters\UpdatePopulation;
use App\Models\Population;
use App\Models\Prefix;
use App\Models\Ward;
use App\Models\CensusYears;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class PopulationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $population = Population::select('select_year', DB::raw('SUM(population) as total_population'))->groupBy('select_year')->get();
        $prefix = Prefix::whereNull('deleted_at')->get();
        $wards = Ward::whereNull('deleted_at')->get();
        $censusyears = CensusYears::whereNull('deleted_at')->get();
        return view('admin.masters.population')->with(['population' => $population,'Prefix'=>$prefix,'wards'=> $wards,'censusyears'=>$censusyears]);
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
    public function store(StorePopulation $request)
    {
        try {
            DB::beginTransaction();

            $input = $request->validated();

            // Create population records based on the input zones
            if (isset($request->zone) && is_array($request->zone) && count($request->zone) > 0) {
                for ($i = 0; $i < count($request->zone); $i++) {
                    Population::create([
                        'select_year' => $request->select_year,
                        'zone' => $request->zone[$i],
                        'ward' => $request->ward[$i],
                        'colony' => $request->colony[$i],
                        'society' => $request->society[$i],
                        'population' => $request->population[$i],
                        'ip_address' => $request->ip(),
                    ]);
                }
            }

            DB::commit();

            return response()->json(['success' => 'Population created successfully!']);
        } catch (\Exception $e) {
            DB::rollBack();
            return $this->respondWithAjax($e, 'creating', 'Population');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $select_year)
    {
        try {
            // Retrieve the Population data by ID (ensure 'id' is the correct identifier)
            $Population = Population::where('select_year', $select_year)->get(); // Assuming `id` is the primary key
            //  dd($Population);
            // Optional: Retrieve related BreakUp data if necessary
            // $BreakUp = BreakUp::where('population_id', $id)
            //                   ->whereNull('deleted_at') // Ensure deleted data is not included
            //                   ->get();

            $population = Population :: join ('wards','populations.ward' , '=' , 'wards.id')
                        ->join('prefixes','populations.zone','=','prefixes.id')
                        ->where('populations.select_year', $select_year)
                        ->select('populations.*','wards.name','prefixes.Zone')
                        ->get();

            // Return the data as a JSON response
            return response()->json([
                'result' => 1,
                'year' => $select_year,
                'Population' => $population,  // Send Population data
                // 'BreakUp' => $BreakUp,  // Uncomment if you need BreakUp data
            ]);
        } catch (\Exception $e) {
            // Return error response in case of failure
            return response()->json([
                'result' => 0,
                'message' => 'Error retrieving Population data.',
                'error' => $e->getMessage(),
            ]);
        }
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $select_year)
    {
        // $population = Population::get();
        $population = Population::where('select_year', $select_year)->get();
        // $prefix = Prefix::all();

        if ($population) {
            return response()->json([
                'result' => 1,
                'population' => $population,
                'select_year' => $select_year,
                // 'Prefix' => $prefix
            ]);
        }

        return response()->json(['result' => 0]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePopulation $request, string $select_year)
    {
    try {
        DB::beginTransaction();

        // Fetch the population for the given select_year
        $population = Population::where('select_year', $select_year)->first();

        if (!$population) {
            return response()->json(['error' => 'Population not found'], 404);
        }

        // Update population with the validated input
        $input = $request->validated();
        // $population->update($input);

        // Delete old records for the same select_year (if necessary)
        Population::where('select_year', $select_year)->delete();

        // Create new population records based on input zones
        if (isset($request->zone) && is_array($request->zone) && count($request->zone) > 0) {
            Population::where('select_year', $request->year)->delete();
            for ($i = 0; $i < count($request->zone); $i++) {
                Population::create([
                    'select_year' => $request->select_year,
                    'zone' => $request->zone[$i],
                    'ward' => $request->ward[$i],
                    'colony' => $request->colony[$i],
                    'society' => $request->society[$i],
                    'population' => $request->population[$i],
                    'ip_address' => $request->ip(),
                ]);
            }
        }

        DB::commit();

        return response()->json(['success' => 'Population updated successfully!']);
    } catch (\Exception $e) {
        DB::rollBack();
        return response()->json(['error' => 'Something went wrong', 'message' => $e->getMessage()]);
    }
}
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $select_year)
{
    try {
        DB::beginTransaction();

        // Try to find the population with the select_year
        $population = Population::where('select_year', $select_year)->first();

        if (!$population) {
            return response()->json(['error' => 'Population not found'], 404);
        }

        // Soft delete population or you can call the delete() method
        $population->deleted_by = auth()->user()->id;  // Assuming the 'deleted_by' field should store the user ID
        $population->deleted_at = now();  // Soft delete timestamp
        $population->save(); // Update the deletion fields

        // Or, if you want to actually delete the record completely, you can call:
        // $population->delete();

        DB::commit();

        return response()->json(['success' => 'Population deleted successfully!']);
    } catch (\Exception $e) {
        DB::rollBack();
        return response()->json(['error' => 'Something went wrong: ' . $e->getMessage()], 500);
    }
}

}
