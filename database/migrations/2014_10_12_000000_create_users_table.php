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
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->string('google_id')->nullable();
            $table->string('l_name')->nullable();
            $table->timestamp('dob')->nullable();
            $table->string('gender')->nullable();
            $table->string('anual_income')->nullable();
            $table->string('occupation')->nullable();
            $table->string('family_type')->nullable();
            $table->string('mangalik')->nullable();
            $table->timestamps();
            $table->boolean('is_Admin')->default(false);

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
