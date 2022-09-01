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
            $table->boolean('mail')->default(false);
            $table->foreignId('book_id')->constrained('books', 'id');

            $table->foreignId('student_id')->constrained('users', 'id');

            $table->foreignId('librarian_id')->constrained('users', 'id');

//            $table->foreignId('status_id');
            $table->foreignId('closingReason_id');


            $table->date('submttingDate');
            $table->date('closingDate')->nullable();
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
        Schema::dropIfExists('reservations');
    }
};
