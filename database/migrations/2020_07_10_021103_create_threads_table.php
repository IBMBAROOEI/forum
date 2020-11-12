<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateThreadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \Schema::create('threads', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('content','1000');
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->bigInteger('chanel_id')->unsigned();
            $table->foreign('chanel_id')->references('id')->on('chanels')->onDelete('cascade')->onUpdate('cascade');;
            $table->boolean('flag')->default(0);
            $table->integer('view_thread')->default(0);
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
        \Schema::table('threads', function (Blueprint $table) {
            $table->dropForeign('threads_user_id_foreign');

            $table->dropForeign('threads_chanel_id_foreign');
            \Schema::dropIfExists('threads');
        });
    }
}
