@extends('layouts.ecomoda')

@section('content')
<div class="max-w-7xl mx-auto py-20 px-10">
    <div class="mb-20 text-center">
        <h1 class="text-6xl font-bold italic mb-6">¿Qué somos?</h1>
        <p class="uppercase tracking-[0.8em] text-[#C5A059] text-sm">Temporada Otoño - Invierno</p>
    </div>

    <div class="space-y-32">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-20 items-center">
            <div class="aspect-[4/5] overflow-hidden">
                <img src="https://images.unsplash.com/photo-1441984904996-e0b6ba687e04?auto=format&fit=crop&w=1200&q=80" alt="Ejecutivo" class="w-full h-full object-cover">
            </div>
            <div>
                <h2 class="text-4xl font-bold mb-8 italic">Elegancia y modernidad</h2>
                <p class="text-sm uppercase tracking-widest leading-loose opacity-70 mb-10">
                    Nuestros trajes están hechos por manos expertas día a día.
                </p>
                <a href="{{ route('tienda.inicio') }}" class="btn-premium inline-block">Ver Trajes</a>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-20 items-center">
            <div class="order-2 md:order-1 text-right">
                <h2 class="text-4xl font-bold mb-8 italic">Gala y estilo</h2>
                <p class="text-sm uppercase tracking-widest leading-loose opacity-70 mb-10">
                    Elegancia y un toque moderno y suave.
                    Tenemos lo que buscas.
                </p>
                <a href="{{ route('tienda.inicio') }}" class="btn-premium inline-block">Ver Vestidos</a>
            </div>
            <div class="order-1 md:order-2 aspect-[4/5] overflow-hidden">
                <img src="https://images.unsplash.com/photo-1539109136881-3be0616acf4b?auto=format&fit=crop&w=1200&q=80" alt="Gala" class="w-full h-full object-cover">
            </div>
        </div>
    </div>
</div>
@endsection
