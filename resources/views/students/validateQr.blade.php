<x-students-layout>

  <div class="container">
    <div class="row">
      <div class="col-md-6"></div>
      <div class="col-md-6">
        <div class="relative flex items-top justify-center min-h-screen sm:items-center py-4 sm:pt-0">
          <div class="max-w-6xl mx-auto sm:px-1 lg:px-1">
            <div class="flex justify-center titulo-welcome">
              Certificados Cursos de Extensión
            </div>
            <div class="flex justify-center titulo-welcome">
              Validacion de certificado.
            </div>
            @if($certifiedValidate->isEmpty())
            <div class="justify-center" style="font-size:18px;">
              Lamentablemente, debemos informar que el certificado escaneado a través del código QR
              ha sido detectado como <strong>adulterado</strong>. No podemos confirmar su autenticidad ni validar su validez.
              <br><strong>La adulteración de certificados es una violación grave y estamos comprometidos en mantener la
              integridad de nuestros documentos oficiales</strong>. Apreciamos tu colaboración en reportar este
              incidente y tomar las medidas necesarias para investigar y tomar acciones correspondientes.
              <br>Si tienes alguna duda o necesitas asistencia adicional, te invitamos a contactarnos a través
              del correo de egresados@cun.edu.co. Estamos aquí para brindarte el apoyo necesario y resolver
              cualquier inquietud que puedas tener.
              <br>Agradecemos tu comprensión y reiteramos nuestro compromiso con la transparencia y calidad en
              nuestros certificados.
              <br>Cordialmente,
              <br>Equipo de Desarrollo Profesional y Egresados de la CUN
              </div>
            @else
            <div class="justify-center" style="font-size:18px;">
              ¡Gracias por utilizar nuestro sistema de validación de certificados de la CUN!
              <br>Hemos verificado el certificado que escaneaste a través del código QR y nos
              complace confirmar su autenticidad.
              <br>Este certificado es <strong>válido</strong> y ha sido emitido por la CUN,
              lo cual respalda la participación exitosa del titular en las actividades correspondientes.
              Puedes tener plena confianza en la autenticidad y validez de este certificado.
              <br>Si tienes alguna pregunta adicional o necesitas asistencia, no dudes en
              contactarnos a través del correo de <strong>egresados@cun.edu.co</strong>.
              Estamos aquí para brindarte el apoyo necesario.
              <br>Agradecemos tu confianza en nuestros certificados y esperamos seguir siendo
              tu referencia confiable en el ámbito académico.
              <br>Cordialmente,
              <br>Equipo de Desarrollo Profesional y Egresados de la CUN
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
