<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col"><b>{{__('Acta_cierre')}}</b></th>
            <th scope="col"><b>{{__('Nombre_producto')}}</b></th>
            <th scope="col"><b>{{__('Nombre_completo_participante')}}</b></th>
            <th scope="col"><b>{{__('Tipo_documento')}}</b></th>
            <th scope="col"><b>{{__('Numero_documento')}}</b></th>
            <th scope="col"><b>{{__('Tipo_producto')}}</b></th>
            <th scope="col"><b>{{__('Fecha_inicial')}}</b></th>
            <th scope="col"><b>{{__('Fecha_final')}}</b></th>
            <th scope="col"><b>{{__('Duración')}}</b></th>
            <th scope="col"><b>{{__('Ciudad_expedición')}}</b></th>
            <th scope="col"><b>{{__('Firma_aliado')}}</b></th>
            <th scope="col"><b>{{__('Logo_aliado')}}</b></th>
            <th scope="col"><b>{{__('Sexo')}}</b></th>
            <th scope="col"><b>{{__('Telefono')}}</b></th>
            <th scope="col"><b>{{__('Email')}}</b></th>
            <th scope="col"><b>{{__('Empresa_entidad')}}</b></th>
            <th scope="col"><b>{{__('Ciudad_residencia')}}</b></th>
            <th scope="col"><b>{{__('Departamento_residencia')}}</b></th>
            <th scope="col"><b>{{__('Contenido_expuesto')}}</b></th>
            <th scope="col"><b>{{__('Presentacion_contenidos')}}</b></th>
            <th scope="col"><b>{{__('Mensaje_sugerencia')}}</b></th>
            <th scope="col"><b>{{__('Programa_academico')}}</b></th>
            <th scope="col"><b>{{__('Modalidad')}}</b></th>
            <th scope="col"><b>{{__('Sede')}}</b></th>
            <th scope="col"><b>{{__('Egresado')}}</b></th>
            <th scope="col"><b>{{__('Programa_egresado')}}</b></th>
            <th scope="col"><b>{{__('Docente')}}</b></th>
            <th scope="col"><b>{{__('Programa_docente')}}</b></th>
            <th scope="col"><b>{{__('Modalidad_docente')}}</b></th>
            <th scope="col"><b>{{__('Colaborador')}}</b></th>
            <th scope="col"><b>{{__('Cargo_colaborador')}}</b></th>
            <th scope="col"><b>{{__('Información_educativa')}}</b></th>
            <th scope="col"><b>{{__('Programa_interesado')}}</b></th>
            <th scope="col"><b>{{__('Asistencia')}}</b></th>
        </tr>
    </thead>
    <tbody>
        @foreach($loads as $load)
        <tr>
            <td>{{$load->Acta_cierre}}</td>
            <td>{{$load->Nombre_producto}}</td>
            <td>{{$load->Nombre_completo_participante}}</td>
            <td>{{$load->Tipo_documento}}</td>
            <td>{{$load->Numero_documento}}</td>
            <td>{{$load->Tipo_producto}}</td>
            <td>{{$load->Fecha_inicial}}</td>
            <td>{{$load->Fecha_final}}</td>
            <td>{{$load->Duración}}</td>
            <td>{{$load->Ciudad_expedición}}</td>
            <td>{{$load->Firma_aliado}}</td>
            <td>{{$load->Logo_aliado}}</td>
            <td>{{$load->Sexo}}</td>
            <td>{{$load->Telefono}}</td>
            <td>{{$load->Email}}</td>
            <td>{{$load->Empresa_entidad}}</td>
            <td>{{$load->Ciudad_residencia}}</td>
            <td>{{$load->Departamento_residencia}}</td>
            <td>{{$load->Contenido_expuesto}}</td>
            <td>{{$load->Presentacion_contenidos}}</td>
            <td>{{$load->Mensaje_sugerencia}}</td>
            <td>{{$load->Programa_academico}}</td>
            <td>{{$load->Modalidad}}</td>
            <td>{{$load->Sede}}</td>
            <td>{{$load->Egresado}}</td>
            <td>{{$load->Programa_egresado}}</td>
            <td>{{$load->Docente}}</td>
            <td>{{$load->Programa_docente}}</td>
            <td>{{$load->Modalidad_docente}}</td>
            <td>{{$load->Colaborador}}</td>
            <td>{{$load->Cargo_colaborador}}</td>
            <td>{{$load->Información_educativa}}</td>
            <td>{{$load->Programa_interesado}}</td>
            <td>{{$load->Asistencia}}</td>
        </tr>
        @endforeach
    </tbody>
</table>
