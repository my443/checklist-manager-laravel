<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInitiatedChecklistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('initiated_checklists', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_masterlists');
            $table->unsignedBigInteger('id_list_templates');
            $table->boolean('complete');
            $table->timestamps();
            
            $table->foreign('id_masterlists')->references('id')->on('master_lists');
            $table->foreign('id_list_templates')->references('id')->on('used_checklists');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('initiated_checklists');
    }
}
