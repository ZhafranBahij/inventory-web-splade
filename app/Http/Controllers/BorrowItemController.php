<?php

namespace App\Http\Controllers;

use App\Models\BorrowItem;
use App\Http\Requests\StoreBorrowItemRequest;
use App\Http\Requests\UpdateBorrowItemRequest;
use App\Models\Item;
use App\Models\User;
use App\Tables\BorrowItemTable;
use ProtoneMedia\Splade\Facades\Toast;

class BorrowItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = BorrowItemTable::class;

        return view('borrow-item.index', [
            'datas' => $datas,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        $items = Item::all();

        return view('borrow-item.create', [
            'users' => $users,
            'items' => $items,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBorrowItemRequest $request)
    {
        $validated = $request->validated();

        BorrowItem::create($validated);

        Toast::title('Data has been created!');

        return to_route('borrow-item.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(BorrowItem $borrowItem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BorrowItem $borrowItem)
    {
        $users = User::all();
        $items = Item::all();

        return view('borrow-item.edit', [
            'users' => $users,
            'items' => $items,
            'borrowItem' => $borrowItem,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBorrowItemRequest $request, BorrowItem $borrowItem)
    {
        $validated = $request->validated();
        $borrowItem->update($validated);

        Toast::title('Data has been updated!');

        return to_route('borrow-item.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BorrowItem $borrowItem)
    {
        $borrowItem->delete();

        Toast::title('Data has been deleted!');

        return to_route('borrow-item.index');
    }
}
