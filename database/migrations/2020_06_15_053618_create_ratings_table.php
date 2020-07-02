<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRatingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ratings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('application_id');
            $table->string('name');
            $table->string('designation');
            $table->string('department');
            $table->integer('appearence');
            $table->integer('body_language');
            $table->integer('job_knowledge');
            $table->integer('experience');
            $table->integer('literacy');
            $table->integer('communication_skill');
            $table->float('total');
            $table->integer('action');
            $table->double('written_mark');
            $table->text('remark');
            $table->double('salary');
            $table->date('expected_joining_date');
            $table->date('proposed_joining_date');
            $table->boolean('status')->default(0);
            $table->foreign('application_id')
                ->references('id')->on('applications')
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
        Schema::dropIfExists('ratings');
    }
}
