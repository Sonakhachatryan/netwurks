<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password')->nullbale();
            $table->string('phone');
//            $table->integer('role_id')->unsigned();
//            $table->foreign('role_id')
//                ->references('id')
//                ->on('roles')
//                ->onDelete('cascade')
//                ->onUpdate('cascade');
            $table->text('objective');
            $table->text('outline_of_topic');
            $table->integer('industry_id')->unsigned();
            $table->foreign('industry_id')
                ->references('id')
                ->on('industries')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->string('desc_file');
            $table->softDeletes();
            $table->rememberToken();
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
        Schema::dropIfExists('customers');
    }
}