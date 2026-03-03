@extends('layouts.ecomoda')

@section('content')
<div class="max-w-4xl mx-auto py-20 px-10">
    <h1 class="text-3xl font-bold mb-12 uppercase tracking-[0.3em]">Tu Selección</h1>

    @if(empty($cartItems))
        <div class="text-center py-20 border border-dashed border-[#C5A059]/30">
            <p class="uppercase tracking-widest text-sm opacity-50">El carrito está vacío</p>
            <a href="{{ route('shop.index') }}" class="inline-block mt-8 text-xs font-bold underline uppercase tracking-widest">Explorar Colección</a>
        </div>
    @else
        <div class="space-y-8 mb-16">
            @foreach($cartItems as $item)
            <div class="flex justify-between items-center border-b border-[#C5A059]/10 pb-6">
                <div>
                    <h3 class="text-lg font-bold">{{ $item['name'] }}</h3>
                    <p class="text-xs uppercase tracking-widest opacity-60">{{ $item['category'] }} (x{{ $item['quantity'] }})</p>
                </div>
                <span class="font-medium">${{ number_format($item['base_price'] * $item['quantity'], 2) }}</span>
            </div>
            @endforeach
        </div>

        @if($pricing)
        <div class="bg-white p-10 border border-[#C5A059]/30">
            <div class="space-y-4 text-sm uppercase tracking-widest">
                <div class="flex justify-between">
                    <span>Subtotal</span>
                    <span>${{ number_format($pricing['subtotal'], 2) }}</span>
                </div>
                <div class="flex justify-between text-[#C5A059]">
                    <span>Impuestos (IVA)</span>
                    <span>${{ number_format($pricing['tax'], 2) }}</span>
                </div>
                <div class="flex justify-between">
                    <span>Envio Premium</span>
                    <span>${{ number_format($pricing['shipping'], 2) }}</span>
                </div>
                <div class="flex justify-between border-t border-[#C5A059] pt-6 mt-6 text-xl font-bold">
                    <span>Total</span>
                    <span>${{ number_format($pricing['total'], 2) }}</span>
                </div>
            </div>
            <button class="w-full mt-10 btn-premium">Proceder al Pago</button>
        </div>
        @endif
    @endif
</div>
@endsection
