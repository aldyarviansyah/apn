<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyBoatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_boats', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id');
            $table->unsignedBigInteger('boat_id');
            $table->timestamps();
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
            $table->foreign('boat_id')->references('id')->on('boats')->onDelete('cascade');
            $table->index(['company_id', 'boat_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('company_boats');
    }
}
