<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeHostDataTypeInVirtuleClass extends Migration
{
    public function up()
    {
        try {
            DB::statement("ALTER TABLE `virtual_classes` CHANGE `host` `host` VARCHAR(50)   NULL DEFAULT 'Zoom';");

        } catch (\Exception $exception) {

        }
    }

    public function down()
    {
        //
    }
}
