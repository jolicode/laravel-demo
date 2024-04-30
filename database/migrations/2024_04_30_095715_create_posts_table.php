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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('author_id')
                ->constrained('users')
                ->cascadeOnUpdate()
                ->cascadeOnDelete()
            ;
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('summary');
            $table->text('content');
            $table->timestamp('published_at')
                ->useCurrent()
                ->nullable()
            ;
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Drop the foreign key constraint
        Schema::table('posts', function (Blueprint $table) {
            $table->dropForeign(['author_id']);
        });
        Schema::dropIfExists('posts');
    }
};
