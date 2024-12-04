<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('risikos', function (Blueprint $table) {
            $table->id();
            $table->string('nama'); // Nama risiko
            $table->integer('severity'); // Nilai severity
            $table->integer('occurrence'); // Nilai occurrence
            $table->integer('detection'); // Nilai detection
            $table->integer('rpn'); // Nilai RPN
            $table->timestamps(); // created_at dan updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('risikos');
    }
};
