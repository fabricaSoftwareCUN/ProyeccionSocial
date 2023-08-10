<x-students-layout>

  <div class="abslute flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-0 sm:pt-0">
    <div class="content-general max-w-6xl mx-auto sm:px-1 lg:px-1">
      <div class="flex justify-center titulo-welcome">
        Descarga tus certificados
      </div>
      <div class="container">
        <div class="card bg-light mt-3 mb-3">
          @if ($studentCertificates->isEmpty())
            <div class="card-body">
              <h5>
                No tenemos registros en nuestra base de datos para el documento {{ $documento }}.
                <p>
                  Si tienes alguna pregunta, no dudes en contactarnos al correo
                  <strong>
                    <a href="mailto:proyeccion_social@cun.edu.co">proyeccion_social@cun.edu.co</a>
                  </strong>
                </p>
              </h5>
            </div>
            {{-- <div class="row text-center mx-auto">
              <div class="col-sm-12 mb-2">
                <a class="btn btn-danger sombra ml-1" href="https://servicioscun.zohodesk.com/portal/es/home" target="_blank" rel="noopener noreferrer">
                  Centro de Asistencia - CUN
                </a>
              </div>
            </div> --}}
          @else
              <div class="card-header text-center">
                Bienvenido/a a la plataforma de generación de certificados de Proyección Social de la CUN.
                Aquí podrás acceder y descargar tus certificados de asistencia de los eventos en que has
                participado. Además, podrás consultar el histórico de tus certificados anteriores.
                Valoramos tu compromiso y participación en nuestras capacitaciones que contribuyen a tu
                desarrollo personal y/o profesional.
                Si tienes alguna pregunta o necesitas asistencia, no dudes en contactarnos en
                proyeccion_social@cun.edu.co
                ¡Gracias por ser parte de Proyección Social de la CUN!
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="table-container">
                    <table class="table align-middle table-striped table-hover table-sm mt-3">
                      <thead>
                        <tr>
                          <th>Nombre estudiante</th>
                          <th>Correo electrónico</th>
                          <th>Número documento</th>
                          <th>Nombre producto</th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach ($studentCertificates as $item)
                        <tr>
                          <td data-label="Nombre estudiante">{{ $item->Nombre_completo_participante }}</td>
                          <td data-label="Correo electrónico">{{ $item->Email }}</td>
                          <td data-label="Número documento">{{ $item->Numero_documento }}</td>
                          <td data-label="Nombre producto">{{ $item->Nombre_producto }}</td>
                          <td>
                            <div class="btn-group" role="group" aria-label="Basic example">
                              <a class="sombra btn btn-info" href="#showModal{{ $item->id }}" data-bs-toggle="modal">
                                <i class="bi bi-eye"></i>
                              </a>
                              <a class="sombra btn btn-success" href="{{ route('printPDF', $item->id) }}">
                                <i class="bi bi-file-earmark-pdf"></i>
                              </a>
                            </div>
                          </td>
                        </tr>
                        <!-- showModal -->
                        <div class="modal fade" id="showModal{{ $item->id }}" tabindex="-1" aria-labelledby="ShowModalLabel" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">
                                  <strong>{{ Str::title($item->Nombre_completo_participante) }}</strong>
                                </h1>
                              </div>
                              <div class="modal-body">
                                <div class="row">
                                  <div class="col-md-5">
                                    <strong>Correo electrónico:</strong>
                                  </div>
                                  <div class="col-md-7">
                                    {{ $item->Email }}
                                  </div>
                                  <div class="col-md-5">
                                    <strong>Tipo de documento:</strong>
                                  </div>
                                  <div class="col-md-7">
                                    {{ $item->Tipo_documento }}
                                  </div>
                                  <div class="col-md-5">
                                    <strong>N° de documento:</strong>
                                  </div>
                                  <div class="col-md-7">
                                    {{ $item->Numero_documento }}
                                  </div>
                                  <div class="col-md-5">
                                    <strong>Curso realizado:</strong>
                                  </div>
                                  <div class="col-md-7">
                                    {{ $item->Nombre_producto }}
                                  </div>
                                  <div class="col-md-5">
                                    <strong>Fecha inicial:</strong>
                                  </div>
                                  <div class="col-md-7">
                                    {{ $item->Fecha_inicial }}
                                  </div>
                                  <div class="col-md-5">
                                    <strong>Fecha final:</strong>
                                  </div>
                                  <div class="col-md-7">
                                    {{ $item->Fecha_final }}
                                  </div>
                                  <div class="col-md-5">
                                    <strong>Duración:</strong>
                                  </div>
                                  <div class="col-md-7">
                                    {{ $item->Duración }} horas
                                  </div>
                                  <div class="col-md-5">
                                    <strong>ciudad expedición:</strong>
                                  </div>
                                  <div class="col-md-7">
                                    {{ $item->Ciudad_expedición }}
                                  </div>
                                </div>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="sombra btn btn-secondary" data-bs-dismiss="modal">
                                  <i class="bi bi-x-circle">{{ __('Close') }}</i>
                                </button>
                              </div>
                            </div>
                          </div>
                        </div>
                      @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
          @endif
        </div>
      </div>
    </div>
  </div>

</x-students-layout>
