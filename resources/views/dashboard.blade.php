@use('App\Enums\OrderStatus')

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Liste des commandes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 rounded-md bg-white px-3 py-2">
            <ul role="list" class="divide-y divide-gray-100">
                @forelse ($orders as $order)
                    <li class="flex justify-between gap-x-6 py-5">
                        <div class="flex min-w-0 gap-x-4">
                            <div class="min-w-0 flex-auto">
                                <p class="text-sm/6 font-semibold text-gray-900">Commande Pizza</p>
                                <p class="mt-1 truncate text-xs/5 text-gray-500">
                                    <a href="{{ route('profile.trackr', $order) }}"
                                        class="hover:text-gray-800">Consulter le tracking</a>
                                </p>
                            </div>
                        </div>
                        <div>
                            <form action="{{ route('orders.update', ['order' => $order]) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <label for="status" class="block text-sm font-medium text-gray-700">Mettre à jour le
                                    statut de la commande</label>
                                <div class="flex items-start gap-3 mt-2">
                                    <select id="status" name="status"
                                        class="block w-full rounded-md border-0 py-1.5 pl-3 pr-10 text-gray-900 ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-indigo-600 sm:text-sm">
                                        @foreach (OrderStatus::labels() as $value => $label)
                                            <option
                                                value="{{ $value }}"
                                                @selected($order->status->value == $value)
                                            >
                                            {{ $label }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <button type="submit"
                                        class="rounded-md bg-indigo-600 px-2 py-1 text-sm font-semibold text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-600">
                                        Update
                                    </button>
                                </div>
                            </form>


                        </div>
                        <div class="hidden shrink-0 sm:flex sm:flex-col sm:items-end">
                            <p class="text-sm/6 text-gray-900">Status</p>
                            <div class="mt-1 flex items-center gap-x-1.5">
                                <div class="flex-none rounded-full bg-emerald-500/20 p-1">
                                    <div class="h-1.5 w-1.5 rounded-full bg-emerald-500"></div>
                                </div>
                                <p class="text-xs/5 text-gray-500">Online</p>
                            </div>
                        </div>
                    </li>
                @empty
                    {{ __('No orders yet.') }}
                @endforelse
            </ul>
        </div>
    </div>
</x-app-layout>
