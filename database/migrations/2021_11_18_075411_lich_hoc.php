<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class LichHoc extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lichhoc', function (Blueprint $table) {
            $table->increments('id');
            $table->string('idCamera');
            $table->string('idMonHoc');
            $table->string('idGiaoVien');
            $table->text('idHocSinh');
            $table->string('folder');
            $table->dateTime('TimeBegin');
            $table->dateTime('TimeFinish');
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
        Schema::dropIfExists('lichhoc');
    }
}
