<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shops', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->float('grade')->unsigned()->default(4.5);
            $table->integer('sale')->unsigned()->default(0);
            $table->string('address');
            $table->string('logo')->default(public_path('image/logo.jpg'));
            $table->string('telephone');
            $table->string('remark');
            $table->string('discount');
            $table->integer('eva')->unsigned()->default(0);
            $table->integer('goodEva')->unsigned()->default(0);
            $table->integer('badEva')->unsigned()->default(0);
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
        Schema::dropIfExists('shops');
    }
}
