<?php

namespace App\Tables;

use App\Models\Item;
use Illuminate\Http\Request;
use ProtoneMedia\Splade\AbstractTable;
use ProtoneMedia\Splade\SpladeTable;

class ItemTable extends AbstractTable
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
        return Item::query()
                ->with(['user', 'location'])
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
            ->column('image')
            ->column(
                key: 'location.name',
                label: 'Location',
                searchable: true,
            )
            ->column(
                key: 'user.name',
                label: 'User',
                searchable: true,
            )
            ->column('name', sortable: true, searchable: true)
            ->paginate(10);
    }
}
