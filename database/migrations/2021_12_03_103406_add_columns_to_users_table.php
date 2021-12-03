<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            // $table->string('age')->nullable()->change();
            // $table->string('occupation')->nullable()->change();
            // $table->string('profile_image')->default('default.png');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            // $table->string('age')->nullable(false)->change();
            // $table->string('occupation')->nullable(false)->change();
            // $table->dropColumn('profile_image');
            // Schema::dropIfExists('users');
        });
    }
}
