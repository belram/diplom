<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableQuestions extends Migration
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

            $table->string('topic',100);
            $table->string('alias',150);
            $table->text('question')->nullable();
            $table->string('author_question', 150)->nullable();
            $table->string('author_email',100)->nullable();
            $table->dateTime('question_created_at')->useCurrent();
            $table->text('answer')->nullable();
            $table->string('author_answer', 150)->nullable();
            $table->dateTime('answer_created_at')->nullable();
            $table->integer('status')->default(0);

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
