<x-students-layout>

  <div class="abslute flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-0 sm:pt-0">
        <div class="max-w-6xl mx-auto sm:px-1 lg:px-1">
            <div class="flex justify-center titulo-welcome">
                Certificados Cursos de Extensión
            </div>
            <div class="container">
                <div class="card bg-light mt-3 mb-3">
                  @if ($studentCertificates->isEmpty())
                    <div class="card-body">
                      <h5>
                        No tenemos registros en nuestra base de datos para el documento {{$documento}},
                        si considera que es un error por favor dar clic en el botón Centre de Asistencia - CUN, y coloca un requerimiento de tu caso.
                      </h5>
                    </div>
                    <div class="row text-center mx-auto">
                      <div class="col-sm-12 mb-2">
                        <a class="btn btn-danger sombra ml-1" href="https://servicioscun.zohodesk.com/portal/es/home" target="_blank" rel="noopener noreferrer">Centro de Asistencia - CUN</a>
                      </div>
                    </div>
                  @else
                    <div class="card-header text-center">
                      Bienvenido/a a la plataforma de generación de certificados de Desarrollo Profesional y Egresados de la CUN.
                      Aquí podrás acceder y descargar tus certificados de asistencia a los eventos que has participado. Además,
                      podrás consultar el histórico de tus certificados anteriores. Valoramos tu compromiso y participación en
                      nuestras actividades que contribuyen a tu desarrollo profesional.  Si tienes alguna pregunta o necesitas asistencia,
                      no dudes en contactarnos. ¡Gracias por ser parte de Desarrollo Profesional y Egresados de la CUN!"
                    </div>
                    <div class="card-body">
                        <div class="row text-center">
                          <table class="table align-middle table-striped table-hover table-sm mt-3">
                            <thead>
                              <tr>
                                <th></th>
                                <th>Nombre estudiante</th>
                                {{-- <th>tipo_participante</th> --}}
                                <th>Correo electrónico</th>
                                {{-- <th>tipo_documento</th> --}}
                                <th>Número documento</th>
                                <th>Nombre producto</th>
                                {{-- <th>fecha_realización</th> --}}
                                {{-- <th>duración</th> --}}
                                {{-- <th>modalidad</th> --}}
                                {{-- <th>ciudad_expedición</th> --}}
                              </tr>
                            </thead>
                            <tbody>
                              @php
                                $i= 1;
                              @endphp
                              @foreach ($studentCertificates as $item)
                                <tr>
                                  <td>{{$i}}</td>
                                  <td>{{$item->nombre_estudiante}}</td>
                                  {{-- <td>{{$load->tipo_participante}}</td> --}}
                                  <td>{{$item->email}}</td>
                                  {{-- <td>{{$load->tipo_documento}}</td> --}}
                                  <td>{{$item->numero_documento}}</td>
                                  <td>{{$item->nombre_producto}}</td>
                                  {{-- <td>{{$load->fecha_realización}}</td> --}}
                                  {{-- <td>{{$load->duración}}</td> --}}
                                  {{-- <td>{{$load->modalidad}}</td> --}}
                                  {{-- <td>{{$load->ciudad_expedición}}</td> --}}
                                  <td>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                      <a class="sombra btn btn-info" href="#showModal{{$item->id}}" data-bs-toggle="modal"><i class="bi bi-eye"></i></a>
                                      <a class="sombra btn btn-success" href="{{route('printPDF',$item->id)}}"><i class="bi bi-file-earmark-pdf"></i></a>
                                    </div>
                                  </td>
                                </tr>
                                @php
                                  $i += +1;
                                @endphp
                                <!-- showModal -->
                                <div class="modal fade" id="showModal{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                    <div class="modal-content">
                                      <div class="modal-header text-center">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel"><strong>{{Str::title($item->nombre_estudiante)}}</strong></h1>
                                      </div>
                                      <div class="modal-body">
                                        <div class="row">
                                          <div class="col-md-5">
                                            <strong>Tipo de participante:</strong>
                                          </div>
                                          <div class="col-md-7">{{$item->tipo_participante}}</div>
                                          <div class="col-md-5">
                                            <strong>Correo electrónico:</strong>
                                          </div>
                                          <div class="col-md-7">{{$item->email}}</div>
                                          <div class="col-md-5">
                                            <strong>Número de documento:</strong>
                                          </div>
                                          <div class="col-md-7">{{$item->tipo_documento}} {{$item->numero_documento}}</div>
                                          <div class="col-md-5">
                                            <strong>Curso realizado:</strong>
                                          </div>
                                          <div class="col-md-7">{{$item->nombre_producto}}</div>
                                          <div class="col-md-5">
                                            <strong>Usuario:</strong>
                                          </div>
                                          <div class="col-md-7">{{$item->fecha_realización}}</div>
                                          <div class="col-md-5">
                                            <strong>Duración:</strong>
                                          </div>
                                          <div class="col-md-7">{{$item->duración}}</div>
                                          <div class="col-md-5">
                                            <strong>Modalidad:</strong>
                                          </div>
                                          <div class="col-md-7">{{$item->modalidad}}</div>
                                          <div class="col-md-5">
                                            <strong>ciudad expedición:</strong>
                                          </div>
                                          <div class="col-md-7">{{$item->ciudad_expedición}}</div>
                                        </div>
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="sombra btn btn-secondary" data-bs-dismiss="modal"><i class="bi bi-x-circle"> {{__('Close')}}</i></button>
                                        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              @endforeach
                            </tbody>
                          </table>
                        </div>
                    </div>
                  @endif
                </div>
            </div>
        </div>
    </div>

</x-students-layout>
