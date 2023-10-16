<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProduitVendusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produit_vendus', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('vente_id');
            $table->foreign('vente_id')->references('id')->on('ventes')->onDelete('cascade');
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
        Schema::dropIfExists('produit_vendus');
    }
}
