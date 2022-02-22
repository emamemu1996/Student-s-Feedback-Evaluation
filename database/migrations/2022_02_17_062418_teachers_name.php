<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TeachersName extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('teacher_name', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('faculty');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('status')->default(0);
            $table->string('type')->default(0);
            $table->string('password');
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
        //
    }
}
