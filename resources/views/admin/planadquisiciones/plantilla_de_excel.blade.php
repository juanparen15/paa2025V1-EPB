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
            <th>Área</th>
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
     
        <tr>
            <td>{{$plan->id}}</td>
            <td>{{$plan->descripcioncont}}</td>
            <td>{{$plan->mese->nommes}}</td>
            <td>{{$plan->duracont}}</td>
            <td>{{$plan->modalidade->detmodalidad}}</td>
            <td>{{$plan->fuente->detfuente}}</td>
            <td>{{$plan->valorestimadocont}}</td>
            <td>{{$plan->valorestimadovig}}</td>
            <td>{{$plan->requiproyecto->detproyeto}}</td>
            <td>{{$plan->area->nomarea}}</td>
            <td>{{$plan->codbpim}}</td>
            <td>{{$plan->requipoai->detpoai}}</td>
            <td>{{$plan->tipozona->tipozona}}</td>
            <td>{{$plan->tipoadquisicione->dettipoadquisicion}}</td>
            <td>{{$plan->tipoproceso->dettipoproceso}}</td>
            <td>{{$plan->tipoprioridade->detprioridad}}</td>
            <td>{{$plan->estadovigencia->detestadovigencia}}</td>
            <td>
               
                @foreach ($plan->productos as $producto)
                {{$producto->id}},
                @endforeach

            </td>
        </tr>
   
    </tbody>
</table>
