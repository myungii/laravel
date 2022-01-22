<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRepliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('replies', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('boardId')       ->length(10)                           ->comment('board 테이블의 id');
            $table->string('fileName',          50)     ->comment('파일명');
            $table->integer('fileSize')                 ->length(30)                           ->comment('파일크기');
            $table->string('filePath',          500)    ->comment('조회수');
            $table->string('fullFilePath',      500)    ->comment('수정일');
            $table->string('fileType',          30)     ->comment('공지글 미설정 0, 설정 1');
            $table->timestamps();
            $table->foreign('boardId')->references('id')->on('boards')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('replies');
    }
}
