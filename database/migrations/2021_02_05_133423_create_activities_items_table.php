<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActivitiesItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activities_items', function (Blueprint $table) {
            $table->id();
            $table->string('field')->nullable();
            $table->string('field_label')->nullable();
            $table->string('value_type')->nullable();
            $table->text('old_value')->nullable();
            $table->text('old_display_value')->nullable();
            $table->text('new_value')->nullable();
            $table->text('new_display_value')->nullable();
            $table->boolean('undo_able')->default(true);
            $table->string('current_model')->nullable();
            $table->string('current_table')->nullable();
            $table->unsignedBigInteger('activity_id');
            $table->timestamps();

            $table->foreign('activity_id')->references('id')->on('activities')->onDelete('cascade');
            $table->index(['activity_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('activities_items');
    }
}
