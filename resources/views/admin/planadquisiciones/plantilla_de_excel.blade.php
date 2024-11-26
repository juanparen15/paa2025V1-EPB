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
            <th>¿Debe cumplir con invertir mínimo el 30% de los recursos del presupuesto destinados a comprar alimentos,
                cumpliendo con lo establecido en la Ley 2046 de 2020, reglamentada por el Decreto 248 de 2021?</th>
            <th>¿El contrato incluye el suministro de bienes y servicios distintos a alimentos?</th>
        </tr>
    </thead>
    <tbody>

        <tr>
            <!-- Código UNSPSC -->
            <td>
                @foreach ($plan->productos as $index => $item)
                    {{ $item->id }}{{ $loop->last ? '' : ';' }}
                @endforeach
            </td>

            <!-- Descripción -->
            <td>{{ $plan->descripcioncont }}</td>

            <!-- Fecha estimada de inicio de proceso de selección (mes) -->
            <td>{{ $plan->mese->id }}</td>

            <!-- Fecha estimada de presentación de ofertas (mes) -->
            <td>{{ $plan->mese->id ?? 'N/A' }}</td>

            <!-- Duración del contrato (número) -->
            <td>{{ $plan->duracont }}</td>

            <!-- Duración del contrato (intervalo: días, meses, años) -->
            <td>{{ $plan->intervalo->codigo ?? '1' }}</td>

            <!-- Modalidad de selección -->
            <td>{{ $plan->modalidade->codigo ?? 'N/A' }}</td>

            <!-- Fuente de los recursos -->
            <td>{{ $plan->fuente->codigo }}</td>

            <!-- Valor total estimado -->
            <td>{{ $plan->valorestimadocont }}</td>

            <!-- Valor estimado en la vigencia actual -->
            <td>{{ $plan->valorestimadovig }}</td>

            <!-- ¿Se requieren vigencias futuras? -->
            <td>{{ $plan->vigenfutura->codigo }}</td>

            <!-- Estado de solicitud de vigencias futuras -->
            <td>{{ $plan->estadovigencia->codigo }}</td>

            <!-- Unidad de contratación (referencia) -->
            <td>{{ $plan->unidadContratacion ?? '' }}</td>

            <!-- Ubicación -->
            <td>{{ $plan->ubicacion ?? 'CO-BOY-15572' }}</td>

            <!-- Nombre del responsable -->
            <td>{{ $plan->area->nomarea ?? 'N/A' }}</td>

            <!-- Teléfono del responsable -->
            <td>{{ $plan->responsable->telefono ?? '3103127401' }}</td>

            <!-- Correo electrónico del responsable -->
            <td>{{ $plan->user->email ?? 'N/A' }}</td>

            <!-- ¿Debe cumplir con la ley? -->
            <td>{{ $plan->cumpleLey2046 ?? '0' }}</td>

            <!-- ¿El contrato incluye el suministro de bienes y servicios distintos a alimentos? -->
            <td>{{ $plan->suministroBienes ?? '1' }}</td>
        </tr>

    </tbody>
</table>
