<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight capitalize">
            {{ __('item') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <x-splade-flash>
                        <p v-if="flash.has('message')" v-text="flash.message" />
                    </x-splade-flash>
                    <Link href="{{ route('item.create') }}" class="bg-blue-300 text-black px-4 py-2 rounded-lg">
                        <i class='bx bx-plus'></i>
                    </Link>
                    <x-splade-table :for="$items" >
                        @cell('image', $item)
                            <img src=" {{ asset('storage/'.'item/'.$item->image) }}" alt="" style="height: 50px">
                        @endcell
                        @cell('action', $item)
                            <Link href="{{ route('item.edit', $item->id) }}" class="bg-yellow-300 text-black px-4 py-2 rounded-lg mr-2">
                                <i class='bx bxs-edit-alt'></i>
                            </Link>
                            <x-splade-form confirm="Are you sure you want to delete" :action="route('item.destroy', $item->id)" :method="'DELETE'">
                                <x-splade-submit  class="bg-red-300 text-black px-4 py-2 rounded-lg" label="Delete">
                                    <i class='bx bxs-trash' ></i>
                                </x-splade-submit>
                            </x-splade-form>
                        @endcell
                    </x-splade-table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
