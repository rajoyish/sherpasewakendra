<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
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
            $table->uuid('uuid');
            $table->string('name')->fulltext();
            $table->string('email')->unique();
            $table->string('phone');
            $table->string('address');
            $table->string('password');
            $table->foreignId('role_id')->default(1)->constrained();
            $table->boolean('is_verified')->default(false);
            $table->string('photo')->nullable();
            $table->string('id_doc')->nullable();
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
};
