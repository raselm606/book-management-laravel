<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
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
            $table->string('title','255');
            $table->string('slug','255')->unique();
            $table->string('isbn','255')->nullable();
            $table->string('publish_year','255')->nullable();
            $table->text('description')->nullable();
            $table->string('image','255')->nullable();

            $table->boolean('is_approved')->default(0);
            $table->unsignedInteger('total_view')->default(0);
            $table->unsignedInteger('total_search')->default(0);
            $table->unsignedInteger('total_borrowed')->default(0);
            $table->unsignedInteger('user_id')->nullable()->index();

            $table->unsignedInteger('category_id')->index();
            $table->unsignedInteger('publisher_id')->index();
            $table->unsignedInteger('translator_id')->nullable()->index();
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
}
