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
        Schema::create('coa_categories', function (Blueprint $table) {
            $table->id();
            $table->string('code',10);
            $table->string('name');
        });
        Schema::create('coas', function (Blueprint $table) {
            $table->id();
            $table->integer('coa_category_id')->default(0);
            $table->string('code',10);
            $table->string('name');
        });
        Schema::create('journals', function (Blueprint $table) {
            $table->id();
            $table->string('code',10);
            $table->date('date');
            $table->integer('coa_id')->default(0);
            $table->string('debit')->default(0);
            $table->string('credit')->default(0);
            $table->timestamps();
        });
        Schema::create('expenses', function (Blueprint $table) {
            $table->id();
            $table->string('code',10);
            $table->date('date');
            $table->string('total')->default(0);
            $table->timestamps();
        });
        Schema::create('expense_details', function (Blueprint $table) {
            $table->id();
            $table->integer('expense_id')->default(0);
            $table->integer('coa_id')->default(0);
            $table->string('amount',10);
            $table->string('attachment');
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
        Schema::dropIfExists('coa_categories');
        Schema::dropIfExists('coas');
        Schema::dropIfExists('journals');
        Schema::dropIfExists('expenses');
        Schema::dropIfExists('expense_details');
    }
};
