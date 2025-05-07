<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('⭐ Dashboard ⭐') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto px-4">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

                <!-- Orden de cada tbla para vistas -->
                <a href="#User" class="bg-white border border-red-600 hover:bg-red-50 shadow-md hover:shadow-lg rounded-2xl p-6 transition duration-300">
                    <h3 class="text-lg font-bold text-red-600 mb-2">👤 Usuarios</h3>
                    <p class="text-black text-sm">/////////////////////</p>
                </a>

                <a href="#Roles" class="bg-white border border-blue-600 hover:bg-blue-50 shadow-md hover:shadow-lg rounded-2xl p-6 transition duration-300">
                    <h3 class="text-lg font-bold text-blue-600 mb-2">👥 Roles</h3>
                    <p class="text-black text-sm">////////////////////////////////</p>

                </a>
                <a href="{{route('veterinarias.index')}}" class="bg-white border border-red-600 hover:bg-red-50 shadow-md hover:shadow-lg rounded-2xl p-6 transition duration-300">
                    <h3 class="text-lg font-bold text-blue-600 mb-2">👥 Veterinarias</h3>
                    <p class="text-black text-sm">Gestiona todos los usuarios registrados.</p>
                </a>

                <a href="{{route('servicios.index')}}"class="bg-white border border-red-600 hover:bg-red-50 shadow-md hover:shadow-lg rounded-2xl p-6 transition duration-300">
                    <h3 class="text-lg font-bold text-blue-600 mb-2">👥 Servicios</h3>
                    <p class="text-black text-sm">Gestiona todos los usuarios registrados.</p>
                </a>
                




                
            </div>
        </div>
    </div>
</x-app-layout>
