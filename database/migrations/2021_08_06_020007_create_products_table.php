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
            $table->id();
            $table->uuid("code")->index();
            $table->enum("type", ["DIGITAL", "PHYSICAL", "SERVICE"])->default("DIGITAL");
            $table->enum("delivery_type", ["DOWNLOAD", "MEMBER_AREA"])->nullable(); //Será null quando selecionado service
            $table->string("name");
            $table->text("description")->nullable();
            $table->string("sales_page_url")->nullable();
            $table->string("image");
            $table->integer("warranty"); //dias garantia
            $table->string("email_support");
            $table->string("phone_support")->nullable();
            $table->string("url_thankyou_billet")->nullable();
            $table->string("url_thankyou_card")->nullable();
            $table->string("url_thankyou_pix")->nullable();
            $table->string("invoice_description")->nullable();
            $table->foreignId("category_id")->constrained("categories");
            $table->foreignId("user_id")->constrained("users");
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
