<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('post_id');
            $table->unsignedInteger('posted_by');
            $table->char('linked_unit', 4)->nullable();
            $table->string('title', 60);
            $table->text('text');
            $table->timestamps();
            $table->foreign('posted_by')->references('scout_id')->on('users');
            $table->foreign('linked_unit')->references('unit_id')->on('units');
        });

        Schema::create('posttags', function(Blueprint $table){
            $table->integer('post_id')->unsigned();
            $table->unsignedInteger('tag');
            $table->primary(array('post_id', 'tag'));
            $table->foreign('post_id')->references('post_id')->on('posts')
                ->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::create('editedposts', function(Blueprint $table){
            $table->integer('post_id')->unsigned();
            $table->integer('editor')->unsigned();
            $table->primary(array('post_id', 'editor'));

            $table->foreign('post_id')->references('post_id')->on('posts')
                    ->onUpdate('cascade')->onDelete('cascade');

            $table->foreign('editor')->references('scout_id')->on('users')
                    ->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {   
        Schema::dropIfExists('posttags');
        Schema::dropIfExists('editedposts');
        Schema::dropIfExists('posts');

    }
}