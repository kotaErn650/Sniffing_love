<nav x-data="{ open: false }" class="bg-white border-b border-gray-100 relative z-50">
    <!-- Overlay -->
    <div 
        x-show="open" 
        x-transition.opacity 
        @click="open = false"
        class="fixed inset-0 bg-black bg-opacity-50 z-40 sm:hidden">
    </div>

    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-20">
            <div class="flex disjustify-start">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <x-application-logo class="block h-9 w-auto fill-current" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="flex items-center text-black font-bold">
                    <details class="relative group w-max">
                    <summary class="cursor-pointer px-4 py-2 bg-gray-200 rounded hover:bg-gray-600 flex items-center gap-2 ">
                        <svg class="w-5 h-5 text-gray-600 group-hover:rotate-90 transition-transform" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </summary>
                        <div class="absolute z-10 mt-2 w-80 bg-white border border-gray-300 rounded shadow-lg space-y-1 p-2">
                            <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">{{ __(' 🔜 Dashboard') }}</x-nav-link>
                            <x-nav-link :href="route('servicios.index')" :active="request()->routeIs('servicios.index')">{{ __('📊 Servicios') }}</x-nav-link>
                            <x-nav-link :href="route('veterinarias.index')" :active="request()->routeIs('veterinarias.index')">{{ __('🐩Veterinarias') }}</x-nav-link>
                            <x-nav-link :href="route('productos.index')" :active="request()->routeIs('productos.index')">{{ __('📦Productos') }}</x-nav-link>
                             
                                    <x-nav-link :href="route('usuarios.index')" :active="request()->routeIs('usuarios.index')">{{ __('👨‍🎓 Usuarios') }}</x-nav-link>    
                                    <x-nav-link :href="route('roles.index')" :active="request()->routeIs('roles.index')">{{ __(' 🖋️Roles') }}</x-nav-link>
                                    <x-nav-link :href="route('citas.index')" :active="request()->routeIs('citas.index')">{{ __('❤️Citas') }}</x-nav-link>
                             
                            <x-nav-link :href="route('politicas.index')" :active="request()->routeIs('politicas.index')">{{ __('🚷Políticas') }}</x-nav-link>
                            <x-nav-link :href="route('aceptacionpoliticas.index')" :active="request()->routeIs('aceptacionpoliticas.index')">{{ __('🚫Aceptación de Políticas') }}</x-nav-link>
                            <x-nav-link :href="route('notificaciones.index')" :active="request()->routeIs('notificaciones.index')">{{ __('📩Notificaciones') }}</x-nav-link>
                            <x-nav-link :href="route('puntosrecompensa.index')" :active="request()->routeIs('puntosrecompensa.index')">{{ __('⚫Puntos Recompensa') }}</x-nav-link>
                            <x-nav-link :href="route('transaccionespuntos.index')" :active="request()->routeIs('transaccionespuntos.index')">{{ __('💲Transacciones Puntos') }}</x-nav-link>
                            <x-nav-link :href="route('referidos.index')" :active="request()->routeIs('referidos.index')">{{ __('🙋🏽‍♂️Referidos') }}</x-nav-link>
                            <x-nav-link :href="route('membresias.index')" :active="request()->routeIs('membresias.index')">{{ __('🏆Membresías') }}</x-nav-link>
                            

                        </div>
                    </details>
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:item sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                            <div class="flex flex-col items-start">
                                <span class="font-semibold">{{ Auth::user()->nombre }} {{ Auth::user()->apellido }}</span>
                                <span class="text-xs text-gray-500">
                                    @if(Auth::user()->id_rol == 1)
                                        Administrador
                                    @else
                                        Usuario
                                    @endif
                                </span>
                            </div>
                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">{{ __('Perfil') }}</x-dropdown-link>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                                {{ __('Cerrar Sesión') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden z-50 relative bg-white">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">{{ __('Dashboard') }}</x-responsive-nav-link>
        </div>
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>
            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">{{ __('Profile') }}</x-responsive-nav-link>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
