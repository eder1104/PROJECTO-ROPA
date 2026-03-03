@extends('layouts.ecomoda')

@section('content')
<div class="max-w-7xl mx-auto py-20 px-10">
    <div class="mb-16 text-center">
        <h1 class="text-5xl font-bold italic mb-4">Colección de Temporada</h1>
        <p class="uppercase tracking-[0.5em] text-[#C5A059] text-sm">Alta Costura Corporativa</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-10">
        @foreach($products as $product)
        <div class="high-end-card p-4">
            <div class="aspect-[3/4] bg-[#333333]/5 mb-6 overflow-hidden">
                <img src="{{ $product['image'] }}" alt="{{ $product['name'] }}" class="w-full h-full object-cover">
            </div>
            <p class="text-[10px] uppercase tracking-widest text-[#C5A059] mb-2">{{ $product['category'] }}</p>
            <h3 class="text-lg font-bold mb-4">{{ $product['name'] }}</h3>
            <div class="flex justify-between items-center border-t border-[#C5A059]/20 pt-4">
                <span class="text-xl font-medium">${{ number_format($product['price'], 2) }}</span>
                <form action="{{ route('cart.add') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id" value="{{ $product['id'] }}">
                    <input type="hidden" name="name" value="{{ $product['name'] }}">
                    <input type="hidden" name="price" value="{{ $product['price'] }}">
                    <input type="hidden" name="category" value="{{ $product['category'] }}">
                    <button type="submit" class="text-xs uppercase tracking-widest font-bold hover:text-[#C5A059]">Añadir</button>
                </form>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
