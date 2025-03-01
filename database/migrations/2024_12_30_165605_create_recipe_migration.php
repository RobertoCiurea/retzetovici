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
        Schema::create('recipes', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('title');
            $table->integer("views")->default(0);
            $table->integer("likes")->default(0);
            $table->integer("comments")->default(0);
            $table->text('description');
            $table->string('category');
            $table->json('ingredients')->nullable();
            $table->json('steps')->nullable();
            $table->integer('duration');
            $table->string('difficulty');
            $table->string("image")->nullable();
            $table->json('tags')->nullable();
            $table->string("username");
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recipes');
    }
};
