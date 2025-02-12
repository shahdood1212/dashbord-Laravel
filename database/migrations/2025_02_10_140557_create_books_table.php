<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    if (!Schema::hasTable('books')) {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('author');
            $table->integer('pages');
            $table->decimal('price', 8, 2);
            $table->unsignedBigInteger('author_id'); // إضافة حقل author_id
            $table->foreign('author_id')->references('id')->on('authors')->onDelete('cascade'); // تعريف العلاقة
            $table->timestamps();
        });
    }
}

    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
