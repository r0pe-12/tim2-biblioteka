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
        Schema::create('borrows', function (Blueprint $table) {
            $table->id();
            $table->integer('active');
            $table->foreignId('book_id')->constrained('books', 'id');

            $table->foreignId('librarian_id')->constrained('users', 'id');

            $table->foreignId('student_id')->constrained('users', 'id');

            $table->timestamp('borrow_date')->nullable();
            $table->timestamp('return_date')->nullable();

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
        Schema::dropIfExists('borrows');
    }
};
