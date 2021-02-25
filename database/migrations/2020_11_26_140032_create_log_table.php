<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('log', function (Blueprint $table) {
            $table->id('record_no');
            $table->dateTime('log_date');
            $table->integer('P21_location_id');
            $table->string('P21_loc_short_name_ud',20);
            $table->string('P21_technician_id',16);
            $table->string('technician_name',50);
            $table->string('job_type',8);
            $table->string('job_name',20);
            $table->string('job_comment',100)->nullable();
            $table->double('log_hours',18,2);
            $table->dateTime('date_created');
            $table->string('delete_flag',1)->default('N');
            $table->dateTime('date_edited')->nullable();
            $table->string('edited_by',20)->nullable();
            $table->string('edited_flag',1)->default('N');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('log');
    }
}
