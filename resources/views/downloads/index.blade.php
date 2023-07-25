<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Downloads list') }}
    </h2>
  </x-slot>

  <div class="py-3">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
        <div class="container">
          <div class="row py-0">
            <div class="col-md-12 mx-auto py-4">
              <div class="card bg-light ">
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-6">
                      <strong>{{ __('Records downloads in database') . ': ' . count($loadscount) }}</strong>
                    </div>
                    <div class="col-md-6">
                      <form action="" method="get">
                        <div class="form-row flex-row-reverse">
                          <div class="col-md-4 my-1">
                            <input type="submit" class="sombra btn btn-primary" value="Buscar">
                          </div>
                          <div class="col-auto my-1">
                            <input type="text" class="form-control" name="texto" id="texto" value="{{ $texto }}">
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                  <div class="table-responsive">
                    @if ($loads->isEmpty())
                      <div class="col-md-6 mx-auto mt-3 text-center">
                        <strong>{{ __('No data to show') }}</strong>
                      </div>
                    @else
                      <table class="table align-middle table-striped table-hover table-sm mt-3">
                        <thead>
                          <tr>
                            <th></th>
                            <th>Nombre estudiante</th>
                            <th>Nombre producto</th>
                            <th>Número documento</th>
                          </tr>
                        </thead>
                        <tbody>
                          @php
                            $i = 1;
                          @endphp
                          @foreach ($loads as $load)
                          <tr>
                            <td>{{ $i }}</td>
                            <td>{{ $load->Nombre_completo_participante }}</td>
                            <td>{{ $load->Nombre_producto }}</td>
                            <td>{{ $load->Numero_documento }}</td>
                            <td>
                              <div class="btn-group" role="group" aria-label="Basic example">
                                <a class="sombra btn btn-info" href="#showModal{{ $load->id }}" data-bs-toggle="modal"><i class="bi bi-eye"></i></a>
                              </div>
                            </td>
                          </tr>
                          @php
                            $i += +1;
                          @endphp
                          <!-- showModal -->
                          <div class="modal fade" id="showModal{{ $load->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                              <div class="modal-content">
                                <div class="modal-header text-center">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">
                                      <strong>{{ Str::title($load->Nombre_completo_participante) }}</strong>
                                    </h1>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                      {{-- <div class="col-md-5">
                                          <strong>Tipo de participante:</strong>
                                      </div>
                                      <div class="col-md-7">
                                        {{ $load->participant_type }}
                                      </div>--}}
                                      <div class="col-md-5">
                                        <strong>Tipo de documento:</strong>
                                      </div>
                                      <div class="col-md-7">
                                        {{ $load->Tipo_documento }}
                                      </div>
                                      <div class="col-md-5">
                                        <strong>Número de documento:</strong>
                                      </div>
                                      <div class="col-md-7">
                                        {{ $load->Numero_documento }}
                                      </div>
                                      <div class="col-md-5">
                                        <strong>Curso realizado:</strong>
                                      </div>
                                      <div class="col-md-7">
                                        {{ $load->Nombre_producto }}
                                      </div>
                                      <div class="col-md-5">
                                        <strong>Consecutivo:</strong>
                                      </div>
                                      <div class="col-md-7">
                                        {{ $load->Consecutivo }}</div>
                                      <div class="col-md-5">
                                        <strong>Duración:</strong>
                                      </div>
                                      <div class="col-md-7">
                                        {{ $load->Duración }}
                                      </div>
                                      <div class="col-md-5">
                                        <strong>Ciudad expedición:</strong>
                                      </div>
                                      <div class="col-md-7">
                                        {{ $load->Ciudad_expedición }}</div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="sombra btn btn-secondary" data-bs-dismiss="modal">
                                    <i class="bi bi-x-circle"> {{ __('Close') }}</i>
                                  </button>
                                </div>
                              </div>
                            </div>
                          </div>
                          @endforeach
                        </tbody>
                      </table>
                    @endif
                  </div>
                </div>
                <div class="card-footer">
                  {{ $loads->links() }}
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</x-app-layout>
