<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements("id");
            $table->foreignId("role_id")->references("id")->on("roles")->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId("department_id")->nullable()->references("id")->on("departments")->onDelete("set null")->cascadeOnUpdate();
            $table->string('name');
            $table->text("description")->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string("phone")->nullable();
            $table->string('password');
            $table->string('image')->nullable();
            $table->integer("status")->default(1);
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
