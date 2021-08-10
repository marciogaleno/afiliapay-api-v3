<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('persons', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("cpf_cnpj", 16)->nullable();
            $table->string("phone", 20);
            $table->string("cep");
            $table->string("address");
            $table->boolean("not_number")->default(false);
            $table->string("number")->nullable();
            $table->string("complement");
            $table->string("district");
            $table->string("city");
            $table->string("state", 2);
            $table->foreignId("country_id")->constrained("countries");
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
        Schema::dropIfExists('persons');
    }
}
