<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfileSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
   public function up()
{
    Schema::create('profile_settings', function (Blueprint $table) {
        $table->id();
        $table->string('full_name');
        $table->string('job_title');
        $table->text('about_short');
        $table->text('about_full')->nullable();
        $table->text('vision_mission')->nullable();
        $table->string('email');
        $table->string('whatsapp');
        $table->string('github_link')->nullable();
        $table->string('linkedin_link')->nullable();
        $table->string('avatar')->nullable();
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
        Schema::dropIfExists('profile_settings');
    }
}
