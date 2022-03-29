<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Something....
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="text-end">
                        <a class="btn btn-dark w-25" role="button" id="main-submit" href="{{ route('workplace.products') }}">
                            A D D | I N Q U I R Y
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
