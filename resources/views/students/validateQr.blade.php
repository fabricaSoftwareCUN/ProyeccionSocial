<x-students-layout>

  <div class="container">
    <div class="row">
      <div class="col-md-6"></div>
      <div class="col-md-6">
        <div class="relative flex items-top justify-center min-h-screen sm:items-center py-4 sm:pt-0">
          <div class="max-w-6xl mx-auto sm:px-1 lg:px-1">
            <div class="flex justify-center titulo-welcome">
              Validación Certificados cursos de Extensión.
            </div>
            @if($certifiedValidate->isEmpty())
            <div class="justify-center" style="font-size:18px;">
              Hemos verificado el certificado que escaneaste a través del código QR y atentamente
              confirmamos que
              <strong>este certificado no es válido pues no ha sido emitido por la CUN</strong>.
              <br>Si tienes alguna pregunta adicional o necesitas asistencia, no dudes en contactarnos
              a través del correo de <strong>proyeccion_social@cun.edu.co</strong>.
              <br><br>Cordialmente,
              <br>Coordinación Nacional de Proyección Social
              </div>
            @else
            <div class="justify-center" style="font-size:18px;">
              Hemos verificado el certificado que escaneaste a través del código QR y nos
              complace confirmar su autenticidad.
              <br><strong>Este certificado es válido y ha sido emitido por la CUN</strong>.
              <br>Si tienes alguna pregunta adicional o necesitas asistencia, no dudes en
              contactarnos a través del correo <strong>proyeccion_social@cun.edu.co</strong>.
              <br><br>Cordialmente,
              <br>Coordinación Nacional de Proyección Social
            </div>
              {{-- @foreach ($certifiedValidate as $item)
                {{$item->email}}
              @endforeach --}}
            @endif
            {{-- <div class="flex justify-center sm:justify-center sm:pt-0">
              <img class="sombra-inter-negro" src="{{ asset('images/logo-welcome.png') }}" alt="logo-cun" width="350">
            </div> --}}
            {{-- <div class="d-flex justify-content-center">
              <form method="get" action="{{route('consult.show',$i=0)}}">
                <input type="text" class="form-control text-buscar" placeholder="Número de documento" name="documento" id="documento" required autofocus>
                <input type="submit" class="sombra btn btn-secondary btn-buscar" value="{{__('Check')}}">
              </form>
            </div> --}}
          </div>
        </div>
      </div>
    </div>
  </div>

</x-students-layout>
