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
            $table->string('name',100);
            $table->string('model',100);
            $table->string('description',255);
            $table->string('measure',30);
            $table->decimal('quantity', 10, 3)->unsigned();
            $table->decimal('price', 8, 2)->unsigned()->nullable();
            $table->integer('delivery_term')->unsigned()->nullable();
            $table->string('conditions',255)->nullable();
            $table->bigInteger('inquiry_id')->unsigned()->nullable();
            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->boolean('filled')->unsigned()->default(0);
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('products', function (Blueprint $table) {

            $table->foreign('measure')->references('name')
                ->on('product_measures')->onDelete('restrict');
            $table->foreign('inquiry_id')->references('id')
                ->on('inquiries')->onDelete('restrict');

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

        Schema::table('products', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
};
