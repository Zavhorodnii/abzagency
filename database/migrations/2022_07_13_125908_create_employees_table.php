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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->foreignId('positions_id')
                ->constrained();
            $table->date('date_of_employment');
            $table->string('phone');
            $table->string('email')->unique();
            $table->unsignedMediumInteger('salary');
            $table->text('image');
            $table->foreignId('head')
                ->nullable()
                ->references('id')
                ->on('employees')
                ->onDelete('cascade');
            $table->foreignId('admin_created_id')->references('id')->on('users');
            $table->foreignId('admin_updated_id')->references('id')->on('users');
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
        Schema::dropIfExists('employees');
    }
};
