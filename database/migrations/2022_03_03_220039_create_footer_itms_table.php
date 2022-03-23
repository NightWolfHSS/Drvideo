<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFooterItmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('footer_itms', function (Blueprint $table) {
            $table->id();
            $table->string('column_1');
            $table->string('desk_1');
            $table->string('column_2');
            $table->string('desk_2');
            $table->string('column_3');
            $table->string('column_4');
            $table->string('desk_4');
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
        Schema::dropIfExists('footer_itms');
    }
}
