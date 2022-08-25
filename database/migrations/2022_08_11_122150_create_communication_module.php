<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('announcements', function (Blueprint $table) {
            $table->id();
            $table->integer('employee_id')->default(0);
            $table->longText('to');
            $table->longText('subject');
            $table->longText('messages');
            $table->enum('type',['General','Interview','Meeting','Mutasi','Payroll','Promotion','Punishment','Others']);
            $table->timestamps();
        });
        Schema::create('chats', function (Blueprint $table) {
            $table->id();
            $table->longText('body');
            $table->bigInteger('from_id')->default(0);
            $table->bigInteger('to_id')->default(0);
            $table->string('receiver',1);
            $table->string('sender',1);
            $table->timestamp('read_at')->nullable();
            $table->timestamps();
        });
        Schema::create('emails', function (Blueprint $table) {
            $table->id();
            $table->longText('subject');
            $table->longText('body');
            $table->longText('cc');
            $table->string('attachment');
            $table->longText('from');
            $table->longText('to');
            $table->timestamps();
        });
        Schema::create('news', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->longText('title');
            $table->longText('slug');
            $table->longText('body');
            $table->string('thumbnail');
            $table->boolean('is_public');
            $table->string('viewer',5);
            $table->integer('created_by')->default(0);
            $table->timestamps();
        });
        Schema::create('new_likes', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('new_id');
            $table->integer('employee_id')->nullable();
            $table->timestamps();
        });
        Schema::create('new_comments', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('new_id');
            $table->integer('employee_id')->nullable();
            $table->longText('body')->nullable();
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
        Schema::dropIfExists('announcements');
        Schema::dropIfExists('chats');
        Schema::dropIfExists('emails');
        Schema::dropIfExists('news');
        Schema::dropIfExists('new_likes');
        Schema::dropIfExists('new_comments');
    }
};
