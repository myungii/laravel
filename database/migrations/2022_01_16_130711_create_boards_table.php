<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBoardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('boards', function (Blueprint $table) {
            $table->id();
            $table->string('name',          20)     ->comment('이름');
            $table->string('title',         50)     ->comment('제목');
            $table->string('content',       4000)   ->comment('내용');
            $table->integer('cnt')                  ->length(10)                     ->default(0)                       ->comment('조회수');
            $table->integer('notice')               ->length(2)                      ->nullable()                       ->comment('공지글 미설정 0, 설정 1');
            $table->timestamps();
            $table->unsignedBigInteger('fileid')    ->length(10)                     ->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('boards');
    }
}
