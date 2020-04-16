<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->text('body');
            $table->integer('user_id')->unsigned();
            $table->integer('comments_count')->default(0);
            $table->integer('followers_count')->default(1);
            $table->integer('answers_count')->default(1);
            //この問題のコメントを閉じる
            $table->string('close_comment',8)->default('F');
            //ユーザーは自ら問題を閉じる
            $table->string('is_hidden',8)->default('F');
            //提出した質問は規約違反・審査中
            $table->string('is_violation',8)->default('F');
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
        Schema::dropIfExists('questions');
    }
}
