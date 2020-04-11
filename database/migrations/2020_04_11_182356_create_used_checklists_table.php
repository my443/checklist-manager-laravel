<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsedChecklistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('used_checklists', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_masterlists');
            $table->date('start_date');
            $table->date('completed_date');
            $table->timestamps();
            
            $table->foreign('id_masterlists')->references('id')->on('master_lists');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('used_checklists');
    }
}
