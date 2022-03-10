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
            $table->foreignId("user_id")->nullable()->references("id")->on("users")->onDelete("set null")->cascadeOnUpdate();
            $table->foreignId("category_id")->nullable()->references("id")->on("categories")->onDelete("set null")->cascadeOnUpdate();
            $table->foreignId("level_id")->nullable()->references("id")->on("levels")->onDelete("set null")->cascadeOnUpdate();
            $table->string('title');
            $table->string('short_description')->nullable();
            $table->text('description');
            $table->timestamp('deadline');
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
