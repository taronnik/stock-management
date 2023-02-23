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
            $table->string('name')
                ->nullable(false);
            $table->unsignedInteger('current_stock')
                ->default(0)
                ->nullable(false);
            $table->unsignedInteger('minimum_stock')
                ->nullable(false)
                ->default(0);
            $table->unsignedFloat('monthly_consumption')
                ->nullable(false)
                ->default(0);
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
};
