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
        Schema::create('product_consumptions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id')
                ->nullable(false);
            $table->unsignedInteger('count')
                ->nullable(false)
                ->default(0);
            $table->date('start_date')
                ->nullable(false);
            $table->date('end_date')
                ->nullable(false);

            $table->foreign('product_id')
                ->references('id')
                ->on('products')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_consumptions');
    }
};
