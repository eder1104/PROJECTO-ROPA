@extends('layouts.ecomoda')

@section('content')
<div class="max-w-7xl mx-auto py-20 px-10">
    <div class="mb-20 text-center">
        <h1 class="text-6xl font-bold italic mb-6">Lookbook</h1>
        <p class="uppercase tracking-[0.8em] text-[#C5A059] text-sm">Temporada Otoño - Invierno</p>
    </div>

    <div class="space-y-32">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-20 items-center">
            <div class="aspect-[4/5] overflow-hidden">
                <img src="https://images.unsplash.com/photo-1441984904996-e0b6ba687e04?auto=format&fit=crop&w=1200&q=80" alt="Executive" class="w-full h-full object-cover">
            </div>
            <div>
                <h2 class="text-4xl font-bold mb-8 italic">El Ejecutivo Moderno</h2>
                <p class="text-sm uppercase tracking-widest leading-loose opacity-70 mb-10">
                    Cortes precisos y materiales de la más alta calidad definen nuestra línea corporativa. 
                    Seda italiana y lino premium se entrelazan para el profesional que no compromete el estilo.
                </p>
                <a href="{{ route('shop.index') }}" class="btn-premium inline-block">Ver Trajes</a>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-20 items-center">
            <div class="order-2 md:order-1 text-right">
                <h2 class="text-4xl font-bold mb-8 italic">Gala Nocturna</h2>
                <p class="text-sm uppercase tracking-widest leading-loose opacity-70 mb-10">
                    Sofisticación que trasciende el tiempo. Nuestra colección de gala está diseñada 
                    para destacar en los eventos más exclusivos, utilizando terciopelo y satén de alta gama.
                </p>
                <a href="{{ route('shop.index') }}" class="btn-premium inline-block">Ver Vestidos</a>
            </div>
            <div class="order-1 md:order-2 aspect-[4/5] overflow-hidden">
                <img src="https://images.unsplash.com/photo-1539109136881-3be0616acf4b?auto=format&fit=crop&w=1200&q=80" alt="Gala" class="w-full h-full object-cover">
            </div>
        </div>
    </div>
</div>
@endsection
