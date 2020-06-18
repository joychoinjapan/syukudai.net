<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddProfileToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            //
            $table->string('self_introduction',255)->nullable()->default(null)
            ->after('password');
            $table->string('company',255)->nullable()->default(null)
            ->after('self_introduction');
            $table->string('address',255)->nullable()->default(null)
            ->after('company');
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
            $table->dropColumn(['self_introduction']);
            $table->dropColumn(['company']);
            $table->dropColumn(['address']);
        });
    }
}
