<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('videos', function (Blueprint $table) {
            $table->bigIncrements("id");
            $table->foreignId("course_id")->references("id")->on("courses")->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('title');
            $table->text('description')->nullable();
            $table->foreignId("prev_video")->nullable()->references("id")->on("videos")->onDelete("set null")->cascadeOnUpdate();
            $table->foreignId("next_video")->nullable()->references("id")->on("videos")->onDelete("set null")->cascadeOnUpdate();
            $table->string('url');
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
        Schema::dropIfExists('videos');
    }
}
