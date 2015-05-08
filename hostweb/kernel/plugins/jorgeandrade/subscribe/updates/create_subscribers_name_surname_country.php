<?php namespace JorgeAndrade\Subscribe\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class CreateSubscribersNameSurnameCountry extends Migration
{

    public function up()
    {
        Schema::table('andradedev_subscribe_subscribers', function($table)
        {
            $table->string('name')->nullable()->after('status');
            $table->string('surname')->nullable()->after('name');
            $table->string('country')->nullable()->after('surname');
        });
    }

    public function down()
    {
        Schema::table('andradedev_subscribe_subscribers', function($table)
        {
            $table->dropColumn('name');
            $table->dropColumn('surname');
            $table->dropColumn('country');
        });
    }

}
