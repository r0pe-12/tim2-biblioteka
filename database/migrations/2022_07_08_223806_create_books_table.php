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
            $table->foreignId('script_id')->constrained('scripts', 'id');
            $table->foreignId('bookbind_id')->constrained('bookbinds', 'id');
            $table->foreignId('format_id')->constrained('formats', 'id');
            $table->foreignId('publisher_id')->constrained('publishers', 'id');
            $table->foreignId('language_id')->constrained('languages', 'id');
            $table->year('publishDate');
            $table->string('isbn');
            $table->integer('samples');
            $table->integer('borrowedSamples')->default(0);
            $table->integer('reservedSamples')->default(0);
            $table->text('description')->nullable();
            $table->string('pdf')->nullable();
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
