<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->bigIncrements("id");
            $table->foreignId("user_id")->references("id")->on("users")->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId("category_id")->references("id")->on("categories")->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId("level_id")->references("id")->on("levels")->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('title');
            $table->string('short_description')->nullable();
            $table->text('description');
            $table->string('deadline');
            $table->string('image')->nullable();
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
        Schema::dropIfExists('courses');
    }
}
