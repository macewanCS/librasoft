<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actions', function (Blueprint $table) {
            $table->increments('id');
            $table->text('body');
<<<<<<< 719956cd32de488af82bd123e7a671b583e73aea
            $table->date('date');
            $table->text('lead');
            $table->text('collaborators');
            $table->text('status');
            $table->text('success');
=======
>>>>>>> Add Migrations for goat
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
        Schema::drop('actions');
    }
}
