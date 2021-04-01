<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAuthorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('author', function (Blueprint $table) {
            $table->charset = 'utf8mb4';
            $table->id();
            $table->string('first_name', 45);
            $table->string('last_name', 60);
            $table->string('email', 100);
            $table->string('password', 255);
            $table->enum('genre', ['F', 'M']);
            $table->boolean('active')->default(true);
            $table->timestamps(); // created_at, updated_at
            $table->timestamp('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('author');
    }
}
