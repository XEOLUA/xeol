<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableLessons extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lessons', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title',1000);
            $table->text('text')->nullable();
            $table->string('image',1000)->nullable();
            $table->string('author')->nullable();
            $table->integer('level')->default(0)->nullable();
            $table->integer('view')->default(0)->nullable();
            $table->boolean('solution')->default(0)->nullable();
            $table->timestamps();

            $table->unique(['id']);
        });

        Artisan::call('db:seed', array('--class' => 'AddDataToTableLessons'));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lessons');
    }
}
