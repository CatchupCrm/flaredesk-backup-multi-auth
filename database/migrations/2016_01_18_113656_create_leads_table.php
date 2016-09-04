<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLeadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leads', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('slug');
            $table->text('note');
            $table->integer('status_id');
            $table->integer('fk_staff_id_assign')->unsigned();
            $table->foreign('fk_staff_id_assign')->references('id')->on('staff');
            $table->integer('fk_relation_id')->unsigned();
            $table->foreign('fk_relation_id')->references('id')->on('relations');
            $table->integer('fk_staff_id_created')->unsigned();
            $table->foreign('fk_staff_id_created')->references('id')->on('staff');
            $table->datetime('contact_date');
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
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::drop('leads');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
