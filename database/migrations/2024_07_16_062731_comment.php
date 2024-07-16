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
        Schema::create('comment', function (Blueprint $table) {
            $table->id();
            $table->text("comments");
            $table->text("comments_gmail");
            $table->text("comments_blog_title");
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('comment');
    }
};