<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UserPicture extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table){
            $table->string('profile_pic')->default('default.jpg');
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table){
            $table->dropColumn('profile_pic');
        });
    }
}

