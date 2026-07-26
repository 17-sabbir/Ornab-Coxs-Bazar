<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSocialLinksToExecutiveCommitteeAndTeamMembersTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('executive_committee', function (Blueprint $table) {
            $table->string('facebook')->nullable()->after('bio');
            $table->string('twitter')->nullable()->after('facebook');
            $table->string('instagram')->nullable()->after('twitter');
            $table->string('youtube')->nullable()->after('instagram');
        });

        Schema::table('team_members', function (Blueprint $table) {
            $table->string('facebook')->nullable()->after('bio');
            $table->string('twitter')->nullable()->after('facebook');
            $table->string('instagram')->nullable()->after('twitter');
            $table->string('youtube')->nullable()->after('instagram');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('executive_committee', function (Blueprint $table) {
            $table->dropColumn(['facebook', 'twitter', 'instagram', 'youtube']);
        });

        Schema::table('team_members', function (Blueprint $table) {
            $table->dropColumn(['facebook', 'twitter', 'instagram', 'youtube']);
        });
    }
}
