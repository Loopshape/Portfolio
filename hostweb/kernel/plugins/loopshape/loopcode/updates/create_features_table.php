<?php
namespace Loopshape\Loopcode\Updates;

    use Schema;
    use October\Rain\Database\Updates\Migration;

    class CreateFeaturesTable extends Migration
    {

        public function up()
        {
            Schema::create('loopshape_loopcode_features', function($table)
            {
                $table -> engine = 'InnoDB';
                $table -> increments('id');
                $table -> string('title', 255);
                $table -> text('description') -> nullable();
                $table -> integer('user_id') -> unsigned() -> index();
                $table -> timestamps();
            });
        }

        public function down()
        {
            Schema::dropIfExists('loopshape_loopcode_features');
        }

    }
