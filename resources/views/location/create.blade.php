<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Location') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <x-splade-form :action="route('location.store')" class="space-y-4">
                        <x-splade-input name="name" label="Name" />
                        <div class="flex flex-row">
                            <x-splade-submit />
                            <Link class="px-2 py-2" href="{{ route('location.index') }}">
                                Back
                            </Link>
                        </div>
                    </x-splade-form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
