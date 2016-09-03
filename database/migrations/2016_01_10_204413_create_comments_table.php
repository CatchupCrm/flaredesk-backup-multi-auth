<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{

  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('comments', function (Blueprint $table) {
      $table->increments('id');
      $table->text('description');
      $table->integer('fk_staff_id')->unsigned();
      $table->foreign('fk_staff_id')->references('id')->on('staff');
      $table->integer('fk_ticket_id')->unsigned();
      $table->foreign('fk_ticket_id')->references('id')->on('tickets');
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
    Schema::drop('comments');
    DB::statement('SET FOREIGN_KEY_CHECKS = 1');
  }
}
