<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inquiries', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('product_id')->unsigned();
            $table->string('inquiry_state', 30);
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('inquiries', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')
                ->on('users')->onDelete('restrict');
            $table->foreign('product_id')->references('id')
                ->on('products')->onDelete('cascade');
            $table->foreign('inquiry_state')->references('name')
                ->on('inquiry_states')->onDelete('restrict');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inquiries');

        Schema::table('inquiries', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
};
