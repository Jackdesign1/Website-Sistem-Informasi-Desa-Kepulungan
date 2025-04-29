<?php

use App\Models\BudgetPriority;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('budget_priority_details', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(BudgetPriority::class)->constrained()->cascadeOnDelete();
            $table->string('priority_name');
            $table->decimal('value', 15, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('budget_priority_details');
    }
};
