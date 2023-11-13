<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->integer('precioTotal');
            $table->integer('codigoTramo');
            $table->integer('cantidadAsientos');
            $table->date('diaReserva');
            $table->date('fechaCompra');
            $table->string('code')->unique();
            $table->integer('seat');
            $table->date('date');
            $table->integer('total');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
