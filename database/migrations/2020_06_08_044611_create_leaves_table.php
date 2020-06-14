<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeavesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leaves', function (Blueprint $table) {
//            $table->id();
            $table->bigIncrements('id');
            $table->unsignedBigInteger('leave_type_id');
            $table->string('emp_name');
            $table->dateTime('str_date');
            $table->dateTime('end_date');
            $table->integer('days');
            $table->text('reason');
            $table->string('for');
            $table->boolean('status');
            $table->foreign('leave_type_id')
                ->references('id')->on('leave_types')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('leaves');
    }
}
