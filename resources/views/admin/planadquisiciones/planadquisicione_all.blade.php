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
        @foreach ($planadquisiciones as $planadquisicion)
            <tr>
                <!-- Código UNSPSC separado por ';' -->
                <td>
                    @foreach ($planadquisicion->productos as $index => $item)
                        {{ $item->id }}{{ $loop->last ? '' : ';' }}
                    @endforeach
                </td>

                <!-- Descripción -->
                <td>{{ $planadquisicion->descripcioncont }}</td>

                <!-- Fecha estimada de inicio de proceso de selección (mes) -->
                <td>{{ $planadquisicion->mese->id }}</td>

                <!-- Fecha estimada de presentación de ofertas (mes) -->
                <td>{{ $planadquisicion->mese->id ?? 'N/A' }}</td>
                <!-- Ajustar según el nombre exacto de la columna -->

                <!-- Duración del contrato (número) -->
                <td>{{ $planadquisicion->duracont }}</td>

                <!-- Duración del contrato (intervalo: días, meses, años) -->
                <td>{{ $planadquisicion->intervaloDuracion ?? 'N/A' }}</td>
                <!-- Ajustar según el nombre exacto de la columna -->

                <!-- Modalidad de selección -->
                <td>{{ $planadquisicion->modalidade->detmodalidad }}</td>

                <!-- Fuente de los recursos -->
                <td>{{ $planadquisicion->fuente->detfuente }}</td>

                <!-- Valor total estimado -->
                <td>
                    {{ is_numeric($planadquisicion->valorestimadocont) ? number_format($planadquisicion->valorestimadocont, 0, '', '') . ' COP' : 'N/A' }}
                </td>


                <!-- Valor estimado en la vigencia actual -->
                <td>
                    {{ is_numeric($planadquisicion->valorestimadovig) ? number_format($planadquisicion->valorestimadovig, 0, '', '') . ' COP' : 'N/A' }}
                </td>


                <!-- ¿Se requieren vigencias futuras? -->
                <td>{{ $planadquisicion->requiproyecto->detproyeto == 'Sí' ? '1' : '0' }}</td>

                <!-- Estado de solicitud de vigencias futuras -->
                <td>{{ $planadquisicion->estadovigencia->detestadovigencia }}</td>

                <!-- Unidad de contratación (referencia) -->
                <td>{{ $planadquisicion->unidadContratacion ?? 'N/A' }}</td>
                <!-- Ajustar según el nombre exacto de la columna -->

                <!-- Ubicación -->
                <td>{{ $planadquisicion->ubicacion ?? 'N/A' }}</td>
                <!-- Ajustar según el nombre exacto de la columna -->

                <!-- Nombre del responsable -->
                <td>{{ $planadquisicion->responsable->nombre ?? 'N/A' }}</td>
                <!-- Ajustar según el nombre exacto de la relación/columna -->

                <!-- Teléfono del responsable -->
                <td>{{ $planadquisicion->responsable->telefono ?? 'N/A' }}</td>
                <!-- Ajustar según el nombre exacto de la relación/columna -->

                <!-- Correo electrónico del responsable -->
                <td>{{ $planadquisicion->responsable->correo ?? 'N/A' }}</td>
                <!-- Ajustar según el nombre exacto de la relación/columna -->

                <!-- ¿Debe cumplir con la ley? -->
                <td>{{ $planadquisicion->cumpleLey2046 ?? 'No' }}</td>
                <!-- Ajustar según el nombre exacto de la columna -->

                <!-- ¿El contrato incluye el suministro de bienes y servicios distintos a alimentos? -->
                <td>{{ $planadquisicion->suministroBienes ?? 'No' }}</td>
                <!-- Ajustar según el nombre exacto de la columna -->
            </tr>
        @endforeach
    </tbody>
</table>
