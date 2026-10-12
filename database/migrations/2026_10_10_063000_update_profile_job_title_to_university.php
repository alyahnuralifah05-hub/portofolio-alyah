<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class UpdateProfileJobTitleToUniversity extends Migration
{
    public function up()
    {
        DB::table('profile_settings')
            ->where('job_title', 'Data Mining & Machine Learning')
            ->update(['job_title' => 'Mahasiswi Universitas Muhammadiyah Kolaka Utara']);
    }

    public function down()
    {
        DB::table('profile_settings')
            ->where('job_title', 'Mahasiswi Universitas Muhammadiyah Kolaka Utara')
            ->update(['job_title' => 'Data Mining & Machine Learning']);
    }
}
