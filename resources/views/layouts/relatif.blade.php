<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Relatif')</title>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet">
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#0f0a07] text-[#E0C0B2] min-h-screen flex justify-center items-start overflow-y-auto md:overflow-hidden font-montserrat">
    <div class="w-full max-w-md md:max-w-2xl bg-[#1C110B] h-screen flex flex-col relative shadow-[0_0_50px_rgba(0,0,0,0.8)] border-x border-[#2A1D17] transition-all duration-300 overflow-hidden">
        @yield('content')
    </div>

    <!-- Member Registration Modal Component -->
    <x-relatif.member-registration-modal />
</body>
</html>

