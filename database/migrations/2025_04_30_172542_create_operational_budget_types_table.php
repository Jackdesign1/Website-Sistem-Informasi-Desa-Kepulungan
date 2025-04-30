<?php

use App\Models\OperationalBudget;
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
        Schema::create('operational_budget_types', function (Blueprint $table) {
            $table->id();
            $table->string('operational_type_name');
            $table->foreignIdFor(OperationalBudget::class)
                ->constrained(indexName: 'operational_budget_id') 
                ->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('operational_budget_types');
    }
};
