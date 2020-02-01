<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 255);
            $table->string('adress', 510)->nullable();
            $table->string('real_adress', 510)->nullable();
            $table->float('coord_x', 2, 6)->nullable();
            $table->float('coord_y', 2, 6)->nullable();
            $table->string('cui', 64)->nullable();
            $table->string('nrc', 64)->nullable();
            $table->string('phone', 64)->nullable();
            $table->string('email', 64)->nullable();
            $table->string('program', 510)->nullable();
            $table->string('motto', 510)->nullable();
            $table->text('about')->nullable();
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
        Schema::dropIfExists('companies');
    }
}
