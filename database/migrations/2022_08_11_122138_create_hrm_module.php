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
        Schema::create('day_offs', function (Blueprint $table) {
            $table->id();
            $table->integer('employee_id')->default(0);
            $table->date('date');
            $table->string('amount',1);
            $table->longText('reason')->nullable();
            $table->enum('st',['Pending','Approved','Denied'])->nullable();
            $table->integer('verified_by')->default(0);
            $table->timestamps();
        });
        Schema::create('departments', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->longText('desc')->nullable();
        });
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->integer('company_id')->default(0);
            $table->string('nip',20)->unique()->nullable();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone')->unique()->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->date('date_birth')->nullable();
            $table->longText('jobdesc')->nullable();
            $table->longText('bio')->nullable();
            $table->longText('impression')->nullable();
            $table->longText('address')->nullable();
            $table->integer('country_id')->default(0);
            $table->integer('province_id')->default(0);
            $table->integer('regency_id')->default(0);
            $table->bigInteger('district_id')->default(0);
            $table->bigInteger('village_id')->default(0);
            $table->string('postcode',5)->nullable();
            $table->integer('department_id')->default(0);
            $table->integer('position_id')->default(0);
            $table->string('avatar')->nullable();
            $table->string('cv')->nullable();
            $table->string('google_id')->nullable();
            $table->string('instagram_url')->nullable();
            $table->string('linkedin_url')->nullable();
            $table->string('facebook_url')->nullable();
            $table->string('twitter_url')->nullable();
            $table->string('paypal')->nullable();
            $table->string('password')->nullable();
            $table->string('st',1)->nullable();
            $table->rememberToken();
            $table->timestamp('last_seen')->nullable();
            $table->timestamps();
        });
        Schema::create('employee_activities', function (Blueprint $table) {
            $table->id();
            $table->integer('employee_id')->default(0)->nullable();
            $table->longText('message')->nullable();
            $table->timestamps();
        });
        Schema::create('employee_addresses', function (Blueprint $table) {
            $table->id();
            $table->integer('employee_id')->default(0);
            $table->string('name');
            $table->longText('address');
            $table->longText('instruction')->nullable();
            $table->integer('province_id')->default(0);
            $table->integer('regency_id')->default(0);
            $table->bigInteger('district_id')->default(0);
            $table->bigInteger('village_id')->default(0);
            $table->string('postcode',5)->nullable();
            $table->boolean('is_primary');
        });
        Schema::create('employee_attendances', function (Blueprint $table) {
            $table->id();
            $table->integer('employee_id')->default(0);
            $table->timestamp('presence_at')->nullable();
            $table->timestamp('finish_at')->nullable();
        });
        Schema::create('employee_bank_accounts', function (Blueprint $table) {
            $table->id();
            $table->integer('bank_id')->default(0);
            $table->integer('employee_id')->default(0);
            $table->string('account_number')->unique();
            $table->integer('branch_name')->default(0);
            $table->boolean('is_primary');
        });
        Schema::create('employee_certificates', function (Blueprint $table) {
            $table->id();
            $table->integer('employee_id')->default(0);
            $table->string('file')->nullable();
        });
        Schema::create('employee_memos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('employee_id')->default(0);
            $table->longText('title');
            $table->longText('body');
            $table->timestamps();
        });
        Schema::create('employee_payrolls', function (Blueprint $table) {
            $table->id();
            $table->integer('employee_id')->default(0);
            $table->integer('employee_bank_account_id')->default(0);
            $table->string('amount')->default(0);
            $table->string('file')->nullable();
            $table->timestamps();
        });
        Schema::create('employee_rewards', function (Blueprint $table) {
            $table->id();
            $table->integer('employee_id')->default(0);
            $table->enum('type',['Cash','Vacation','Other']);
            $table->longText('reason')->nullable();
            $table->string('amount',20)->nullable();
            $table->enum('st',['Pending','Approved','Denied'])->nullable();
            $table->integer('created_by')->default(0);
            $table->timestamps();
        });
        Schema::create('job_applications', function (Blueprint $table) {
            $table->id();
            $table->integer('vacancy_id')->default(0);
            $table->integer('employee_id')->default(0);
            $table->string('expected_salary');
            $table->longText('messages');
            $table->string('st',1);
            $table->timestamps();
        });
        Schema::create('kpis', function (Blueprint $table) {
            $table->id();
            $table->longText('function')->nullable();
            $table->timestamps();
        });
        Schema::create('kpi_objectives', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('kpi_id')->default(0);
            $table->longText('objective')->nullable();
            $table->integer('department_id')->default(0);
            $table->integer('position_id')->default(0);
            $table->timestamps();
        });
        Schema::create('kpi_key_results', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('kpi_objective_id')->default(0);
            $table->integer('employee_id')->default(0);
            $table->integer('superior_id')->default(0);
            $table->enum('quarter',['1','2','3','4'])->nullable();
            $table->longText('key_result')->nullable();
            $table->longText('description')->nullable();
            $table->longText('measure_unit')->nullable();
            $table->float('commited_target')->nullable();
            $table->float('weight',3,0)->nullable();
            $table->longText('review')->nullable();
            $table->longText('supporting_data')->nullable();
            $table->float('score')->nullable();
            $table->timestamps();
        });
        Schema::create('modules', function (Blueprint $table) {
            $table->id();
            $table->integer('module_id')->default(0);
            $table->string('name');
            $table->string('url')->nullable();
            $table->longText('icon')->nullable();
            $table->boolean('is_show')->default(1);
        });
        Schema::create('module_privileges', function (Blueprint $table) {
            $table->id();
            $table->integer('module_id')->default(0);
            $table->string('name');
        });
        Schema::create('permissions', function (Blueprint $table) {
            $table->id();
            $table->integer('position_id')->default(0);
            $table->integer('module_id')->default(0);
        });
        Schema::create('positions', function (Blueprint $table) {
            $table->id();
            $table->integer('department_id')->default(0);
            $table->string('name');
            $table->longText('desc')->nullable();
        });
        Schema::create('vacancy_jobs', function (Blueprint $table) {
            $table->id();
            $table->integer('company_id')->default(0);
            $table->string('title');
            $table->longText('slug');
            $table->longText('description');
            $table->longText('requirement');
            $table->longText('facilities');
            $table->integer('department_id')->default(0);
            $table->integer('position_id')->default(0);
            $table->string('rates');
            $table->enum('st',['Open','Closed'])->default('Open');
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
        Schema::dropIfExists('day_offs');
        Schema::dropIfExists('departments');
        Schema::dropIfExists('employees');
        Schema::dropIfExists('employee_activities');
        Schema::dropIfExists('employee_addresses');
        Schema::dropIfExists('employee_attendances');
        Schema::dropIfExists('employee_bank_accounts');
        Schema::dropIfExists('employee_certificates');
        Schema::dropIfExists('employee_memos');
        Schema::dropIfExists('employee_payrolls');
        Schema::dropIfExists('employee_rewards');
        Schema::dropIfExists('job_applications');
        Schema::dropIfExists('kpis');
        Schema::dropIfExists('kpi_objectives');
        Schema::dropIfExists('kpi_key_results');
        Schema::dropIfExists('modules');
        Schema::dropIfExists('module_privileges');
        Schema::dropIfExists('permissions');
        Schema::dropIfExists('positions');
        Schema::dropIfExists('vacancy_jobs');
    }
};
