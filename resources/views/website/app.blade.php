<!DOCTYPE html>
@include('website.shared.header')

<body class="font-sans h-dvh flex flex-col text-gray-700 bg-light justify-between">

    <!-- Preloader -->
    <div class="preloader-wrapper fixed inset-0 bg-white z-50 flex items-center justify-center">
        <div class="preloader relative w-8 h-8 rounded-full"></div>
    </div>

    <!-- Header -->
    @include('website.shared.topBar')

    <main @if(Request()->is('/', 'home', 'user/dashboard')) class="" @else class="py-8" @endif>



        @if (!Request()->is('/', 'home', 'user/dashboard'))

            <!-- Breadcrumb -->
            <div class="container mx-auto px-4 flex flex-col justify-between">
                @include('website.shared.breadCrumb')
                @yield('content')

            </div>

        @else

            @yield('content')

        @endif




    </main>


    @include('website.shared.footer')


    <script>

        // Preloader
        window.addEventListener('load', () => {
            document.querySelector('.preloader-wrapper').classList.add('hidden');
        });

        // Mobile menu toggle would go here
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="{{ asset('js/wishlist.js') }}"></script>
</body>
</html>