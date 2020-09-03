<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentToConsultationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comment_to_consultations', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('post_id');
            $table->text('body');
            $table->timestamps();

            $table->foreign('post_id')->references('id')->on('consultations');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comment_to_consultations');
    }
}
