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
        Schema::create('banks', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('code')->nullable();
            $table->boolean('is_activated');
            $table->string('thumbnail')->nullable();
            $table->softDeletes();
        });
        Schema::create('changelogs', function (Blueprint $table) {
            $table->id();
            $table->longText('name');
            $table->timestamps();
            $table->softDeletes();
        });
        Schema::create('changelog_details', function (Blueprint $table) {
            $table->id();
            $table->integer('changelog_id')->default(0);
            $table->longText('title')->nullable();
            $table->longText('description')->nullable();
            $table->string('url')->nullable();
            $table->enum('type',['New','Update','Fix'])->default('New');
            $table->softDeletes();
        });
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('logo')->nullable();
            $table->string('icon')->nullable();
            $table->string('web_url')->nullable();
            $table->string('instagram_url')->nullable();
            $table->string('linkedin_url')->nullable();
            $table->string('facebook_url')->nullable();
            $table->string('twitter_url')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
        Schema::create('company_addresses', function (Blueprint $table) {
            $table->id();
            $table->integer('company_id')->default(0);
            $table->string('name');
            $table->longText('address');
            $table->longText('instruction')->nullable();
            $table->integer('province_id')->default(0);
            $table->integer('regency_id')->default(0);
            $table->bigInteger('district_id')->default(0);
            $table->bigInteger('village_id')->default(0);
            $table->string('postcode',5)->nullable();
            $table->boolean('is_primary');
            $table->timestamps();
            $table->softDeletes();
        });
        Schema::create('company_bank_accounts', function (Blueprint $table) {
            $table->id();
            $table->integer('bank_id')->default(0);
            $table->integer('company_id')->default(0);
            $table->string('account_number')->unique();
            $table->integer('branch_name')->default(0);
            $table->boolean('is_primary');
            $table->softDeletes();
        });
        Schema::create('contents', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->longText('description')->nullable();
            $table->string('banner')->nullable();
            $table->enum('type',['about','visi_misi','what_we_do','our_strategy','why_choose_us','our_process','join_team','what_makes_us_different'])->nullable();
            $table->softDeletes();
        });
        Schema::create('days', function (Blueprint $table) {
            $table->id();
        });
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->integer('employee_id')->default(0);
            $table->longText('name');
            $table->longText('description')->nullable();
            $table->string('type')->nullable();
            $table->longText('url')->nullable();
            $table->timestamp('start_at')->nullable();
            $table->timestamp('end_at')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
        Schema::create('faq_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->softDeletes();
        });
        Schema::create('faqs', function (Blueprint $table) {
            $table->id();
            $table->integer('faq_category_id')->default(0);
            $table->longText('question');
            $table->longText('answer');
            $table->softDeletes();
        });
        Schema::create('histories', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('description')->nullable();
            $table->string('year',4)->nullable();
            $table->softDeletes();
        });
        Schema::create('inbox', function (Blueprint $table) {
            $table->id();
            $table->integer('department_id')->default(0);
            $table->string('fname');
            $table->string('lname');
            $table->string('email');
            // $table->string('phone',15);
            $table->longText('messages');
            $table->timestamp('created_at');
            $table->timestamp('read_at')->nullable();
            $table->softDeletes();
        });
        Schema::create('isic_types', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->softDeletes();
        });
        Schema::create('isics', function (Blueprint $table) {
            $table->id();
            $table->integer('isic_type_id')->default(0);
            $table->string('code');
            $table->string('name');
            $table->softDeletes();
        });
        Schema::create('legal_docs', function (Blueprint $table) {
            $table->id();
            $table->integer('doc_type_id')->default(0);
            $table->string('code');
            $table->string('attachment');
            $table->softDeletes();
        });
        Schema::create('legal_doc_types', function (Blueprint $table) {
            $table->id();
            $table->integer('doc_type_id')->default(0);
            $table->string('code',10);
            $table->string('name');
            $table->softDeletes();
        });
        Schema::create('legal_policies', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->longText('body');
            $table->softDeletes();
        });
        Schema::create('mail_configs', function (Blueprint $table) {
            $table->id();
            $table->string('driver');
            $table->string('host');
            $table->string('port');
            $table->string('from_address');
            $table->string('from_name');
            $table->string('encryption');
            $table->string('username');
            $table->string('password');
        });
        Schema::create('newsletters', function (Blueprint $table) {
            $table->id();
            $table->string('email')->nullable();
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
        Schema::dropIfExists('banks');
        Schema::dropIfExists('companies');
        Schema::dropIfExists('company_addresses');
        Schema::dropIfExists('company_bank_accounts');
        Schema::dropIfExists('contents');
        Schema::dropIfExists('days');
        Schema::dropIfExists('events');
        Schema::dropIfExists('faq_categories');
        Schema::dropIfExists('faqs');
        Schema::dropIfExists('histories');
        Schema::dropIfExists('inbox');
        Schema::dropIfExists('isic_types');
        Schema::dropIfExists('isics');
        Schema::dropIfExists('legal_docs');
        Schema::dropIfExists('legal_doc_types');
        Schema::dropIfExists('legal_policies');
        Schema::dropIfExists('mail_configs');
        Schema::dropIfExists('media');
        Schema::dropIfExists('newsletters');
    }
};
