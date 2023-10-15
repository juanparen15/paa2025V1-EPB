<table >
    <thead>
        <tr>
            <th>SIIPAA2023-</th>
            <th>Descripción del Objeto contractual</th>
            <th>Fecha estimada de inicio del proceso(mes)</th>
            <th>Duración estimada del contrato(número de mes(es))</th>
            <th>Modalidad de selección </th>
            <th>Fuente de los recursos</th>
            <th>Valor total estimado</th>
            <th>Valor estimado en vigencia actual</th>
            <th>¿Se requieren vigencias futuras?</th>
            <th>Área o Dependencia Resposables</th>
            <th>Código Banco De Programas Y Proyectos De Inversión Nacional--BPIN</th>
            <th>¿Se requiere POAI?</th>
            <th>Tipo de zona de ejecucion del Contrato</th>
            <th>Tipo de Adquisición o contrato</th>
            <th>Tipo de Proceso contractual</th>
            <th>Tipo de Prioridad</th>
            <th>Estado solicitud vigencias futuras</th>
            <th>CODIGO UNSPSC</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($planadquisiciones as $planadquisicion)
        <tr>
            <td>{{$planadquisicion->id}}</td>
            <td>{{$planadquisicion->descripcioncont}}</td>
            <td>{{$planadquisicion->mese->nommes}}</td>
            <td>{{$planadquisicion->duracont}}</td>
            <td>{{$planadquisicion->modalidade->detmodalidad}}</td>
            <td>{{$planadquisicion->fuente->detfuente}}</td>
            <td>{{$planadquisicion->valorestimadocont}}</td>
            <td>{{$planadquisicion->valorestimadovig}}</td>
            <td>{{$planadquisicion->requiproyecto->detproyeto}}</td>
            <td>{{$planadquisicion->area->nomarea}}</td>
            <td>{{$planadquisicion->codbpim}}</td>
            <td>{{$planadquisicion->requipoai->detpoai}}</td>
            <td>{{$planadquisicion->tipozona->tipozona}}</td>
            <td>{{$planadquisicion->tipoadquisicione->dettipoadquisicion}}</td>
            <td>{{$planadquisicion->tipoproceso->dettipoproceso}}</td>
            <td>{{$planadquisicion->tipoprioridade->detprioridad}}</td>
            <td>{{$planadquisicion->estadovigencia->detestadovigencia}}</td>
            <td>
               
                @foreach ($planadquisicion->productos as $item)
                {{$item->id}},
                @endforeach

            </td>
        </tr>
        @endforeach
    </tbody>
</table>
