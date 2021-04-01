<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImageNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('image_news', function (Blueprint $table) {
            $table->charset = 'utf8mb4';
            $table->id();
            $table->unsignedBigInteger('news_id');
            $table->text('image');
            $table->string('description', 255);
            $table->boolean('active')->default(true);
            $table->timestamps(); // created_at, updated_at
            $table->timestamp('deleted_at')->nullable();
            $table->foreign('news_id')
                ->references('id')
                ->on('news');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('image_news');
    }
}
