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
        Schema::create('pelanggans', function (Blueprint $table) {
            $table->id('id_pelanggan'); // Membuat primary key & Auto Increment
            $table->string('nama', 100);
            $table->string('email', 100)->unique(); // Agar tidak ada email kembar
            $table->string('password', 255); // Panjang 255 karakter agar aman menampung password terenkripsi
            $table->string('no_hp', 15);
            $table->timestamps(); // Otomatis membuat kolom created_at & updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pelanggans');
    }
};
