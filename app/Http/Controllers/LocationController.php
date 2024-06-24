<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Http\Requests\StoreLocationRequest;
use App\Http\Requests\UpdateLocationRequest;
use ProtoneMedia\Splade\Facades\Toast;
use ProtoneMedia\Splade\SpladeTable;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $location = Location::query()
                        ->latest()
                        ->get();

        $locations = SpladeTable::for(Location::class)
                        ->column('action')
                        ->column('id', sortable: true) // Sortable can sort the data likes datatable
                        ->column('name', sortable: true, searchable: true) // Searchable can searh the data
                        ->column('created_at', sortable: true)
                        ->column('updated_at', sortable: true)
                        ->paginate(15);

        return view('location.index', [
            'locations' => $locations,
        ]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('location.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLocationRequest $request)
    {
        $validated = $request->validated();

        Location::create($validated);

        Toast::title('Data has been created!')
            ->autoDismiss(5);

        return to_route('location.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Location $location)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Location $location)
    {
        return view('location.edit', [
            'location' => $location,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLocationRequest $request, Location $location)
    {
        $validated = $request->validated();

        $location->update($validated);

        Toast::title('Data has been updated!');

        return to_route('location.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Location $location)
    {
        $location->delete();

        Toast::title('Data has been deleted!');

        return to_route('location.index');
    }
}
