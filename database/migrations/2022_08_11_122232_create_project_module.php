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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->integer('employee_id')->default(0);
            $table->integer('client_id')->default(0);
            $table->longText('title')->nullable();
            $table->longText('slug')->nullable();
            $table->longText('description')->nullable();
            $table->string('thumbnail')->nullable();
            $table->string('website')->nullable();
            $table->float('amount',20,0)->nullable();
            $table->float('total_payment',20,0)->nullable();
            $table->float('total_spend',20,0)->nullable();
            $table->date('start_at')->nullable();
            $table->date('due_at')->nullable();
            $table->enum('st',['Pending','On Going','Finish'])->default('Pending')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
        Schema::create('project_quotations', function (Blueprint $table) {
            $table->id();
            $table->string('code',100)->nullable();
            $table->integer('employee_id')->default(0);
            $table->integer('project_id')->default(0);
            $table->string('file')->nullable();
            $table->date('date')->nullable();
            $table->enum('st',['Pending','Rejected','Accepted'])->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
        Schema::create('project_mous', function (Blueprint $table) {
            $table->id();
            $table->string('code',100)->nullable();
            $table->integer('employee_id')->default(0);
            $table->integer('project_id')->default(0);
            $table->string('file')->nullable();
            $table->date('date')->nullable();
            $table->string('client_sign')->nullable();
            $table->string('company_sign')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
        Schema::create('project_invoices', function (Blueprint $table) {
            $table->id();
            $table->string('code',100)->nullable();
            $table->integer('employee_id')->default(0);
            $table->integer('project_id')->default(0);
            $table->string('file')->nullable();
            $table->float('tax',20,0)->default(0);
            $table->float('discount',20,0)->default(0);
            $table->float('late_fee',30,0)->default(0);
            $table->float('total',30,0)->default(0);
            $table->date('date')->nullable();
            $table->date('due_date')->nullable();
            $table->longText('note')->nullable();
            $table->enum('st',['Pending','Received'])->nullable();
            $table->boolean('is_late_fee');
            $table->timestamp('received_at')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
        Schema::create('project_invoice_details', function (Blueprint $table) {
            $table->id();
            $table->integer('project_invoices_id')->default(0);
            $table->string('name')->nullable();
            $table->longText('description')->nullable();
            $table->float('qty',20,0)->default(0);
            $table->float('price',20,0)->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
        Schema::create('project_spends', function (Blueprint $table) {
            $table->id();
            $table->integer('employee_id')->default(0);
            $table->integer('project_id')->default(0);
            $table->longText('description')->nullable();
            $table->float('amount',20,0)->nullable();
            $table->integer('created_by')->default(0);
            $table->enum('st',['Pending','Accepted','Rejected'])->default('Pending');
            $table->timestamps();
            $table->softDeletes();
        });
        Schema::create('project_mohs', function (Blueprint $table) {
            $table->id();
            $table->string('code',100)->nullable();
            $table->integer('employee_id')->default(0);
            $table->integer('project_id')->default(0);
            $table->string('file')->nullable();
            $table->date('date')->nullable();
            $table->string('client_sign')->nullable();
            $table->string('company_sign')->nullable();
            $table->enum('st',['Pending','Accepted'])->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
        Schema::create('project_galleries', function (Blueprint $table) {
            $table->id();
            $table->integer('employee_id')->default(0);
            $table->integer('project_id')->default(0);
            $table->string('file');
            $table->enum('st',['Progress','Revision','Result'])->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
        Schema::create('project_reviews', function (Blueprint $table) {
            $table->id();
            $table->integer('client_id')->default(0);
            $table->integer('employee_id')->default(0);
            $table->integer('project_id')->default(0);
            $table->string('review');
            $table->float('rate',2,1);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projects');
        Schema::dropIfExists('project_spends');
        Schema::dropIfExists('project_quotations');
        Schema::dropIfExists('project_mous');
        Schema::dropIfExists('project_invoices');
        Schema::dropIfExists('project_mohs');
        Schema::dropIfExists('project_galleries');
        Schema::dropIfExists('project_reviews');
    }
};
