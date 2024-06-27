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
                    <x-splade-form :action="route('item.store')" class="space-y-4">
                        <x-splade-select name="location_id" label="Location" choices>
                            <option value="">Select Location</option>
                            @foreach ($locations as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </x-splade-select>
                        <x-splade-select name="user_id" label="User" choices>
                            <option value="">Select User</option>
                            @foreach ($users as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </x-splade-select>
                        <x-splade-input name="name" label="Name" />
                        <x-splade-input name="quantity" label="Quantity" />
                        <x-splade-submit />
                    </x-splade-form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
