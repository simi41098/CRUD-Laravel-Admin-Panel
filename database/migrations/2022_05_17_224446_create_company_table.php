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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('name',255)->nullable();
            $table->string('email',255)->unique();
            $table->string('web',255)->nullable();
            $table->string('image')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
        
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('fname',255)->nullable();
            $table->string('lname',255)->nullable();
            $table->string('email',255)->unique();
            $table->string('company',255)->nullable();
            $table->string('phone',10)->nullable();

            $table->unsignedBigInteger('company_id');
            $table->foreign('company_id')->references('id')->on('companies');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('companies');
        Schema::dropIfExists('employees');
    }
};
