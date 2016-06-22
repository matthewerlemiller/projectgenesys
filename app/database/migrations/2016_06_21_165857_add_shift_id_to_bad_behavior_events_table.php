<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddShiftIdToBadBehaviorEventsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bad_behavior_events', function(Blueprint $table)
        {
            $table->integer('shiftId')->unsigned();
            $table->foreign('shiftId')->references('id')->on('shifts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bad_behavior_events', function(Blueprint $table)
        {
            $table->dropForeign('bad_behavior_events_shiftid_foreign');
            $table->dropColumn('shiftId');
        });
    }

}
