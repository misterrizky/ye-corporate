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
        Schema::create('company_industries', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable()->comment('input type text');
        });
        Schema::create('contact_groups', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable()->comment('input type text');
        });
        Schema::create('leads', function (Blueprint $table) {
            $table->id();
            $table->integer('employee_id')->default(0)->comment('berdasarkan yg login');
            $table->integer('contact_group_id')->default(0)->comment('select option');
            $table->integer('company_industry_id')->default(0)->nullable()->comment('select option');
            $table->string('company_name')->nullable()->comment('input type text');
            $table->string('name')->nullable()->comment('input type text');
            $table->string('phone',15)->nullable()->comment('input type tel');
            $table->string('email')->nullable()->comment('input type email');
            $table->longText('address')->nullable()->comment('textarea');
            $table->longText('notes')->nullable()->comment('textarea');
            $table->timestamps();
        });
        Schema::create('lead_activities', function (Blueprint $table) {
            $table->id();
            $table->integer('employee_id')->default(0);
            $table->integer('lead_id')->default(0);
            $table->date('date')->nullable();
            $table->longText('notes')->nullable();
            $table->enum('type',['Follow Up','Meeting'])->default('Follow Up');
            $table->enum('st',['Pending','On Going','Completed'])->default('Pending');
            $table->timestamp('completed_at');
            $table->timestamps();
        });
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->integer('employee_id')->default(0);
            $table->integer('contact_group_id')->default(0);
            $table->integer('company_industry_id')->default(0)->nullable()->comment('select option');
            $table->string('company_name')->nullable();
            $table->string('company_logo')->nullable();
            $table->string('title')->nullable();
            $table->string('name')->nullable();
            $table->string('username',30)->nullable();
            $table->string('phone',15)->nullable();
            $table->string('email')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('address')->nullable();
            $table->integer('country_id')->default(0);
            $table->integer('province_id')->default(0);
            $table->integer('regency_id')->default(0);
            $table->bigInteger('district_id')->default(0);
            $table->bigInteger('village_id')->default(0);
            $table->string('postcode',5)->nullable();
            $table->string('password')->nullable();
            $table->date('date_birth')->nullable();
            $table->string('website')->nullable();
            $table->string('google_id')->nullable();
            $table->enum('type',['Client','Customer','Lead','Partner'])->nullable();
            $table->enum('category',['Offline','Online'])->nullable();
            $table->enum('st',['Active','Non Active'])->nullable();
            $table->string('avatar')->nullable();
            $table->timestamp('last_seen')->nullable();
            $table->timestamps();
        });
        Schema::create('client_activities', function (Blueprint $table) {
            $table->id();
            $table->integer('employee_id')->default(0);
            $table->integer('client_id')->default(0);
            $table->date('date')->nullable();
            $table->longText('notes')->nullable();
            $table->enum('type',['Follow Up','Meeting'])->default('Follow Up');
            $table->enum('st',['Pending','On Going','Completed'])->default('Pending');
            $table->timestamp('completed_at');
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
        Schema::dropIfExists('company_industries');
        Schema::dropIfExists('contact_groups');
        Schema::dropIfExists('leads');
        Schema::dropIfExists('lead_activities');
        Schema::dropIfExists('clients');
        Schema::dropIfExists('client_activities');
    }
};
