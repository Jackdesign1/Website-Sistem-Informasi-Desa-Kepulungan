<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('job_vacancies', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->string('position')->nullable();
            $table->string('location')->nullable();
            $table->string('company_name');
            $table->string('company_logo')->nullable(); // if you want to show logo
            $table->string('contact_email')->nullable();

            $table->date('posted_at')->default(now());
            $table->date('expires_at')->nullable(); // optional expiration

            $table->enum('status', ['open', 'closed'])->default('open');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_vacancies');
    }
};
