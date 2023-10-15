<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContratosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contratos', function (Blueprint $table) {
            $table->id();
            $table->string('numcont');           
            $table->string('objetocont');
            $table->string('valorinicialcont');
            $table->string('valortotalcont');
            $table->date('fechainiciocont');
            $table->date('fechafirmacont');                     
            $table->string('plazocont');           
            $table->string('observacioncont');
            $table->string('urlsecopcont');
            $table->string('num_procesosecop');
            $table->string('slug'); 
            $table->unsignedBigInteger('user_id')->nullable();  
            $table->unsignedBigInteger('estado_id')->nullable();          
            $table->unsignedBigInteger('planadquisicione_id')->nullable();           
            $table->unsignedBigInteger('tipodocumento_id')->nullable();
            $table->unsignedBigInteger('supervisore_id')->nullable();
            $table->unsignedBigInteger('contratista_id')->nullable();
            $table->unsignedBigInteger('obligacione_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
            $table->foreign('estado_id')->references('id')->on('estados')->onDelete('set null');
            $table->foreign('planadquisicione_id')->references('id')->on('planadquisiciones')->onDelete('set null');            
            $table->foreign('tipodocumento_id')->references('id')->on('tipodocumentos')->onDelete('set null');
            $table->foreign('supervisore_id')->references('id')->on('supervisores')->onDelete('set null');
            $table->foreign('contratista_id')->references('id')->on('contratistas')->onDelete('set null');
            $table->foreign('obligacione_id')->references('id')->on('obligaciones')->onDelete('set null');
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
        Schema::dropIfExists('contratos');
    }
}
