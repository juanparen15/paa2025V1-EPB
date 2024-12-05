@if (auth()->user()->hasRole('Admin') || auth()->user()->hasRole('Supervisor'))
    <table>
        <thead>
            <tr>
                <th>Código UNSPSC (cada código separado por ;)</th>
                <th>Descripción</th>
                <th>Fecha estimada de inicio de proceso de selección (mes)</th>
                <th>Fecha estimada de presentación de ofertas (mes)</th>
                <th>Duración del contrato (número)</th>
                <th>Duración del contrato (intervalo: días, meses, años)</th>
                <th>Modalidad de selección</th>
                <th>Fuente de los recursos</th>
                <th>Valor total estimado</th>
                <th>Valor estimado en la vigencia actual</th>
                <th>¿Se requieren vigencias futuras?</th>
                <th>Estado de solicitud de vigencias futuras</th>
                <th>Unidad de contratación (referencia)</th>
                <th>Ubicación</th>
                <th>Nombre del responsable</th>
                <th>Teléfono del responsable</th>
                <th>Correo electrónico del responsable</th>
                <th>¿Debe cumplir con invertir mínimo el 30% de los recursos del presupuesto destinados a comprar
                    alimentos,
                    cumpliendo con lo establecido en la Ley 2046 de 2020, reglamentada por el Decreto 248 de 2021?</th>
                <th>¿El contrato incluye el suministro de bienes y servicios distintos a alimentos?</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($planadquisiciones as $planadquisicion)
                <tr>
                    <td>
                        @foreach ($planadquisicion->productos as $index => $item)
                            {{ $item->id }}{{ $loop->last ? '' : ';' }}
                        @endforeach
                    </td>

                    <td>{{ $planadquisicion->descripcioncont }}</td>

                    <td>{{ $planadquisicion->mese->id }}</td>

                    <td>{{ $planadquisicion->mese->id ?? 'N/A' }}</td>

                    <td>{{ $planadquisicion->duracont }}</td>

                    <td>{{ $planadquisicion->intervalo->codigo ?? '1' }}</td>

                    <td>{{ $planadquisicion->modalidade->codigo ?? 'N/A' }}</td>

                    <td>{{ $planadquisicion->fuente->codigo ?? 'N/A' }}</td>

                    <td>
                        {{ $planadquisicion->valorestimadocont }}
                    </td>
                    <td>
                        {{ $planadquisicion->valorestimadovig }}
                    </td>

                    <td>{{ $planadquisicion->vigenfutura->codigo }}</td>

                    <td>{{ $planadquisicion->estadovigencia->codigo }}</td>

                    <td>{{ $planadquisicion->unidadContratacion ?? '' }}</td>

                    <td>{{ $planadquisicion->ubicacion ?? 'CO-BOY-15572' }}</td>

                    <td>{{ $planadquisicion->area->nomarea ?? 'N/A' }}</td>

                    <td>{{ $planadquisicion->responsable->telefono ?? '3103127401' }}</td>

                    <td>{{ $planadquisicion->user->email ?? 'N/A' }}</td>

                    <td>{{ $planadquisicion->cumpleLey2046 ?? '0' }}</td>

                    <td>{{ $planadquisicion->suministroBienes ?? '1' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@else
    <table>
        <thead>
            <tr>
                <th>SIIPAA {{ request('vigencia') ?? date('Y') }}</th>
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
                <th>Fecha de Registro</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($planadquisiciones as $planadquisicion)
                <tr>
                    <td>{{ $planadquisicion->id }}</td>
                    <td>{{ $planadquisicion->descripcioncont }}</td>
                    <td>{{ $planadquisicion->mese->nommes }}</td>
                    <td>{{ $planadquisicion->duracont }}</td>
                    <td>{{ $planadquisicion->modalidade->detmodalidad }}</td>
                    <td>{{ $planadquisicion->fuente->detfuente ?? 'N/A' }}</td>
                    <td>{{ $planadquisicion->valorestimadocont }}</td>
                    <td>{{ $planadquisicion->valorestimadovig }}</td>
                    <td>{{ $planadquisicion->requiproyecto->detproyeto }}</td>
                    <td>{{ $planadquisicion->area->nomarea }}</td>
                    <td>{{ $planadquisicion->codbpim }}</td>
                    <td>{{ $planadquisicion->requipoai->detpoai }}</td>
                    <td>{{ $planadquisicion->tipozona->tipozona }}</td>
                    <td>{{ $planadquisicion->tipoadquisicione->dettipoadquisicion }}</td>
                    <td>{{ $planadquisicion->tipoproceso->dettipoproceso }}</td>
                    <td>{{ $planadquisicion->tipoprioridade->detprioridad }}</td>
                    <td>{{ $planadquisicion->estadovigencia->detestadovigencia }}</td>
                    <td>
                        @foreach ($planadquisicion->productos as $item)
                            {{ $item->id }},
                        @endforeach
                    </td>
                    <td>{{ $planadquisicion->created_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endif
