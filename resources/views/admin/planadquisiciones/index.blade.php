@extends('layouts.admin')
@section('title', 'Listado Plan Aquisiciones')
@section('style')
    <!-- SweetAlert2 -->
    {!! Html::style('adminlte/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') !!}
    <!-- DataTables -->
    {!! Html::style('adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') !!}
    {!! Html::style('adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') !!}
    {!! Html::style('adminlte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') !!}
@endsection
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        {{--  <h1 class="m-0">Usuarios del sistema</h1>  --}}
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
                            <li class="breadcrumb-item active">Listado Plan Adquisiciones</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Listado Plan Adquisiciones</h3>

                        <div class="card-tools">
                            {{-- @can('planadquisiciones.create') --}}
                            <a href="{{ route('planadquisiciones.create') }}" class="btn btn-primary">
                                <i class="fas fa-parking"></i> Agregar Nuevo Plan Adquisicion
                            </a>
                            {{-- @endcan --}}

                            {{-- @can('planadquisiciones.export')
                                <a href="{{ route('planadquisiciones.export') }}" class="btn btn-success">
                                    <i class="far fa-file-excel"></i> Exportar Todo
                                </a>
                            @endcan --}}

                            <form method="GET" action="{{ route('planadquisiciones.export') }}" class="form-inline">
                                <input type="hidden" name="vigencia" value="{{ request('vigencia', date('Y')) }}">
                                {{-- <a class="btn btn-success"><i class="far fa-file-excel"></i> Exportar Todo
                                </a> --}}
                                <button type="submit" class="btn btn-success"><i class="far fa-file-excel"></i> Exportar Todo</button>
                            </form>
                        </div>

                        <div class="card-tools">
                            <form method="GET" action="{{ route('planadquisiciones.index') }}" class="form-inline">
                                <label for="vigencia" class="mr-2">Seleccionar Vigencia:</label>
                                <select name="vigencia" id="vigencia" class="form-control mr-3"
                                    onchange="this.form.submit()">
                                    <option value="{{ date('Y') }}"
                                        {{ request('vigencia') == date('Y') ? 'selected' : '' }}>Vigencia Actual</option>
                                    @foreach ($years as $year)
                                        <option value="{{ $year }}"
                                            {{ request('vigencia') == $year ? 'selected' : '' }}>Vigencia
                                            {{ $year }}</option>
                                    @endforeach
                                </select>
                            </form>

                            {{-- <form method="GET" action="{{ route('planadquisiciones.export') }}" class="form-inline">
                                <label for="vigencia" class="mr-2">Seleccionar Vigencia:</label>
                                <select name="vigencia" id="vigencia" class="form-control mr-3"
                                    onchange="this.form.submit()">
                                    <option value="{{ date('Y') }}"
                                        {{ request('vigencia') == date('Y') ? 'selected' : '' }}>
                                        Vigencia Actual
                                    </option>
                                    @foreach ($years as $year)
                                        <option value="{{ $year }}"
                                            {{ request('vigencia') == $year ? 'selected' : '' }}>
                                            Vigencia {{ $year }}
                                        </option>
                                    @endforeach
                                </select>
                            </form> --}}
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive">
                        <table id="example2" class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th>SIIPAA {{ request('vigencia') ?? date('Y') }}</th>
                                    <th>Fecha Estimada de Inicio del Proceso(Mes)</th>
                                    <th>Duración del contrato (intervalo: días, meses, años)</th>
                                    <th>Cantidad de días, meses, años</th>
                                    <th>Modalidad de Selección </th>
                                    <th>Fuente de los Recursos</th>
                                    <th>Valor Total Estimado $</th>
                                    <th>Descripción del Objeto Contractual</th>
                                    <th>Valor Estimado en Vigencia Actual $</th>
                                    <th>¿Se Requiere Proyecto?</th>
                                    <th>Dependencia o Area Responsable:</th>
                                    <th>Código Banco De Programas Y Proyectos De Inversión Nacional--BPIN:</th>
                                    <th>¿Se Requiere POAI?</th>
                                    <th>Tipo de Zona de Ejecucion del Contrato</th>
                                    <th>Tipo de Adquisición o Contrato</th>
                                    <th>Tipo de Proceso Contractual</th>
                                    <th>Tipo de Prioridad</th>
                                    <th>Estado Solicitud Vigencias Futuras</th>
                                    <th>Fecha de Registro</th>
                                    <th>ACCIONES</th>

                                </tr>
                            </thead>
                            <tbody>


                                @foreach ($planadquisiciones as $planadquisicion)
                                    <tr>
                                        <td>{{ $planadquisicion->id }}</td>
                                        <td>{{ $planadquisicion->mese->nommes ?? 'N/A' }}</td>
                                        <td>{{ $planadquisicion->intervalo->intervalo ?? 'N/A' }}</td>
                                        <td>{{ $planadquisicion->duracont }}</td>
                                        <td>{{ $planadquisicion->modalidade->detmodalidad ?? 'N/A' }}</td>
                                        <td>{{ $planadquisicion->fuente->detfuente ?? 'N/A' }}</td>
                                        <td>{{ $planadquisicion->valorestimadocont }} COP</td>
                                        <td>{{ $planadquisicion->descripcioncont }}</td>
                                        <td>{{ $planadquisicion->valorestimadovig }} COP</td>
                                        <td>{{ $planadquisicion->requiproyecto->detproyeto ?? 'N/A' }}</td>
                                        <td>{{ $planadquisicion->area->nomarea ?? 'N/A' }}</td>
                                        <td>{{ $planadquisicion->codbpim }}</td>
                                        <td>{{ $planadquisicion->requipoai->detpoai ?? 'N/A' }}</td>
                                        <td>{{ $planadquisicion->tipozona->tipozona ?? 'N/A' }}</td>
                                        <td>{{ $planadquisicion->tipoadquisicione->dettipoadquisicion ?? 'N/A' }}</td>
                                        <td>{{ $planadquisicion->tipoproceso->dettipoproceso ?? 'N/A' }}</td>
                                        <td>{{ $planadquisicion->tipoprioridade->detprioridad ?? 'N/A' }}</td>
                                        <td>{{ $planadquisicion->estadovigencia->detestadovigencia ?? 'N/A' }}</td>
                                        <td>{{ $planadquisicion->created_at ?? 'N/A' }}</td>


                                        <td>
                                            <form action="{{ route('planadquisiciones.destroy', $planadquisicion) }}"
                                                method="POST">
                                                @csrf
                                                @method('delete')

                                                @if (request('vigencia') == date('Y'))
                                                    <a class="btn btn-primary btn-sm"
                                                        href="{{ route('agregar_producto', $planadquisicion) }}">Agregar
                                                        producto</a>
                                                    <a class="btn btn-success btn-sm"
                                                        href="{{ route('exportar_planadquisiciones_excel', $planadquisicion) }}">
                                                        <i class="far fa-file-excel"></i> Exportar
                                                    </a>
                                                    <a class="btn btn-primary btn-sm"
                                                        href="{{ route('planadquisiciones.edit', $planadquisicion) }}">Editar</a>
                                                    <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                                @else
                                                    {{-- @can('exportar_planadquisiciones_excel') --}}
                                                    <a class="btn btn-success btn-sm"
                                                        href="{{ route('exportar_planadquisiciones_excel', $planadquisicion) }}">
                                                        <i class="far fa-file-excel"></i> Exportar
                                                    </a>
                                                    {{-- @endcan --}}

                                                    {{-- @can('planadquisiciones.show') --}}
                                                    <a class="btn btn-info btn-sm"
                                                        href="{{ route('planadquisiciones.show', $planadquisicion) }}">Detalles</a>
                                                    {{-- @endcan --}}
                                                @endif
                                                {{-- Común para todas las vigencias
                                                <a class="btn btn-info btn-sm"
                                                    href="{{ route('planadquisiciones.show', $planadquisicion) }}">Detalles</a> --}}

                                                {{-- @can('agregar_producto') --}}
                                                {{-- <a class="btn btn-primary btn-sm"
                                                    href="{{ route('agregar_producto', $planadquisicion) }}">
                                                    Agregar producto
                                                </a> --}}
                                                {{-- @endcan --}}

                                                {{-- @can('exportar_planadquisiciones_excel') --}}
                                                {{-- <a class="btn btn-success btn-sm"
                                                    href="{{ route('exportar_planadquisiciones_excel', $planadquisicion) }}">
                                                    <i class="far fa-file-excel"></i> Exportar
                                                </a> --}}
                                                {{-- @endcan --}}


                                                {{-- @can('planadquisiciones.edit') --}}
                                                {{-- <a class="btn btn-primary btn-sm"
                                                        href="{{ route('planadquisiciones.edit', $planadquisicion) }}">Editar</a> --}}
                                                {{-- @endcan --}}

                                                {{-- @can('planadquisiciones.destroy') --}}
                                                {{-- <button type="submit" class="btn btn-danger btn-sm">Eliminar</button> --}}
                                                {{-- @endcan --}}
                                            </form>
                                        </td>
                                    </tr>
                                    {{-- @empty
                                        <tr>
                                            <td colspan="5">No hay registros disponibles para el año seleccionado.</td>
                                        </tr> --}}
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
@endsection
@section('script')
    <!-- SweetAlert2 -->
    {!! Html::script('adminlte/plugins/sweetalert2/sweetalert2.min.js') !!}

    @if (session('flash') == 'registrado')
        <script>
            $(function() {
                var Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000
                });
                Toast.fire({
                    icon: 'success',
                    title: 'El Plan de Adquisiciones se Creó con Exito.'
                })
            });
        </script>
    @endif
    @if (session('flash') == 'actualizado')
        <script>
            $(function() {
                var Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000
                });
                Toast.fire({
                    icon: 'success',
                    title: 'El Plan de Adquisiciones se Actualizó con Exito.'
                })
            });
        </script>
    @endif
    @if (session('flash') == 'eliminado')
        <script>
            Swal.fire(
                '¡Eliminado!',
                'El Plan de Adquisiciones se Elimino con Exito.',
                'success'
            )
        </script>
    @endif
    <script>
        function enviar_formulario() {
            Swal.fire({
                title: '¿Estas seguro?',
                text: "¡No podrás revertir esto!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sí, estoy seguro!',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.delete_form.submit();
                }
            })
        }
    </script>

    <!-- DataTables  & Plugins -->
    {!! Html::script('adminlte/plugins/datatables/jquery.dataTables.min.js') !!}
    {!! Html::script('adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') !!}
    {!! Html::script('adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js') !!}
    {!! Html::script('adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') !!}
    {!! Html::script('adminlte/plugins/datatables-buttons/js/dataTables.buttons.min.js') !!}
    {!! Html::script('adminlte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') !!}
    {!! Html::script('adminlte/plugins/jszip/jszip.min.js') !!}
    {!! Html::script('adminlte/plugins/pdfmake/pdfmake.min.js') !!}
    {!! Html::script('adminlte/plugins/pdfmake/vfs_fonts.js') !!}
    {!! Html::script('adminlte/plugins/datatables-buttons/js/buttons.html5.min.js') !!}
    {!! Html::script('adminlte/plugins/datatables-buttons/js/buttons.print.min.js') !!}
    {!! Html::script('adminlte/plugins/datatables-buttons/js/buttons.colVis.min.js') !!}
    @include('includes._datatable_language')
@endsection
