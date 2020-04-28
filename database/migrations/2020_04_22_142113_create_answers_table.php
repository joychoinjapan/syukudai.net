<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('answers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->index()->unsigned();
            $table->integer('question_id')->index()->unsigned();
            //答えの具体的な内容
            $table->text('content');
            //答えに賛成する人の数
            $table->integer('votes_count')->default(0);
            //答えのコメントの数
            $table->integer('comments_count')->default(0);
            //規約違反で非表示された答えですか
            $table->string('is_hidden',8)->default('F');
            //答えにはコメントをクローズしたか
            $table->string('close_comment',8)->default('F');
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
        Schema::dropIfExists('answers');
    }
}
