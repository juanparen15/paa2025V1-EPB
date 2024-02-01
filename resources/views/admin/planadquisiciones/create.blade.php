@extends('layouts.admin')
@section('title','Plan Aquisiciones')
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
            <h1>Plan Adquisiciones</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('home')}}">Inicio</a></li>
              <li class="breadcrumb-item"><a href="{{route('planadquisiciones.index')}}">Plan de Adquisiciones </a></li>
              <li class="breadcrumb-item active">Plan Adquisiciones</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        {!! Form::open(['route'=>'planadquisiciones.store', 'method'=>'POST']) !!}
        <div class="card">
            <div class="card-body">

                <div class="form-row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="descripcioncont">Descripción del Objeto Contractual:</label>
                            <input type="text" placeholder="Escriba la Descripción del Objeto Contractual" name="descripcioncont" id="descripcioncont" class="form-control" required>
                        </div>
                    </div>


                    {{--  Valores numéricos   --}}
                    <div class="col-md-3">
                        <label>Valor Total Estimado:</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text" id="basic-addon1">$</span>
                            </div>
                            <input placeholder="Escriba el Valor Total Estimado" type="text" class="form-control"  name="valorestimadocont" id="valorestimadocont" required>
                        </div>
                    </div>


                    <div class="col-md-3">
                        <label>Valor Estimado en Vigencia Actual:</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text" id="basic-addon1">$</span>
                            </div>
                            <input placeholder="Escriba el Valor Estimado en Vigencia Actual" type="text" class="form-control"  name="valorestimadovig" id="valorestimadovig" required>
                        </div>
                    </div>


                    {{--  Valores numéricos fin  --}}
                    <div class="col-md-4">
                        <div class="form-group">
                          <label for="duracont">Duración Estimada del Contrato(Número de Mes(es)):</label>
                          <input placeholder="Escriba la Duración Estimada del Contrato(Número de Mes(es))" type="text" name="duracont" id="duracont" class="form-control" required>
                        </div>
                    </div>


                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="requiproyecto_id">¿Se Requiere Proyecto?:</label>
                            <select class="select2 @error('requiproyecto_id') is-invalid @enderror" name="requiproyecto_id" id="requiproyecto_id" style="width: 100%;">
                                <option disabled selected>Seleccione Si/No Requiere Proyecto</option>
                                @foreach ($requiproyectos as $requiproyecto)
                                    <option value="{{ $requiproyecto->id }}"
                                    {{ old('requiproyecto_id') == $requiproyecto->id ? 'selected' : ''}}
                                    >{{ $requiproyecto->detproyeto }}</option>
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
                           <label for="codbpim">Código Banco De Programas Y Proyectos De Inversión Nacional--BPIN:</label>
                           <input type="text" placeholder="Escriba el Código Banco De Programas Y Proyectos De Inversión Nacional--BPIN" name="codbpim" id="codbpim" class="form-control" required>
                        </div>
                    </div>


                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="requipoai_id">¿Se Requiere POAI?:</label>
                            <select class="select2 @error('requipoai_id') is-invalid @enderror" name="requipoai_id" id="requipoai_id" style="width: 100%;">
                            <option disabled selected>Seleccione Si/No Requiere POAI</option>
                                @foreach ($requipoais as $requipoai)
                                    <option value="{{ $requipoai->id }}"
                                    {{ old('requipoai_id') == $requipoai->id ? 'selected' : ''}}
                                    >{{ $requipoai->detpoai }}</option>
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
                            <select class="select2 @error('vigenfutura_id') is-invalid @enderror" name="vigenfutura_id" id="vigenfutura_id" style="width: 100%;">
                                <option disabled selected>Seleccione Si/No Requieren Vigencias Futuras</option>
                                @foreach ($vigenfuturas as $vigenfutura)
                                    <option value="{{ $vigenfutura->id }}"
                                    {{ old('vigenfutura_id') == $vigenfutura->id ? 'selected' : ''}}
                                    >{{ $vigenfutura->detvigencia }}</option>
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
                            <select class="select2 @error('estadovigencia_id') is-invalid @enderror" name="estadovigencia_id" id="estadovigencia_id" style="width: 100%;">
                                <option disabled selected>Seleccione el Estado Solicitud Vigencias Futuras</option>
                                @foreach ($estadovigencias as $estadovigencia)
                                    <option value="{{ $estadovigencia->id }}"
                                    {{ old('estadovigencia_id') == $estadovigencia->id ? 'selected' : ''}}
                                    >{{ $estadovigencia->detestadovigencia }}</option>
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
                            <select class="select2 @error('tipozona_id') is-invalid @enderror" name="tipozona_id" id="tipozona_id" style="width: 100%;">
                                <option disabled selected>Seleccione el Tipo de Zona de Ejecucion del Contrato</option>
                                @foreach ($tipozonas as $tipozona)
                                    <option value="{{ $tipozona->id }}"
                                    {{ old('tipozona_id') == $tipozona->id ? 'selected' : ''}}
                                    >{{ $tipozona->tipozona }}</option>
                                @endforeach
                            </select>
                            @error('tipozona_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>                  
                    
                    
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="tipoproceso_id">Tipo de Proceso Contractual:</label>
                            <select class="select2 @error('tipoproceso_id') is-invalid @enderror" name="tipoproceso_id" id="tipoproceso_id" style="width: 100%;">
                                <option disabled selected>Seleccione el Tipo de Proceso Contractual</option>
                                @foreach ($tipoprocesos as $tipoproceso)
                                    <option value="{{ $tipoproceso->id }}"
                                    {{ old('tipoproceso_id') == $tipoproceso->id ? 'selected' : ''}}
                                    >{{ $tipoproceso->dettipoproceso }}</option>
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
                            <label for="modalidade_id">Modalidad de Selección Contratual:</label>
                            <select class="select2 @error('modalidade_id') is-invalid @enderror" name="modalidade_id" id="modalidade_id" style="width: 100%;">
                                <option disabled selected>Seleccione el Tipo Modalidad de Selección Contratual</option>
                                @foreach ($modalidades as $modalidad)
                                    <option value="{{ $modalidad->id }}"
                                    {{ old('modalidade_id') == $modalidad->id ? 'selected' : ''}}
                                    >{{ $modalidad->detmodalidad }}</option>
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
                            <select class="select2 @error('tipoadquisicione_id') is-invalid @enderror" name="tipoadquisicione_id" id="tipoadquisicione_id" style="width: 100%;">
                                <option disabled selected>Seleccione el Tipo de Adquisición o Contrato</option>
                                @foreach ($tipoadquisiciones as $tipoadquisicion)
                                    <option value="{{ $tipoadquisicion->id }}"
                                    {{ old('tipoadquisicione_id') == $tipoadquisicion->id ? 'selected' : ''}}
                                    >{{ $tipoadquisicion->dettipoadquisicion }}</option>
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
                        <label>Fuentes de los Recursos:</label>
                        @foreach ($fuentes as $fuente)
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="fuente_id[]" id="fuente_{{ $fuente->id }}" value="{{ $fuente->id }}" {{ in_array($fuente->id, old('fuente_id', [])) ? 'checked' : '' }}>
                                <label class="form-check-label" for="fuente_{{ $fuente->id }}">
                                {{ $fuente->detfuente }}
                                </label>
                            </div>
                        @endforeach
                        @error('fuentes')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    </div>
                    
                    
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="tipoprioridade_id">Tipo de Prioridad:</label>
                            <select class="select2 @error('tipoprioridade_id') is-invalid @enderror" name="tipoprioridade_id" id="tipoprioridade_id" style="width: 100%;">
                                <option disabled selected>Seleccione el Tipo de Prioridad</option>
                                @foreach ($tipoprioridades as $tipoprioridad)
                                    <option value="{{ $tipoprioridad->id }}"
                                    {{ old('tipoprioridade_id') == $tipoprioridad->id ? 'selected' : ''}}
                                    >{{ $tipoprioridad->detprioridad }}</option>
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
                            <label for="mese_id">Fecha Estimada de Inicio del Proceso(Mes)</label>
                            <select class="select2 @error('mese_id') is-invalid @enderror" name="mese_id" id="mese_id" style="width: 100%;">
                                <option disabled selected>Seleccione la Fecha Estimada de Inicio del Proceso(Mes)</option>
                                @foreach ($meses as $mes)
                                    <option value="{{ $mes->id }}"
                                    {{ old('mese_id') == $mes->id ? 'selected' : ''}}
                                    >{{ $mes->nommes }}</option>
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
                          <label for="area_id">Dependencia o Área:</label>
                          <select class="select2 @error('area_id') is-invalid @enderror" name="area_id" id="area_id" style="width: 100%;">      
                             <option disabled selected>Seleccione una Dependencia o Área</option>
                             @foreach ($areas as $area)
                                 <option value="{{ $area->id }}"
                                 {{ old('area_id') == $area->id ? 'selected' : ''}}
                                 >{{ $area->nomarea }}</option>
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
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
        <div class="row">
            <div class="col-12 mb-2">
            <a href="{{ URL::previous() }}" class="btn btn-secondary">Cancel</a>
            <input type="submit" value="Registrar" class="btn btn-primary float-right">
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
    $(function () {

      //Initialize Select2 Elements
       $('.select2').select2()

    })
</script>

<script>
    $(document).ready(function(){   
        $('#valorestimadocont').mask("#.##0", {reverse: true});
        $('#valorestimadovig').mask("#.##0", {reverse: true});
    });
</script>

@endsection
