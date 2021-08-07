<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offers', function (Blueprint $table) {
            $table->id();
            $table->string("code", 20)->index();
            $table->string("name");
            $table->enum("payment_type", ["SINGLE_PAYMENT", "RECURRING_PAYMENT"])->default("SINGLE_PAYMENT");
            $table->enum("frequency", ["MONTHLY", "BIMONTHLY", "QUARTERLY", "SEMESTER", "YEARLY"])->nullable(); // SERÁ NULL QUANDO FOR SELECIONADO NO CAPO PAYMENT_TYPE O VALOR SINGLE_PAYMENT
            $table->boolean("automatic_renovation")->default(true); //Quando for payment_type RECURRING_PAYMENT
            $table->integer("amount_charges")->default(12);//Quando for payment_type RECURRING_PAYMENT e automatic_renovation false
            $table->integer("product_id");
            $table->timestamps();

            $table->foreign('product_id')->references('id')->on('products');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('offers');
    }
}
