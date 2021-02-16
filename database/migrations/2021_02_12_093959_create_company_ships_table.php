<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyShipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_ships', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id');
            $table->unsignedBigInteger('ship_id');
            $table->timestamps();
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
            $table->foreign('ship_id')->references('id')->on('ships')->onDelete('cascade');
            $table->index(['company_id', 'ship_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('company_ships');
    }
}
