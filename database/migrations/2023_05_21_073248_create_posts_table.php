<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id');
            $table->foreignId('user_id');
            $table->string('nama');
            $table->string('SEMESTER');
            $table->string('sisa');
            $table->string('alamat');
            $table->string('bts_tgl');
            $table->string('NIM');
            $table->string('jenis_bayar');
            $table->string('tahun_akademik');
            $table->string('no_hp');
            $table->string('pembayaran');
            $table->string('tanggal_pembayaran');
            $table->string('status_pembayaran');
            $table->string('status_registrasi');
            $table->string('slug')->unique();
    
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
        Schema::dropIfExists('posts');
    }
}
