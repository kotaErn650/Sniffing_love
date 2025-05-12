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
                <a href="{{route('usuarios.index')}}" class="bg-white border border-red-600 hover:bg-red-50 shadow-md hover:shadow-lg rounded-2xl p-6 transition duration-300">
                    <h3 class="text-lg font-bold text-blue-600 mb-2">👥 Usuarios</h3>
                    <p class="text-black text-sm">Gestiona los Usuarios Registrados.</p>
                </a>

                <a href="{{route('roles.index')}}" class="bg-white border border-red-600 hover:bg-red-50 shadow-md hover:shadow-lg rounded-2xl p-6 transition duration-300">
                    <h3 class="text-lg font-bold text-blue-600 mb-2">👥 Roles</h3>
                    <p class="text-black text-sm">Gestiona los Roles Guardados.</p>
                </a>

                </a>

                <a href="{{route('veterinarias.index')}}" class="bg-white border border-red-600 hover:bg-red-50 shadow-md hover:shadow-lg rounded-2xl p-6 transition duration-300">
                    <h3 class="text-lg font-bold text-blue-600 mb-2">👥 Veterinarias</h3>
                    <p class="text-black text-sm">Gestiona todos los usuarios registrados.</p>
                </a>

                <a href="{{route('servicios.index')}}"class="bg-white border border-red-600 hover:bg-red-50 shadow-md hover:shadow-lg rounded-2xl p-6 transition duration-300">
                    <h3 class="text-lg font-bold text-blue-600 mb-2">👥 Servicios</h3>
                    <p class="text-black text-sm">Gestiona todos los usuarios registrados.</p>
                </a>

                <a href="{{route('politicas.index')}}"class="bg-white border border-red-600 hover:bg-red-50 shadow-md hover:shadow-lg rounded-2xl p-6 transition duration-300">
                    <h3 class="text-lg font-bold text-blue-600 mb-2">👥 Politicas</h3>
                    <p class="text-black text-sm">Gestiona todos las politicas registradas.</p>
                </a>

                <a href="{{route('aceptacionpoliticas.index')}}"class="bg-white border border-red-600 hover:bg-red-50 shadow-md hover:shadow-lg rounded-2xl p-6 transition duration-300">
                    <h3 class="text-lg font-bold text-blue-600 mb-2">👥 Aceptacion De Politicas</h3>
                    <p class="text-black text-sm">Reistra cuantos 7y que usuarios han aceptado la politicas dentro de la aplicacion.</p>
                </a>

                <a href="{{route('notificaciones.index')}}"class="bg-white border border-red-600 hover:bg-red-50 shadow-md hover:shadow-lg rounded-2xl p-6 transition duration-300">
                    <h3 class="text-lg font-bold text-blue-600 mb-2">👥 Notificaciones</h3>
                    <p class="text-black text-sm">Registra las notificaciones aceptadas por los usuarios.</p>
                </a>

                <a href="{{route('puntosrecompensa.index')}}"class="bg-white border border-red-600 hover:bg-red-50 shadow-md hover:shadow-lg rounded-2xl p-6 transition duration-300">
                    <h3 class="text-lg font-bold text-blue-600 mb-2">👥 Puntos Recompensa</h3>
                    <p class="text-black text-sm">Registra los puntos de recompensa para los usuarios.</p>
                </a>

                <a href="{{route('transaccionespuntos.index')}}"class="bg-white border border-red-600 hover:bg-red-50 shadow-md hover:shadow-lg rounded-2xl p-6 transition duration-300">
                    <h3 class="text-lg font-bold text-blue-600 mb-2">👥 Transacciones Puntos</h3>
                    <p class="text-black text-sm">Registra la transacciones de los puntos de los usuarios.</p>
                </a>
                
                <a href="{{route('referidos.index')}}"class="bg-white border border-red-600 hover:bg-red-50 shadow-md hover:shadow-lg rounded-2xl p-6 transition duration-300">
                    <h3 class="text-lg font-bold text-blue-600 mb-2">👥 Referidos</h3>
                    <p class="text-black text-sm">Registra los usuarios Referidos por otros.</p>
                </a>




                
            </div>
        </div>
    </div>
</x-app-layout>
