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
            $table->bigIncrements('id');
            $table->integer('supplier_id');
            $table->integer('unit_id');
            $table->integer('category_id');
            $table->integer('brand_id');
            $table->string('name');
            $table->string('product_code');
            $table->string('product_price');
            $table->string('product_cost');
            $table->string('product_profit');
            $table->string('product_profit_percent');
            $table->text('product_details');
            $table->string('product_img');
            $table->double('quantity')->default('0');
            $table->string('status')->default('1');
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
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
