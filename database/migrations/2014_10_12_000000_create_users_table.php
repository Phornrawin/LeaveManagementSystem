<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('firstname');
            $table->string('lastname');
            $table->enum('gender', [
                'male', 'female'
            ]);
            $table->string('image')->nullable();
            $table->unsignedInteger('supervisor_id')->nullable();
            $table->unsignedInteger('department_id')->nullable();
            $table->string('position');
            $table->string('tel');
            $table->string('facebook');
            $table->string('line');
            $table->rememberToken();
            $table->timestamps();


            $table->foreign('supervisor_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade');

            $table->foreign('department_id')
                  ->references('id')
                  ->on('departments')
                  ->onDelete('cascade');
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
