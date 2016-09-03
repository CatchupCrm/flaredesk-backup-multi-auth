<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TicketTimeTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('tickets_time', function (Blueprint $table) {
      $table->increments('id');
      $table->string('title');
      $table->text('comment');
      $table->integer('value');
      $table->integer('fk_ticket_id')->unsigned();
      $table->foreign('fk_ticket_id')->references('id')->on('tickets');
      $table->integer('time')->nullable();
      $table->integer('overtime')->nullable();
      $table->integer('weekendOvertime')->nullable();
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
    Schema::drop('tickets_time');
  }
}
