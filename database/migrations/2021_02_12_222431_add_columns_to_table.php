<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsToTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
           $table->string('name')->nullable($value=false)->after('id');
           $table->string('description')->nullable($value=false)->after('name');
           $table->string('price')->nullable($value=false)->after('description');
           $table->string('image')->nullable($value=false)->after('price');
           $table->string('category_id')->nullable($value=false)->after('image');
           $table->string('state')->nullable($value=false)->after('category_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            //
        });
    }
}
