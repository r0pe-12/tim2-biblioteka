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
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('book_id');

            $table->unsignedBigInteger('student_id');
            $table->foreign('student_id')->references('id')->on('users');

            $table->unsignedBigInteger('librarian_id');
            $table->foreign('librarian_id')->references('id')->on('users');

            $table->foreignId('closingReason_id');


            $table->timestamp('submttingDate');
            $table->date('closingDate');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reservations');
    }
};