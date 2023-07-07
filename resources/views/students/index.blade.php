<x-students-layout>

  <div class="container">
    <div class="row">
      <div class="col-md-6"></div>
      <div class="col-md-6">
        <div class="relative flex items-top justify-center min-h-screen sm:items-center py-4 sm:pt-0">
          <div class="max-w-6xl mx-auto sm:px-1 lg:px-1">
            {{-- <div class="flex justify-center titulo-welcome">
              Certificados Cursos de Extensión
            </div> --}}
            <div class="flex justify-center titulo-welcome">
              Consulta tus certificados.
            </div>
            <div class="flex justify-center sm:justify-center sm:pt-0">
              <img class="sombra-inter-negro" src="{{ asset('images/Proyección Social - Fondo blanco.png') }}" alt="logo-cun" width="350">
            </div>
            <div class="d-flex justify-content-center">
              <form method="get" action="{{route('consult.show',$i=0)}}">
                <select class="form-control select-buscar" id="Tipo_documento" name="Tipo_documento" required>
                  <option value="" hidden selected>Selecciona tipo de documento</option>
                  <option value="cédula de ciudadanía">Cédula de ciudadanía</option>
                  <option value="tarjeta de identidad">Tarjeta de identidad</option>
                  <option value="cédula de extrangeria">Cédula de extranjería</option>
                  <option value="documento de extrangeria">Documento de identidad extranjera</option>
                  <option value="pasaporte">Pasaporte</option>
                  <option value="registro civil">Registro civil</option>
                </select>
                <div class="flex items-center justify-center mt-2">
                  <input type="text" class="form-control text-buscar" placeholder="Número de documento" name="documento" id="documento" required autofocus>
                </div>
                <div class="flex items-center justify-center mt-1">
                  <label for="remember_me" class="justify-end">
                    <x-jet-checkbox id="remember_me" name="remember" required />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Term&cond') }}</span>
                  </label>
                </div>
                <input type="submit" class="sombra btn btn-secondary btn-buscar" value="{{__('Check')}}">
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</x-students-layout>
