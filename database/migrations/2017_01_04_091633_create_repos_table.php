<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReposTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('repos', function (Blueprint $table) {
          $table->integer('id')->unique();
          $table->string('name');
          $table->string('full_name');
          $table->string('owner');
          $table->string('html_url');
          $table->string('description');
          $table->integer('userid');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('repos');
    }
}
