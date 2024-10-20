<header class="w-full flex justify-center items-center">
    <nav class="bg-google-dark  w-full">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <a href="/" class="flex items-center space-x-1 rtl:space-x-reverse">
                <x-application-logo class="h-8" />
                <div class="flex justify-center items-center">
                    <span class="self-center text-2xl font-semibold whitespace-nowrap text-white">PROFILE</span>
                    <span class="self-center text-2xl font-semibold whitespace-nowrap  text-primary">AI</span>
                </div>
            </a>
            @if (Route::has('login'))
                @auth
                    <div class="flex items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
                        <button type="button"
                            class="flex text-sm bg-gray-800 rounded-full md:me-0 focus:ring-4 focus:ring-gray-300 "
                            id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown"
                            data-dropdown-placement="bottom">
                            <span class="sr-only">Open user menu</span>
                            <img class="w-8 h-8 rounded-full" src="{{ Auth::user()->profile_photo_url }}" alt="user photo">
                        </button>
                        <!-- Dropdown menu -->
                        <div class="z-50 hidden my-4 text-base list-none bg-google-dark divide-y divide-gray-100 rounded-lg shadow  "
                            id="user-dropdown">
                            <div class="px-4 py-3">
                                <span class="block text-sm text-white ">{{ Auth::user()->name }}</span>
                                <span class="block text-sm  text-gray-500 truncate ">{{ Auth::user()->email }}</span>
                            </div>
                            <ul class="py-2" aria-labelledby="user-menu-button">
                                <li>
                                    <a href="{{ route('cloudinary.my-gallery') }}"
                                        class="block px-4 py-2 text-sm text-gray-200 hover:bg-gray-800">Galería personal</a>
                                </li>
                                <li>
                                    <a href="{{ route('profile.show') }}"
                                        class="block px-4 py-2 text-sm text-gray-200 hover:bg-gray-800">Profile</a>
                                </li>
                                <li>
                                    <!-- Authentication -->
                                    <form method="POST" action="{{ route('logout') }}" x-data>
                                        @csrf

                                        <x-dropdown-link href="{{ route('logout') }}" @click.prevent="$root.submit();">
                                            {{ __('Log Out') }}
                                        </x-dropdown-link>
                                    </form>
                                </li>
                            </ul>
                        </div>
                        <button data-collapse-toggle="navbar-user" type="button"
                            class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-600   "
                            aria-controls="navbar-user" aria-expanded="false">
                            <span class="sr-only">Open main menu</span>
                            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 17 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M1 1h15M1 7h15M1 13h15" />
                            </svg>
                        </button>
                    </div>
                @else
                    <div class="flex items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
                        <a href="{{ route('login') }}"
                            class="rounded-md px-3 py-2 text-gray-100 ring-1 ring-transparent transition hover:text-primary focus:outline-none focus-visible:ring-[#FF2D20]   ">
                            Iniciar Sesión
                        </a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}"
                                class="rounded-md px-3 py-2 text-white bg-primary ring-1 ring-transparent transition hover:bg-primary-ligth hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20]   ">
                                Registrarse
                            </a>
                        @endif
                        <button data-collapse-toggle="navbar-user" type="button"
                            class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200   "
                            aria-controls="navbar-user" aria-expanded="false">
                            <span class="sr-only">Open main menu</span>
                            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 17 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M1 1h15M1 7h15M1 13h15" />
                            </svg>
                        </button>
                    </div>
                @endauth
            @endif

            <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-user">
                <ul
                    class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-google-dark md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-google-dark  md: ">
                    <li>
                        <a href="/generate"
                            class="block py-2 px-3 text-white bg-primary hover:bg-primary-ligth hover:text-black rounded md:bg-transparent md:text-primary/90 md:hover:text-black md:p-2"
                            aria-current="page">Crear Imagen Spoky</a>
                    </li>
                    <li>
                        <a href="{{ route('pricing')}}"
                            class="block py-2 px-3 text-white rounded hover:bg-gray-600 md:hover:bg-transparent md:hover:text-primary md:p-2">
                            Precio
                        </a>
                    </li>
                    <li>
                        <a href="#"
                            class="block py-2 px-3 text-white rounded hover:bg-gray-600 md:hover:bg-transparent md:hover:text-primary md:p-2">
                            Contacto
                        </a>
                    </li>
                    <li>
                        <a href="#"
                            class="block py-2 px-3 text-white rounded hover:bg-gray-600 md:hover:bg-transparent md:hover:text-primary md:p-2">
                            Sobre mi
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
