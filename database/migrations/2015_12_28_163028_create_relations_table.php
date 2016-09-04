<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRelationsTable extends Migration
{

  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('relations', function (Blueprint $table) {
      $table->increments('id');
      $table->string('name');
      $table->string('email')->unique();
      $table->integer('primary_number');
      $table->integer('secondary_number');
      $table->string('address');
      $table->integer('zipcode');
      $table->string('city');
      $table->string('company_name');
      $table->integer('vat');
      $table->string('industry');
      $table->string('company_type');
      $table->integer('fk_staff_id')->unsigned();
      $table->foreign('fk_staff_id')->references('id')->on('staff');
      $table->integer('industry_id')->unsigned();
      $table->foreign('industry_id')->references('id')->on('lookup_industries');
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
    Schema::drop('relations');
    DB::statement('SET FOREIGN_KEY_CHECKS = 1');
  }
}
