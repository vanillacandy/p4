<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBreakfastIngredientTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('breakfast_ingredient', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            # `book_id` and `tag_id` will be foreign keys, so they have to be unsigned
            #  Note how the field names here correspond to the tables they will connect...
            # `book_id` will reference the `books table` and `tag_id` will reference the `tags` table.
            $table->integer('breakfast_id')->unsigned();
            $table->integer('ingredient_id')->unsigned();

            # Make foreign keys
            $table->foreign('breakfast_id')->references('id')->on('breakfasts');
            $table->foreign('ingredient_id')->references('id')->on('ingredients');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('breakfast_ingredient');
    }
}
