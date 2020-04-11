<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ListTemplateItems extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('list_template_items', function (Blueprint $table) {
			$table->id();
			$table->integer('id_master_lists');
            $table->text('item_short_desc');
            $table->text('item_long_desc');
            $table->integer('order_num');
            $table->boolean('active');            
            $table->timestamps();
            
            // Sets a foreign key between items and the list that they are on.
            $table->foreign('id_master_lists')->references('id')->on('master_lists');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('list_template_items');
    }
}
