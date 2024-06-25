<?php

namespace App\Tables;

use App\Models\Location;
use Illuminate\Http\Request;
use ProtoneMedia\Splade\AbstractTable;
use ProtoneMedia\Splade\SpladeTable;

class LocationTable extends AbstractTable
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
        return Location::query()
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
            ->column('action')
            ->column('id', sortable: true) // Sortable can sort the data likes datatable
            ->column('name', sortable: true, searchable: true) // Searchable can searh the data
            ->column('created_at', sortable: true)
            ->column('updated_at', sortable: true)
            ->paginate(15);
    }
}
