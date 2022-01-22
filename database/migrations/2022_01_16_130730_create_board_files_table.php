<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBoardFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('board_files', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pid')                     ->length(10)                   ->comment('board 테이블의 id');
            $table->string('name',              20)    ->comment('이름');
            $table->string('content',          500)    ->comment('댓글');
            $table->timestamps();
            $table->foreign('pid')->references('id')->on('boards')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('board_files');
    }
}
