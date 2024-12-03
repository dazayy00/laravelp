<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdopcionTable extends Migration
{
    public function up()
    {
        Schema::create('adopcion', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 50);
            $table->string('especie', 30);
            $table->string('raza', 50)->nullable();
            $table->integer('edad')->nullable();
            $table->decimal('peso', 5, 2)->nullable();
            $table->string('imagen', 255)->nullable();
            $table->enum('status', ['disponible', 'Pendiente', 'adoptado'])->default('disponible');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('adopcion');
    }
}
