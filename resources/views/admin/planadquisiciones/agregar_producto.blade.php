@extends('layouts.admin')
@section('title', 'Agregar producto')
@section('style')
    <!-- Select2 -->
    {!! Html::style('adminlte/plugins/select2/css/select2.min.css') !!}
    {!! Html::style('adminlte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') !!}
@endsection
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Agregar producto</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('planadquisiciones.index') }}">Plan de
                                    Adquisiciones </a></li>
                            <li class="breadcrumb-item active">Agregar Producto</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            {!! Form::open(['route' => ['agregar_producto_store', $planadquisicion], 'method' => 'POST']) !!}
            <div class="card">
                <div class="col-12 mb-2">
                    {{-- <a href="{{ URL::previous() }}" class="btn btn-secondary">Cancel</a> --}}
                    <a value="Consultar Productos" class="btn btn-primary float-left"
                        href="https://www.colombiacompra.gov.co/clasificador-de-bienes-y-servicios">CONSULTAR PRODUCTOS</a>

                </div>


                <div class="card-body">

                    <div class="form-group">
                        <label for="segmento_id">Segmentos</label>
                        <select id="segmento_id" name="segmento_id" class="form-control select2" required>
                            <option value="" disabled selected>-- Seleccione un Segmento --</option>
                            @foreach ($segmentos as $segmento)
                                <option value="{{ $segmento->id }}">{{ $segmento->id }} - {{ $segmento->detsegmento }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="familia_id">Familias</label>
                        <select id="familia_id" name="familia_id" class="form-control select2" required>
                            <option value="" disabled selected>-- Seleccione una Familia --</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="clase_id">Clases</label>
                        <select id="clase_id" name="clase_id" class="form-control select2">
                            <option value="" disabled selected>-- Seleccione una Clase --</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="producto_id">Productos</label>
                        <select id="producto_id" name="producto_id" class="form-control select2">
                            <option value="" disabled selected>-- Seleccione un Producto --</option>
                        </select>
                    </div>


                </div>

            </div>
            <!-- /.card -->
            <div class="row">
                <div class="col-12 mb-2">
                    {{-- <a href="{{ URL::previous() }}" class="btn btn-secondary">Cancelar</a> --}}
                    <input type="submit" value="Registrar" class="btn btn-primary float-right">
                </div>
            </div>
            {!! Form::close() !!}
        </section>
        <!-- /.content -->
    </div>
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
        // var segmento_id = $('#segmento_id');
        // var familia_id = $('#familia_id');
        // var clase_id = $('#clase_id');
        // var producto_id = $('#producto_id');


        $(document).ready(function() {
            var segmento_id = $('#segmento_id');
            var familia_id = $('#familia_id');
            var clase_id = $('#clase_id');
            var producto_id = $('#producto_id');

            segmento_id.change(function() {
                var segmento_id = $(this).val();
                if (segmento_id) {
                    $.get('/get-familias/' + segmento_id, function(data) {
                        $('#familia_id').empty().append(
                            '<option disabled selected>-- Seleccione una Familia --</option>');
                        $.each(data, function(key, value) {
                            $('#familia_id').append('<option value="' + value.id + '">' +
                                value.id + ' - ' + value.detfamilia + '</option>');
                        });
                    });
                } else {
                    $('#familia_id, #clase_id, #producto_id').empty();
                }
            });

            familia_id.change(function() {
                var familia_id = $(this).val();
                if (familia_id) {
                    $.get('/get-clases/' + familia_id, function(data) {
                        $('#clase_id').empty().append(
                            '<option disabled selected>-- Seleccione una Clase --</option>');
                        $.each(data, function(key, value) {
                            $('#clase_id').append('<option value="' + value.id + '">' +
                                value.id + ' - ' + value.detclase + '</option>');
                        });
                    });
                } else {
                    $('#clase_id, #producto_id').empty();
                }
            });

            clase_id.change(function() {
                var clase_id = $(this).val();
                if (clase_id) {
                    $.get('/get-productos/' + clase_id, function(data) {
                        $('#producto_id').empty().append(
                            '<option disabled selected>-- Seleccione un Producto --</option>');
                        $.each(data, function(key, value) {
                            $('#producto_id').append('<option value="' + value.id + '">' +
                                value.id + ' - ' + value.detproducto + '</option>');
                        });
                    });
                } else {
                    $('#producto_id').empty();
                }
            });
        });




        //     $(document).ready(function() {
        //         segmento_id.change(function() {
        //             var segmento_id = $(this).val();
        //             if (segmento_id) {
        //                 $.get('/get-familias/' + segmento_id, function(data) {
        //                     $('#familia_id').empty();
        //                     $('#familia_id').append(
        //                         '<option disabled selected>-- Seleccione una Familia --</option>'
        //                     );
        //                     $.each(data, function(key, value) {
        //                         $('#familia_id').append('<option value="' +
        //                             value.id + '" name="' + value.detfamilia + '">' + value
        //                             .id + ' - ' + value.detfamilia + '</option>');
        //                     });
        //                     // Selecciona automáticamente la primera opción
        //                     $('#familia_id').val($('#familia_id option:first')
        //                         .val());
        //                 });
        //             } else {
        //                 // Si no se selecciona ninguna, limpia la lista
        //                 $('#familia_id').empty();
        //             }
        //         });
        //     });

        //     $(document).ready(function() {
        //         familia_id.change(function() {
        //             var familia_id = $(this).val();
        //             if (familia_id) {
        //                 $.get('/get-clases/' + familia_id, function(data) {
        //                     $('#clase_id').empty();


        //                     $('#clase_id').append(
        //                         '<option disabled selected>-- Seleccione una Clase --</option>'
        //                     );
        //                     $.each(data, function(key, value) {
        //                         $('#clase_id').append('<option value="' +
        //                             value.id + '" name="' + value.detclase + '">' + value
        //                             .id + ' - ' + value.detclase + '</option>');
        //                     });
        //                     // Selecciona automáticamente la primera opción
        //                     $('#clase_id').val($('#clase_id option:first').val());
        //                 });
        //             } else {
        //                 // Si no se selecciona ninguna ciudad, limpia la lista de estandares
        //                 $('#clase_id').empty();
        //             }
        //         });
        //     });

        //     $(document).ready(function() {
        //         clase_id.change(function() {
        //             var clase_id = $(this).val();
        //             if (clase_id) {
        //                 $.get('/get-productos/' + clase_id, function(data) {
        //                     $('#producto_id').empty();


        //                     $('#producto_id').append(
        //                         '<option disabled selected>-- Seleccione un Producto --</option>'
        //                     );
        //                     $.each(data, function(key, value) {
        //                         $('#producto_id').append('<option value="' +
        //                             value.id + '" name="' + value.detproducto + '">' + value
        //                             .id + ' - ' + value.detproducto + '</option>');
        //                     });
        //                     // Selecciona automáticamente la primera opción
        //                     $('#producto_id').val($('#producto_id option:first')
        //                         .val());
        //                 });
        //             } else {
        //                 // Si no se selecciona ninguna ciudad, limpia la lista de estandares
        //                 $('#producto_id').empty();
        //             }
        //         });
        //     });
        // 
    </script>
@endsection
