<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BuildMarksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('marks', function (Blueprint $table) {
            $table->bigIncrements('mark_id');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('paper_id')->constrained('papers', 'paper_id')->onDelete('cascade');
            $table->integer('actual_mark');
            $table->integer('target_mark');
            $table->decimal('deviation', 5, 2);
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
        //
        Schema::dropIfExists('marks');
    }
}
