<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePiersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('piers', function (Blueprint $table) {
            $table->id();
            $table->integer('number');
            $table->string('section');
            $table->unsignedBigInteger('pier_category_id');
            $table->timestamps();
            $table->unsignedBigInteger('created_by')->nullable();

            $table->foreign('pier_category_id')->references('id')->on('pier_categories')->onDelete('cascade');
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
            $table->index(['pier_category_id', 'created_by']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('piers');
    }
}
