<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
                <a href="{{route('services.index')}}" class="bg-blue-500 text-black px-4 py-2 rounded hover:bg-blue-600 transition duration-200">
                    {{ __("Admin") }}
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
