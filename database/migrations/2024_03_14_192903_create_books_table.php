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
            $table->string('title', 180)->unique();
            $table->text('description', 30);
            $table->string('isbn', 60)->unique();
            $table->string('publisher', 90);
            $table->enum('gender', ['ADVENTURE','FANTASY','FICTION','HORROR','MYSTERY','ROMANCE','TRAGEDY']);
            $table->unsignedSmallInteger('year');
            $table->timestamps();
            $table->string('created_by');
            $table->string('updated_by')->nullable();
            $table->unsignedInteger('author_id');
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
