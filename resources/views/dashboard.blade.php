<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Dashboard') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
        <p>
        <h1 class="text-center">{{__('bienvenido')}}</h1>
        </p>
        <p>
          {{__('Parrafo')}}
        </p>
        <p>
          {{__('Enlace Credenciales')}} <a href="{{route('loads.index')}}">Aquí.</a>
        </p>
        <p>
          Para ver los registros de los certificados descargados da clic <a href="{{route('downloads.index')}}">Aquí.</a>
        </p>
        {{-- <p>
          Para generar reportes da clci <a href="#">Aquí.</a>
        </p> --}}
      </div>
    </div>
  </div>
</x-app-layout>
