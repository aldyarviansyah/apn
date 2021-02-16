<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ships', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('category');
            $table->string('call_sign');
            $table->unsignedBigInteger('nationality_id');
            $table->string('telephone');
            $table->string('port');
            $table->string('imo_number');
            $table->string('issc_type');
            $table->date('issc_issue_date');
            $table->date('issc_expiry_date');
            $table->integer('activity_count')->default(0);
            $table->timestamps();
            $table->unsignedBigInteger('created_by')->nullable();

            $table->foreign('nationality_id')->references('id')->on('countries')->onDelete('cascade');
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
            $table->index(['nationality_id', 'created_by']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ships');
    }
}
