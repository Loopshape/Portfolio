<?php
namespace Loopshape\Loopcode\Updates;

    use Schema;
    use October\Rain\Database\Updates\Migration;

    class CreateProjectInfosTable extends Migration
    {

        public function up()
        {
            Schema::create('loopshape_loopcode_project_infos', function($table)
            {
                $table -> engine = 'InnoDB';
                $table -> increments('id');
                $table -> timestamps();
            });
        }

        public function down()
        {
            Schema::dropIfExists('loopshape_loopcode_project_infos');
        }

    }
