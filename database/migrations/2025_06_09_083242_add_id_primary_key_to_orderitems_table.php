<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('orderitems', function (Blueprint $table) {
            $table->bigIncrements('id')->first(); // เพิ่ม id เป็น primary key อัตโนมัติ
        });
    }

    public function down()
    {
        Schema::table('orderitems', function (Blueprint $table) {
            $table->dropColumn('id');
        });
    }
};
