<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStatusTindakansTable extends Migration
{
    public function up()
    {
        Schema::create('status_tindakans', function (Blueprint $table) {
            $table->id();
            $table->string('nama_tindakan');
            $table->enum('status', ['implemented', 'in_progress', 'completed']);
            $table->text('deskripsi');
            $table->foreignId('rekomendasi_id')->nullable()->constrained('rekomendasis')->onDelete('set null');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('status_tindakans');
    }
}
