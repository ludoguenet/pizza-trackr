<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="md:flex md:items-center md:justify-between mb-10">
                <div class="min-w-0 flex-1">
                    <h2 class="text-2xl/7 font-bold text-gray-900 sm:truncate sm:text-3xl sm:tracking-tight">Suivi de
                        votre commande</h2>
                </div>
                <div class="mt-4 flex md:ml-4 md:mt-0">
                    <button type="button"
                        class="inline-flex items-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">Modifier</button>
                    <button type="button"
                        class="ml-3 inline-flex items-center rounded-md bg-emerald-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-emerald-700 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-emerald-600">Donner un pourboire</button>
                </div>
            </div>

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <x-orders.progress-bar :order="$order" />
                </div>
                <!-- Status Message -->
                <div class="text-center my-4">
                    <h2 class="text-lg font-semibold">Nous vous remercions pour votre commande</h2>
                    <p class="text-sm">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Placeat, porro.</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
