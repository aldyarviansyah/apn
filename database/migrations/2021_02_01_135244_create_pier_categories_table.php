<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePierCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pier_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->integer('activity_count')->default(0);

            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
            $table->index(['created_by']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pier_categories');
    }
}
