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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->integer('pageNum');
            $table->foreignId('script_id');
            $table->foreignId('bookbind_id');
            $table->foreignId('format_id');
            $table->foreignId('publisher_id');
            $table->foreignId('language_id');
            $table->year('publishDate');
            $table->string('isbn');
            $table->integer('samples');
            $table->integer('borrowedSaples')->default(0);
            $table->integer('reservedSamples')->default(0);
            $table->text('description')->nullable();
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
        Schema::dropIfExists('books');
    }
};
