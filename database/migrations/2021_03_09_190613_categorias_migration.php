<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CategoriasMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //omite la tabla si existe en la base de datos
        if(Schema::hasTable('categorias')) return;

        Schema::create('categorias', function (Blueprint $table) {
            $table->bigIncrements('idcategoria');
            $table->string('nombre', 45);
            $table->string('codigo', 45);
            $table->text('descripcion');
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
        Schema::dropIfExists('categorias');
    }
}
