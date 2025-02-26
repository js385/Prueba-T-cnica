// database/migrations/2024_02_26_000000_create_tasks_table.php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
{
    Schema::create('tasks', function (Blueprint $table) {
        $table->id();
        $table->foreignId('user_id')->constrained();
        $table->string('titulo');
        $table->text('descripcion');
        $table->enum('estado', ['pendiente', 'en progreso', 'completada'])->default('pendiente');
        $table->date('fecha_vencimiento');
        $table->timestamps();
    });
}

    public function down()
    {
        Schema::dropIfExists('tasks');
    }
};
