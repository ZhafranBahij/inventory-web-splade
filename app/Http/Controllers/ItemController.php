<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Http\Requests\StoreItemRequest;
use App\Http\Requests\UpdateItemRequest;
use App\Models\Location;
use App\Models\User;
use App\Tables\ItemTable;
use ProtoneMedia\Splade\Facades\Toast;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = ItemTable::class;

        return view('item.index', [
            'items' => $items,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $locations = Location::all();
        $users = User::all();

        return view('item.create', [
            'locations' => $locations,
            'users' => $users,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreItemRequest $request)
    {
        $validated = $request->validated();

        Item::create($validated);

        Toast::title('Data has been created');

        return to_route('item.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Item $item)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Item $item)
    {
        $locations = Location::all();
        $users = User::all();

        return view('item.edit', [
            'locations' => $locations,
            'users' => $users,
            'item' => $item,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateItemRequest $request, Item $item)
    {
        $validated = $request->validated();

        $item->update($validated);

        Toast::title('Data has been updated');

        return to_route('item.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Item $item)
    {
        $item->delete();

        Toast::title('Data has been deleted!');

        return to_route('item.index');
    }
}
