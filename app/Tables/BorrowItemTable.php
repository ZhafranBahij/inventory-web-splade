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
        ->latest();
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
        ->column('id', sortable: true)
            ->column('action')
            ->column(
                key: 'item.name',
                label: 'Item',
                searchable: true,
            )
            ->column(
                key: 'user_borrow.name',
                label: 'Borrow By',
                searchable: true,
            )
            ->column('start_date', sortable: true, searchable: true)
            ->column('end_date', sortable: true, searchable: true)
            ->paginate(10);
    }
}
