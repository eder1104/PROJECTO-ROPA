<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Cálculo de Fuerza Gravitatoria') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form action="{{ route('antigravity.calculate') }}" method="POST">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 pb-6">
                        <div>
                            <x-input-label for="mass" :value="__('Masa (kg)')" />
                            <x-text-input id="mass" name="mass" type="number" step="0.01" class="mt-1 block w-full" :value="old('mass')" required />
                            <x-input-error class="mt-2" :messages="$errors->get('mass')" />
                        </div>
                        <div>
                            <x-input-label for="distance" :value="__('Distancia (m)')" />
                            <x-text-input id="distance" name="distance" type="number" step="0.01" class="mt-1 block w-full" :value="old('distance')" required />
                            <x-input-error class="mt-2" :messages="$errors->get('distance')" />
                        </div>
                    </div>

                    <div class="flex items-center gap-4">
                        <x-primary-button>{{ __('Calcular Fuerza') }}</x-primary-button>
                    </div>
                </form>

                @if(session('result'))
                    <div class="mt-10 p-4 border rounded-lg bg-green-50 dark:bg-gray-700 dark:border-gray-600">
                        <p class="text-lg font-medium text-gray-900 dark:text-gray-100 italic">
                            {{ __('Resultado:') }}
                        </p>
                        <p class="text-3xl font-bold text-gray-900 dark:text-white mt-2">
                             {{ session('result') }} N
                        </p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
