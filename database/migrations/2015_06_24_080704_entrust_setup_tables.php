<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class EntrustSetupTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        // Create table for storing roles
        Schema::create('roles', function (Blueprint $table) {
            $table->string('name', 4)->unique();
            $table->string('display_name', 40)->nullable();
            $table->string('description', 100)->nullable();
            $table->boolean('removable')->default(true);
            $table->timestamps();
        });

        /* Create table for associating roles to users (Many-to-Many)
        Schema::create('role_user', function (Blueprint $table) {
            $table->integer('user_id')->unsigned();
            $table->integer('role_id')->unsigned();

            $table->foreign('user_id')->references('id')->on('users')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('role_id')->references('id')->on('roles')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->primary(['user_id', 'role_id']);
        });
        */

        // Create table for storing permissions
        Schema::create('permissions', function (Blueprint $table) {
            $table->string('name', 20)->unique();
            $table->string('display_name', 40)->nullable();
            $table->string('description', 100)->nullable();
            $table->boolean('removable')->default(true);
            $table->timestamps();
        });

        // Create table for associating permissions to roles (Many-to-Many)
        Schema::create('permission_role', function (Blueprint $table) {
            $table->string('role_name', 4);
            $table->string('permission_name', 20);

            $table->foreign('permission_name')->references('name')->on('permissions')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('role_name')->references('name')->on('roles')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->primary(['role_name', 'permission_name']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return  void
     */
    public function down()
    {
        Schema::drop('permission_role');
        Schema::drop('permissions');
        Schema::drop('role_user');
        Schema::drop('roles');
    }
}
