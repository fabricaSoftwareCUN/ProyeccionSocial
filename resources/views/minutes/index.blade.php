<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Loads list') }}
    </h2>
  </x-slot>

  <div class="py-3">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
        <div class="container">
          <div class="row py-0">
            <div class="col-md-12 mx-auto py-4">
              <div class="card bg-light mb-2">
                <div class="card-header">
                  <div class="row">
                    <div class="col-md-8 py-2">
                      Actas de cierre generadas
                    </div>
                    <div class="col-md-4 flex-row-reverse"></div>
                  </div>
                </div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-8 mx-auto text-center"></div>
                  </div>
                </div>
              </div>
              <div class="card bg-light">
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-6">
                        {{ __('Records loads in database') . ': ' . count($minutes) }}
                    </div>
                    <div class="col-md-6"></div>
                  </div>
                  <div class="table-responsive">
                    @if ($minutes->isEmpty())
                      <div class="col-md-6 mx-auto mt-3 text-center">
                        <strong>{{ __('No data to show') }}</strong>
                      </div>
                    @else
                      <table class="table align-middle table-striped table-hover table-sm mt-3">
                        <thead>
                          <tr>
                            <th></th>
                            <th>Acta de cierre</th>
                            <th>Nombre producto</th>
                            <th>Fecha de carga</th>
                          </tr>
                        </thead>
                        <tbody>
                          @php
                            $i = 1;
                          @endphp
                          @foreach ($minutes as $load)
                          <tr>
                            <td>{{ $i }}</td>
                            <td>{{ $load->Acta_cierre }}</td>
                            <td>{{ $load->Nombre_producto }}</td>
                            {{-- <td>{{ \Carbon\Carbon::parse(strtotime($load->created_at))->formatLocalized('%d-%m-%Y') }}</td> --}}
                            <td>{{ $load->created_at }}</td>
                            <td>
                              <div class="btn-group" role="group" aria-label="Basic example">
                                <a class="sombra btn btn-sm btn-info" onclick="mostrar()" href="{{route('printMinutes', $load->Acta_cierre)}}">
                                  <i class="bi bi-eye"></i>
                                </a>
                                <a class="sombra btn btn-sm btn-danger" onclick="mostrar()" href="{{route('deleteMinutes', $load->Acta_cierre)}}">
                                  <i class="bi bi-trash"></i>
                                </a>
                              </div>
                            </td>
                          </tr>
                          @php
                            $i += +1;
                          @endphp
                          @endforeach
                        </tbody>
                      </table>
                    @endif
                  </div>
                </div>
                <div class="card-footer"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</x-app-layout>
