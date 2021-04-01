<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->charset = 'utf8mb4';
            $table->id();
            $table->unsignedBigInteger('author_id');
            $table->string('title', 100);
            $table->string('subtitle', 155);
            $table->text('description');
            $table->timestamp('published_at')->nullable();
            $table->string('slug', 255);
            $table->boolean('active')->default(true);
            $table->timestamps(); // created_at, updated_at
            $table->timestamp('deleted_at')->nullable();
            $table->foreign('author_id')
                ->references('id')
                ->on('author');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('news');
    }
}
