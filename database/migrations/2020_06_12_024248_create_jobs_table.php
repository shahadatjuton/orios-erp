<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('department_id');
            $table->unsignedBigInteger('designation_id');
            $table->float('experience');
            $table->integer('vacancy');
            $table->dateTime('circular');
            $table->dateTime('deadline');
            $table->text('description');
            $table->integer('status')->default(0);
            $table->foreign('department_id')
                ->references('id')->on('departments')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('designation_id')
                ->references('id')->on('designations')
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
        Schema::dropIfExists('jobs');
    }
}
