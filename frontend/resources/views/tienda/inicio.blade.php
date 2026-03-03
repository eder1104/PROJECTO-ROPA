@extends('layouts.ecomoda')

@section('content')
<div class="max-w-7xl mx-auto py-20 px-10">
    <div class="mb-16 text-center">
        <h1 class="text-5xl font-bold italic mb-4">Nuestros mejores productos</h1>
        <p class="uppercase tracking-[0.5em] text-[#C5A059] text-sm">Lo mejor en tela</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-10">
        @foreach($productos as $producto)
        <div class="high-end-card p-4">
            <div class="aspect-[3/4] bg-[#333333]/5 mb-6 overflow-hidden">
                <img src="{{ $producto['image'] }}" alt="{{ $producto['name'] }}" class="w-full h-full object-cover">
            </div>
            <p class="text-[10px] uppercase tracking-widest text-[#C5A059] mb-2">{{ $producto['category'] }}</p>
            <h3 class="text-lg font-bold mb-4">{{ $producto['name'] }}</h3>
            <div class="flex justify-between items-center border-t border-[#C5A059]/20 pt-4">
                <span class="text-xl font-medium">${{ number_format($producto['price'], 2) }}</span>
                <form action="{{ route('carrito.agregar') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id" value="{{ $producto['id'] }}">
                    <input type="hidden" name="name" value="{{ $producto['name'] }}">
                    <input type="hidden" name="price" value="{{ $producto['price'] }}">
                    <input type="hidden" name="category" value="{{ $producto['category'] }}">
                    <button type="submit" class="text-xs uppercase tracking-widest font-bold hover:text-[#C5A059]">Añadir</button>
                </form>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
