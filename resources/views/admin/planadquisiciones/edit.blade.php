@extends('layouts.admin')
@section('title', 'Editar Plan Adquisiciones')
@section('style')
    <!-- Select2 -->
    {!! Html::style('adminlte/plugins/select2/css/select2.min.css') !!}
    {!! Html::style('adminlte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') !!}
@endsection
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Editar Plan Adquisiciones</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('planadquisiciones.index') }}">Plan de
                                    Adquisiciones</a></li>
                            <li class="breadcrumb-item active">Editar Plan Adquisiciones</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            {!! Form::model($planadquisicione, [
                'route' => ['planadquisiciones.update', $planadquisicione],
                'method' => 'PUT',
            ]) !!}
            @csrf
            <div class="card card-primary">
                {{--  <div class="card-header">
              <h3 class="card-title">General</h3>
            </div>  --}}
                <div class="card-body">
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="descripcioncont">Descripción del Objeto Contractual:</label>
                                <input type="text" name="descripcioncont" id="descripcioncont"
                                    value="{{ old('descripcioncont', $planadquisicione->descripcioncont) }}"
                                    class="form-control" required>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="valorestimadocont">Valor Total Estimado: $</label>
                                <input type="text" name="valorestimadocont" id="valorestimadocont"
                                    value="{{ old('valorestimadocont', $planadquisicione->valorestimadocont) }}"
                                    class="form-control" required>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="valorestimadovig">Valor Estimado en Vigencia Actual: $</label>
                                <input type="text" name="valorestimadovig" id="valorestimadovig"
                                    value="{{ old('valorestimadovig', $planadquisicione->valorestimadovig) }}"
                                    class="form-control" required>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="intervalo_id">Duración del contrato (intervalo: días, meses, años):</label>
                                <select class="select2 @error('intervalo_id') is-invalid @enderror" name="intervalo_id"
                                    id="intervalo_id" style="width: 100%;">
                                    @foreach ($intervalos as $intervalo)
                                        <option value="{{ $intervalo->id }}"
                                            {{ old('intervalo_id', $planadquisicione->intervalo_id) == $intervalo->id ? 'selected' : '' }}>
                                            {{ $intervalo->intervalo }}</option>
                                    @endforeach
                                </select>
                                @error('intervalo_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{--  Valores numéricos fin  --}}
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="duracont">Cantidad de días, meses, años:</label>
                                <input placeholder="Cantidad de días, meses, años" type="number" name="duracont"
                                    value="{{ old('duracont', $planadquisicione->duracont) }}" class="form-control"
                                    required>
                            </div>
                        </div>


                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="requiproyecto_id">¿Se Requiere Proyecto?:</label>
                                <select class="select2 @error('requiproyecto_id') is-invalid @enderror"
                                    name="requiproyecto_id" id="requiproyecto_id" style="width: 100%;">
                                    @foreach ($requiproyectos as $requiproyecto)
                                        <option value="{{ $requiproyecto->id }}"
                                            {{ old('requiproyecto_id', $planadquisicione->requiproyecto_id) == $requiproyecto->id ? 'selected' : '' }}>
                                            {{ $requiproyecto->detproyeto }}</option>
                                    @endforeach
                                </select>
                                @error('requiproyecto_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="codbpim">Código Banco De Programas Y Proyectos De Inversión
                                    Nacional--BPIN:</label>
                                <input type="text" name="codbpim" id="codbpim"
                                    value="{{ old('codbpim', $planadquisicione->codbpim) }}" class="form-control" required>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="requipoai_id">¿Se Requiere POAI?:</label>
                                <select class="select2 @error('requipoai_id') is-invalid @enderror" name="requipoai_id"
                                    id="requipoai_id" style="width: 100%;">

                                    @foreach ($requipoais as $requipoai)
                                        <option value="{{ $requipoai->id }}"
                                            {{ old('requipoai_id', $planadquisicione->requipoai_id) == $requipoai->id ? 'selected' : '' }}>
                                            {{ $requipoai->detpoai }}</option>
                                    @endforeach
                                </select>
                                @error('requipoai_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="vigenfutura_id">¿Se Requieren Vigencias Futuras?:</label>
                                <select class="select2 @error('vigenfutura_id') is-invalid @enderror" name="vigenfutura_id"
                                    id="vigenfutura_id" style="width: 100%;">

                                    @foreach ($vigenfuturas as $vigenfutura)
                                        <option value="{{ $vigenfutura->id }}"
                                            {{ old('vigenfutura_id', $planadquisicione->vigenfutura_id) == $vigenfutura->id ? 'selected' : '' }}>
                                            {{ $vigenfutura->detvigencia }}</option>
                                    @endforeach
                                </select>
                                @error('vigenfutura_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="estadovigencia_id">Estado Solicitud Vigencias Futuras:</label>
                                <select class="select2 @error('estadovigencia_id') is-invalid @enderror"
                                    name="estadovigencia_id" id="estadovigencia_id" style="width: 100%;">
                                    @foreach ($estadovigencias as $estadovigencia)
                                        <option value="{{ $estadovigencia->id }}"
                                            {{ old('estadovigencia_id', $planadquisicione->estadovigencia_id) == $estadovigencia->id ? 'selected' : '' }}>
                                            {{ $estadovigencia->detestadovigencia }}</option>
                                    @endforeach
                                </select>
                                @error('estadovigencia_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="tipozona_id">Tipo de Zona de Ejecucion del Contrato:</label>
                                <select class="select2 @error('tipozona_id') is-invalid @enderror" name="tipozona_id"
                                    id="tipozona_id" style="width: 100%;">
                                    @foreach ($tipozonas as $tipozona)
                                        <option value="{{ $tipozona->id }}"
                                            {{ old('tipozona_id', $planadquisicione->tipozona_id) == $tipozona->id ? 'selected' : '' }}>
                                            {{ $tipozona->tipozona }}</option>
                                    @endforeach
                                </select>
                                @error('tipozona_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="tipoproceso_id">Tipo de Proceso Contractual:</label>
                                <select class="select2 @error('tipoproceso_id') is-invalid @enderror"
                                    name="tipoproceso_id" id="tipoproceso_id" style="width: 100%;">

                                    @foreach ($tipoprocesos as $tipoproceso)
                                        <option value="{{ $tipoproceso->id }}"
                                            {{ old('tipoproceso_id', $planadquisicione->tipoproceso_id) == $tipoproceso->id ? 'selected' : '' }}>
                                            {{ $tipoproceso->dettipoproceso }}</option>
                                    @endforeach
                                </select>
                                @error('tipoproceso_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="modalidade_id">Modalidad de Selección:</label>
                                <select class="select2 @error('modalidade_id') is-invalid @enderror" name="modalidade_id"
                                    id="modalidade_id" style="width: 100%;">

                                    @foreach ($modalidades as $modalidad)
                                        <option value="{{ $modalidad->id }}"
                                            {{ old('modalidade_id', $planadquisicione->modalidade_id) == $modalidad->id ? 'selected' : '' }}>
                                            {{ $modalidad->detmodalidad }}</option>
                                    @endforeach
                                </select>
                                @error('modalidade_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="tipoadquisicione_id">Tipo de Adquisición o Contrato:</label>
                                <select class="select2 @error('tipoadquisicione_id') is-invalid @enderror"
                                    name="tipoadquisicione_id" id="tipoadquisicione_id" style="width: 100%;">

                                    @foreach ($tipoadquisiciones as $tipoadquisicion)
                                        <option value="{{ $tipoadquisicion->id }}"
                                            {{ old('tipoadquisicione_id', $planadquisicione->tipoadquisicione_id) == $tipoadquisicion->id ? 'selected' : '' }}>
                                            {{ $tipoadquisicion->dettipoadquisicion }}</option>
                                    @endforeach
                                </select>
                                @error('tipoadquisicione_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="fuente_id">Fuente de los Recursos:</label>
                                <select class="select2 @error('fuente_id') is-invalid @enderror" name="fuente_id"
                                    id="fuente_id" style="width: 100%;">

                                    @foreach ($fuentes as $fuentes)
                                        <option value="{{ $fuentes->id }}"
                                            {{ old('fuente_id', $planadquisicione->fuente_id) == $fuentes->id ? 'selected' : '' }}>
                                            {{ $fuentes->detfuente }}</option>
                                    @endforeach
                                </select>
                                @error('fuente_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="tipoprioridade_id">Tipo de Prioridad:</label>
                                <select class="select2 @error('tipoprioridade_id') is-invalid @enderror"
                                    name="tipoprioridade_id" id="tipoprioridade_id" style="width: 100%;">

                                    @foreach ($tipoprioridades as $tipoprioridad)
                                        <option value="{{ $tipoprioridad->id }}"
                                            {{ old('tipoprioridade_id', $planadquisicione->tipoprioridade_id) == $tipoprioridad->id ? 'selected' : '' }}>
                                            {{ $tipoprioridad->detprioridad }}</option>
                                    @endforeach
                                </select>
                                @error('tipoprioridade_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="mese_id">Fecha Estimada de Inicio del Proceso(Mes):</label>
                                <select class="select2 @error('mese_id') is-invalid @enderror" name="mese_id"
                                    id="mese_id" style="width: 100%;">

                                    @foreach ($meses as $mes)
                                        <option value="{{ $mes->id }}"
                                            {{ old('mese_id', $planadquisicione->mese_id) == $mes->id ? 'selected' : '' }}>
                                            {{ $mes->nommes }}</option>
                                    @endforeach
                                </select>
                                @error('mese_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="area_id">Área</label>
                                <select class="select2 @error('area_id') is-invalid @enderror" name="area_id"
                                    id="area_id" style="width: 100%;">
                                    <option disabled selected>Dependencia o Area Responsable:</option>
                                    @foreach ($areas as $area)
                                        <option value="{{ $area->id }}"
                                            {{ old('area_id', $planadquisicione->area_id) == $area->id ? 'selected' : '' }}>
                                            {{ $area->nomarea }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('area_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                    </div>


                    <div class="form-group">
                        <table class="table">
                            <thead class="thead-inverse">
                                <tr>
                                    <th>CODIGO UNSPSC: </th>
                                    <th>Producto:</th>
                                    <th>Acciones:</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($planadquisicione->productos as $producto)
                                    <tr>
                                        <td scope="row">{{ $producto->id }}</td>
                                        <td>{{ $producto->detproducto }}</td>
                                        <td>


                                            <a href="{{ route('retirar_producto', [$planadquisicione, $producto]) }}"
                                                class="btn btn-danger btn-sm">Eliminar</a>

                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>




                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
            <div class="row">
                <div class="col-12 mb-2">
                    <a href="{{ URL::previous() }}" class="btn btn-secondary">Cancel</a>
                    <input type="submit" value="Actualizar" class="btn btn-primary float-right">
                </div>
            </div>
            {!! Form::close() !!}
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->






@endsection
@section('script')

    <!-- Select2 -->
    {!! Html::script('adminlte/plugins/select2/js/select2.full.min.js') !!}
    <script>
        $(function() {

            //Initialize Select2 Elements
            $('.select2').select2()

        })
    </script>
    <script>
        $(document).ready(function() {
            $('#valorestimadocont').mask("#.##0", {
                reverse: true
            });
            $('#valorestimadovig').mask("#.##0", {
                reverse: true
            });
        });
    </script>



@endsection
