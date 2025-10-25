<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('movies', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->enum('category', ['documentary', 'fiction']);
            $table->text('dacast_embed')->comment('embed iframe dari Dacast');
            $table->text('trailer_dacast_embed')->comment('embed iframe dari Dacast');
            $table->string('thumbnail')->nullable();
            $table->string('poster')->nullable();
            $table->string('age')->nullable();
            $table->integer('duration')->nullable();
            $table->text('description')->nullable();
            $table->date('release_date')->nullable();
            $table->text('actor')->nullable();
            $table->string('writter')->nullable();
            $table->string('producer')->nullable();
            $table->text('production')->nullable();
            $table->float('rating', 2, 1)->default(0);
            $table->unsignedBigInteger('views')->default(0); // untuk hitung popular/top_of_week
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movies');
    }
};
