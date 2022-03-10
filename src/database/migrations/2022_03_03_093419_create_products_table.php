<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
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
            $table->string('name',255);
            $table->string('model',255);
            $table->string('description',255);
            $table->string('measure',30);
            $table->decimal('quantity', 9, 3)->unsigned();
            $table->decimal('price', 8, 2)->unsigned();
            $table->integer('delivery_term')->unsigned();
            $table->bigInteger('file_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();

        });

        Schema::table('products', function (Blueprint $table) {

            $table->foreign('measure')->references('name')
                ->on('product_measures')->onDelete('restrict');

            $table->foreign('file_id')->references('id')
                ->on('files')->onDelete('cascade');

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

        Schema::table('flights', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
};
