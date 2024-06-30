<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight capitalize">
            {{ __('Item') }}
        </h2>
    </x-slot>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <x-splade-form :action="route('borrow-item.store')" class="space-y-4">
                        <x-splade-select name="item_id" label="Item" choices>
                            <option value="">Select item</option>
                            @foreach ($items as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </x-splade-select>
                        <x-splade-select name="user_borrow_id" label="User Who Borrow That Item" choices>
                            <option value="">Select User Who Borrow That Item</option>
                            @foreach ($users as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </x-splade-select>
                        <x-splade-input name="start_date" label="Start Date" type="date" />
                        <x-splade-input name="end_date" label="End Date" type="date" />
                        <x-splade-submit />
                    </x-splade-form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
