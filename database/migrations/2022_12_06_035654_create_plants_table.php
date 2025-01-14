<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plants', function (Blueprint $table) {
            $table->id();
            $table->string('kode_plant');
            $table->string('name')->nullable();
            $table->enum('type', ['Bunga', 'Obat', 'Buah-Buahan', 'Kacang-Kacangan', 'Rumput']);
            $table->json('growth')->nullable();
            $table->text('additional')->nullable();
            $table->timestamps();
        });
        Schema::table('plants', function (Blueprint $table) {
            $table->string('growth')->default('Tunas')->nullable(false)->change();
        });
            
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('plants');
    }
};
