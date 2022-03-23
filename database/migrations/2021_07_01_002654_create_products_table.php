<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 255);
            $table->string('seo_desk', 255);
            $table->string('desc_short');
            $table->text('you_tb', 1000)->nullable();
            $table->text('desk_large', 80000)->default("описание пока отсутствует!");  
            $table->string('brand', 150);
            $table->decimal('price', 10, 3);
            $table->decimal('oldPrice', 10, 3);
            $table->string('selecter', 100);
            $table->string('img');
            $table->string('images');
            $table->integer('count')->default(0);
            $table->text('more_option', 80000)->default("нет описание характеристик!");  
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
        Schema::dropIfExists('products');
    }
}
