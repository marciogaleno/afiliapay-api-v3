<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCheckoutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('checkouts', function (Blueprint $table) {
            $table->id();
            $table->string("code", 20)->index();
            $table->string("name");
            $table->boolean("request_cpf")->default(true);
            $table->boolean("request_phone")->default(false);
            $table->boolean("request_address")->default(false);
            $table->boolean("request_repeat_email")->default(true);
            $table->integer("billet_days")->default(3);
            $table->boolean("card_payment")->default(true);
            $table->boolean("billet_payment")->default(true);
            $table->boolean("pix_payment")->default(true);
            $table->string("top_banner", 250)->nullable();
            $table->string("side_banner", 250)->nullable();
            $table->string("background_color", 16);
            $table->foreignId("offer_id")->constrained("offers");
            $table->unsignedBigInteger("tenant_id")->nullable()->constrained("offers")->index();
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
        Schema::dropIfExists('checkouts');
    }
}
