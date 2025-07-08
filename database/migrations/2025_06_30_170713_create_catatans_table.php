<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
 public function up()
    {
        Schema::create('catatans', function (Blueprint $table) {
            $table->id(); // Primary key auto increment
            $table->unsignedBigInteger('user_id'); // Foreign key

            $table->date('tanggal');
            $table->string('nama_tanaman');
            $table->string('lokasi_tanaman')->nullable();
            $table->string('kondisi_cuaca')->nullable();
            $table->float('suhu')->nullable();
            $table->integer('kelembapan')->nullable();
            $table->string('penyiraman')->nullable();
            $table->string('pemupukan')->nullable();
            $table->text('pertumbuhan_tanaman')->nullable();
            $table->text('kondisi_tanaman')->nullable();
            $table->text('perlakuan_khusus')->nullable();
            $table->text('catatan_tambahan')->nullable();

            $table->timestamps();

            // Foreign key constraint
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('catatans');
    }
};
