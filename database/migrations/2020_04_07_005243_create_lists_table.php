<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('todolists', function (Blueprint $table) {
            $table->id();
            $table->text('name');
            $table->text('description');
            $table->integer('display_order');
            $table->timestamps();
        });

        Schema::create('todolist_user', function (Blueprint $table) {
            $table->id();
            $table->integer('todolist_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->unique(['todolist_id', 'user_id']);
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
        Schema::dropIfExists('todolists');
        Schema::dropIfExists('todolist_user');
    }
}
