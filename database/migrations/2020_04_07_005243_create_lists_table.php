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
        Schema::create('lists', function (Blueprint $table) {
            $table->id();
            $table->text('name');
            $table->text('description');
            $table->integer('display_order');
            $table->timestamps();
        });

        Schema::create('lists_users', function (Blueprint $table) {
            $table->id();
            $table->integer('list_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->unique(['list_id', 'user_id']);
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
        Schema::dropIfExists('lists');
        Schema::dropIfExists('lists_users');
    }
}
