<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLaporsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lapors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id');
            $table->string('uniq');
            $table->string('judul');
            $table->string('tipe');
            $table->json('lokasi');
            $table->enum('privacy',['public','private']);
            $table->string('foto')->nullable();
            $table->date('date');
            $table->enum('status', ['lapor', 'verifikasi','proses','ditolak','selesai'])->default('lapor');
            $table->enum('kategori', ['agama', 'corona','kesehatan','lingkungan','keamanan','kecelakaan']);
            $table->longText('content');
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
        Schema::dropIfExists('lapors');
    }
}
