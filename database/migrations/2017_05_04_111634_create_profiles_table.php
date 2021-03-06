<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('location')->nullable();
            $table->string('religion')->nullable();
            $table->string('hometown')->nullable();
            $table->string('residence')->nullable();
            $table->text('about')->nullable();
            $table->date('dob')->nullable();
            $table->string('high_school_name')->nullable();
            $table->string('high_school_location')->nullable();
            $table->date('started_school_at')->nullable();
            $table->date('completed_school_at')->nullable();
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
        Schema::dropIfExists('profiles');
    }
}
