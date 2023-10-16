<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDevisItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('devis_items', function (Blueprint $table) {
           $table->bigIncrements('id');
            $table->unsignedBigInteger('devis_id');
            $table->foreign('devis_id')->references('id')->on('devis')->onDelete('cascade');
            $table->string('nom');
            $table->unsignedDouble('amount');
            $table->unsignedDouble('taxe');
            $table->unsignedDouble('qte');
            $table->text('description');
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
        Schema::dropIfExists('devis_items');
    }
}
