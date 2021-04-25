<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddImagePathToNewsTable extends Migration
{
    public function up()
    {
        Schema::table('news', function (Blueprint $table) {
            $table->string('image_path')
                ->nullable()
                ->after('user_id');
        });
    }

    public function down()
    {
        Schema::table('news', function (Blueprint $table) {
            $table->removeColumn('image_path');
        });
    }
}
