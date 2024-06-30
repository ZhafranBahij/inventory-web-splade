<?php

namespace App\Tables;

use App\Models\BorrowItem;
use Illuminate\Http\Request;
use ProtoneMedia\Splade\AbstractTable;
use ProtoneMedia\Splade\SpladeTable;

class BorrowItemTable extends AbstractTable
{
    /**
     * Create a new instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the user is authorized to perform bulk actions and exports.
     *
     * @return bool
     */
    public function authorize(Request $request)
    {
        return true;
    }

    /**
     * The resource or query builder.
     *
     * @return mixed
     */
    public function for()
    {
        return BorrowItem::query()
        ->with(['user_borrow', 'item'])
        ->latest()
        ->paginate(10);
    }

    /**
     * Configure the given SpladeTable.
     *
     * @param \ProtoneMedia\Splade\SpladeTable $table
     * @return void
     */
    public function configure(SpladeTable $table)
    {
        $table
            ->column('action')
            ->column('id', sortable: true)
            ->column('item', sortable: true, searchable: true)
            ->column('borrow_by', sortable: true, searchable: true)
            ->column('start_date', sortable: true, searchable: true)
            ->column('end_date', sortable: true, searchable: true);

            // ->searchInput()
            // ->selectFilter()
            // ->withGlobalSearch()

            // ->bulkAction()
            // ->export()
    }
}
