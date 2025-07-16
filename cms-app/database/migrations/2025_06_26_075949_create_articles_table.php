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
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('title', 500);
            $table->string('slug', 255)->unique();
            $table->longText('content'); // HTML nội dung
            $table->string('thumbnail', 255)->nullable(); // ảnh đại diện
            $table->unsignedBigInteger('category_detail_id')->nullable();
            $table->unsignedBigInteger('author_id');
            $table->enum('status', ['draft', 'published', 'archived'])->default('draft');
            $table->integer('views')->default(0);
            $table->timestamps();

            $table->foreign('category_detail_id')->references('id')->on('category_detail')->nullOnDelete();
            $table->foreign('author_id')->references('id')->on('users')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
