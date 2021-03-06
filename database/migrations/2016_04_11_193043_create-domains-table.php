<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDomainsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('domains', function (Blueprint $table) {
            echo "[".Config::get('db.textSmall')."]";
            $table->increments('id');
            $table->string('code',  Config::get('db.textSmall'))->unique();
            $table->string('name',  Config::get('db.textMedium'))->unique();
            $table->text('description', Config::get('db.textHuge'))->nullable();
            $table->boolean('multivalue')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('domains');
    }
}
