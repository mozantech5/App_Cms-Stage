<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>APP CMS</title>
</head>

<x-front-guest-layout>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700,900&display=swap" rel="stylesheet">

    <main class="bg-white font-montserrat">
        <header class="h-24 sm:h-32 flex items-center">
            <div class="container mx-auto px-6 sm:px-12 flex items-center justify-between">
                <div class="text-black font-black text-2xl flex items-center">
                    <span class="w-6 h-6 rounded-full bg-blue-500 mr-4"></span> APP CMS
                </div>
                <div class="flex items-center">
                    <nav id="responsive-navigation" class="text-black text-lg hidden lg:flex items-center">
                    <ul class="text-black text-lg flex flex-col items-center">
                        @if(Route::has('admin.login'))
                                <a href="{{ route('admin.login') }}" class="py-2 px-6 flex hover:text-blue-500">Login</a>

                        @endif
                    </ul>
                    </nav>
                    <button id="toggle-navigation" class="lg:hidden flex flex-col">
                        <span class="w-6 h-px bg-gray-900 mb-1"></span>
                        <span class="w-6 h-px bg-gray-900 mb-1"></span>
                        <span class="w-6 h-px bg-gray-900 mb-1"></span>
                    </button>
                </div>
            </div>
        </header>
        <div class="container ">
        <img src="{{ asset('/images/home.png') }}" alt="Mon image">
        </div>
    </main>

</x-front-guest-layout>
<style>
    h1{
        text-align:center
    }
    #responsive-navigation li {
        border-bottom: 1px solid #ddd;
    }

    #responsive-navigation li:last-child {
        border-bottom: none;
    }

    #responsive-navigation a {
        display: block;
        padding: 10px 20px;
    }

</style>
<script>
    const toggleNavigationButton = document.getElementById('toggle-navigation');
    const responsiveNavigation = document.getElementById('responsive-navigation');

    toggleNavigationButton.addEventListener('click', () => {
        responsiveNavigation.classList.toggle('hidden');
    });

    const navigationLinks = document.querySelectorAll('#responsive-navigation a');

    navigationLinks.forEach(link => {
        link.addEventListener('click', () => {
            responsiveNavigation.classList.add('hidden');
        });
    });
</script>
