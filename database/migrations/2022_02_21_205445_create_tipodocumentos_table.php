<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTipodocumentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipodocumentos', function (Blueprint $table) {
            $table->id();
            $table->string('num_documento');
            $table->date('fecha_documento');
            $table->string('valor_documento');
            $table->string('plazo_documento');
            $table->string('observacion_documento');
            $table->string('num_rubro_documento');
            $table->string('nombre_rubro_documento');  
            $table->string('num_rp_rubro_documento');
            $table->unsignedBigInteger('actas_id')->nullable();
            $table->foreign('actas_id')->references('id')->on('actas');
            $table->string('slug');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tipodocumentos');
    }
}
