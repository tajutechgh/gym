<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('membership_id');
            $table->integer('class_id')->nullable();
            $table->integer('group_id')->nullable();
            $table->integer('user_id')->nullable();
            $table->string('name');
            $table->string('address');
            $table->string('email')->unique();
            $table->string('phone')->unique();
            $table->string('dob');
            $table->string('gender');
            $table->string('start_date');
            $table->string('end_date');
            $table->string('image');
            $table->timestamps();
            $table->datetime('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('members');

        Schema::table('members', function (Blueprint $table) {
            $table->dropColumn('deleted_at');
        });
    }
}
