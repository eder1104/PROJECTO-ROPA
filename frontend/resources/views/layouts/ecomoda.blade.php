<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecomoda | High Fashion</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{ asset('css/ecomoda.css') }}">
</head>
<body class="bg-[#F9F8F4] text-[#1A1A1A]">
    <nav class="border-b border-[#C5A059]/30 py-6 px-10 flex justify-between items-center bg-white sticky top-0 z-50">
        <div class="text-3xl font-bold tracking-[0.3em] uppercase">Ecomoda</div>
        <div class="space-x-12 uppercase text-xs tracking-widest font-medium">
            <a href="{{ route('shop.index') }}" class="hover:text-[#C5A059]">Colecciones</a>
            <a href="{{ route('lookbook') }}" class="hover:text-[#C5A059]">Que somos?</a>
            <a href="{{ route('cart.index') }}" class="hover:text-[#C5A059]">Carrito</a>
        </div>
    </nav>

    <main>
        @yield('content')
    </main>

    <footer class="bg-[#333333] text-[#F9F8F4] py-20 px-10 mt-20">
        <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-16">
            <div>
                <h3 class="text-xl font-bold tracking-widest mb-6">ECOMODA</h3>
                <p class="text-xs opacity-60 leading-relaxed uppercase tracking-widest">Como visten los profesionales en colombia.</p>
            </div>
            <div>
                <h4 class="text-xs font-bold tracking-widest mb-6 uppercase">Legal</h4>
                <ul class="text-xs opacity-60 uppercase tracking-widest legal-list">
                    <li><a href="https://www.entuhogar.coca-cola.com.co/politica-de-tratamiento-de-informacion" class="legal-link">Privacidad</a></li>
                    <li><a href="https://www.entuhogar.coca-cola.com.co/terminos-y-condiciones" class="legal-link">Términos</a></li>
                </ul>
            </div>
            <div>
                <h4 class="text-xs font-bold tracking-widest mb-6 uppercase">Contacto</h4>
                <p class="text-xs opacity-60 uppercase tracking-widest">contacto@ecomoda.com</p>
            </div>
        </div>
    </footer>
</body>
</html>
