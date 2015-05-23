<?php namespace JorgeAndrade\Subscribe\Updates;

use Schema;
use Str;
use October\Rain\Database\Updates\Migration;

class UpdateCodeColumnSubscriber extends Migration
{

    public function up()
    {
        \DB::update("update andradedev_subscribe_subscribers set code = '".Str::random(20)."', status = 1 ");
    }

    public function down()
    {
        
    }

}