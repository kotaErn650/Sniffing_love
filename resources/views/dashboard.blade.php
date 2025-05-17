<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('⭐🐩🐾 Dashboard 🐾 🐶⭐') }}
        </h2>
    </x-slot>

    <div class="py-12" style="background-image: url('/img/cielo.jpg'); background-size: cover; background-position: center; background-repeat: no-repeat;">
        <div class="max-w-7xl mx-auto px-4">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

                <!-- Orden de cada tbla para vistas -->
                <a href="{{route('usuarios.index')}}" style="background-image: url('/img/sspi_header.svg')"class="border rounded-2xl p-6">
                    <h3 class="text-lg font-bold text-blue-600 mb-2">👥 Usuarios</h3>
                    <p class="text-black text-sm">Gestiona los Usuarios Registrados.</p>
                </a>

                <a href="{{route('roles.index')}}" style="background-image: url('/img/sspi_header.svg')"class="border rounded-2xl p-6">
                    <h3 class="text-lg font-bold text-blue-600 mb-2">👥 Roles</h3>
                    <p class="text-black text-sm">Gestiona los Roles Guardados.</p>
                </a>

                </a>

                <a href="{{route('veterinarias.index')}}" style="background-image: url('/img/sspi_header.svg')"class="border rounded-2xl p-6">
                    <h3 class="text-lg font-bold text-blue-600 mb-2">👥 Veterinarias</h3>
                    <p class="text-black text-sm">Gestiona todos los usuarios registrados.</p>
                </a>

                <a href="{{route('servicios.index')}}"style="background-image: url('/img/sspi_header.svg')"class="border rounded-2xl p-6">
                    <h3 class="text-lg font-bold text-blue-600 mb-2">👥 Servicios</h3>
                    <p class="text-black text-sm">Gestiona todos los usuarios registrados.</p>
                </a>

                <a href="{{route('politicas.index')}}"style="background-image: url('/img/sspi_header.svg')"class="border rounded-2xl p-6">
                    <h3 class="text-lg font-bold text-blue-600 mb-2">👥 Politicas</h3>
                    <p class="text-black text-sm">Gestiona todos las politicas registradas.</p>
                </a>

                <a href="{{route('aceptacionpoliticas.index')}}"style="background-image: url('/img/sspi_header.svg')"class="border rounded-2xl p-6">
                    <h3 class="text-lg font-bold text-blue-600 mb-2">👥 Aceptacion De Politicas</h3>
                    <p class="text-black text-sm">Reistra cuantos y que usuarios han aceptado la politicas dentro de la aplicacion.</p>
                </a>

<<<<<<< HEAD
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
=======
                <a href="#"style="background-image: url('/img/sspi_header.svg')"class="border rounded-2xl p-6">
                    <h3 class="text-lg font-bold text-blue-600 mb-2">👥 TABLA XXXX</h3>
                    <p class="text-black text-sm">/////////////////////////////</p>
                </a>
                <a href="#"style="background-image: url('/img/sspi_header.svg')"class="border rounded-2xl p-6">
                    <h3 class="text-lg font-bold text-blue-600 mb-2">👥 TABLA XXXX</h3>
                    <p class="text-black text-sm">/////////////////////////////</p>
                </a>

                                <a href="#"style="background-image: url('/img/sspi_header.svg')"class="border rounded-2xl p-6">
                    <h3 class="text-lg font-bold text-blue-600 mb-2">👥 TABLA XXXX</h3>
                    <p class="text-black text-sm">/////////////////////////////</p>
                </a>
                                <a href="#"style="background-image: url('/img/sspi_header.svg')"class="border rounded-2xl p-6">
                    <h3 class="text-lg font-bold text-blue-900 mb-2">👥 TABLA XXXX</h3>
                    <p class="text-black text-sm">/////////////////////////////</p>
                </a>
                <a href="#"style="background-image: url('/img/sspi_header.svg')"class="border rounded-2xl p-6">
                    <h3 class="text-lg font-bold text-blue-600 mb-2">👥 TABLA XXXX</h3>
                    <p class="text-black text-sm">/////////////////////////////</p>
                </a>
                <a href="#"style="background-image: url('/img/sspi_header.svg')"class="border rounded-2xl p-6">
                    <h3 class="text-lg font-bold text-blue-600 mb-2">👥 TABLA XXXX</h3>
                    <p class="text-black text-sm">/////////////////////////////</p>
                </a>
                <a href="#"style="background-image: url('/img/sspi_header.svg')"class="border rounded-2xl p-6">
                    <h3 class="text-lg font-bold text-blue-600 mb-2">👥 TABLA XXXX</h3>
                    <p class="text-black text-sm">/////////////////////////////</p>
                </a>
                <a href="#"style="background-image: url('/img/sspi_header.svg')"class="border rounded-2xl p-6">
                    <h3 class="text-lg font-bold text-blue-600 mb-2">👥 TABLA XXXX</h3>
                    <p class="text-black text-sm">/////////////////////////////</p>
                </a>
                <a href="#"style="background-image: url('/img/sspi_header.svg')"class="border rounded-2xl p-6">
                    <h3 class="text-lg font-bold text-blue-600 mb-2">👥 TABLA XXXX</h3>
                    <p class="text-black text-sm">/////////////////////////////</p>
                </a>
                
>>>>>>> e98676ae82d0ccd99b600581c965a09460a10f47
                
                <a href="{{route('referidos.index')}}"class="bg-white border border-red-600 hover:bg-red-50 shadow-md hover:shadow-lg rounded-2xl p-6 transition duration-300">
                    <h3 class="text-lg font-bold text-blue-600 mb-2">👥 Referidos</h3>
                    <p class="text-black text-sm">Registra los usuarios Referidos por otros.</p>
                </a>

                <a href="{{route('membresias.index')}}"class="bg-white border border-red-600 hover:bg-red-50 shadow-md hover:shadow-lg rounded-2xl p-6 transition duration-300">
                    <h3 class="text-lg font-bold text-blue-600 mb-2">👥 Membresias</h3>
                    <p class="text-black text-sm">Registra loas membresias accesibles para los usuarios.</p>
                </a>




                
            </div>
        </div>
    </div>
</x-app-layout>
