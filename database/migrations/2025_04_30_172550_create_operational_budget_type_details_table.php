<?php

use App\Models\OperationalBudgetType;
use App\Models\OperationalBudgetTypeDetail;
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
        Schema::create('operational_budget_type_details', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(OperationalBudgetType::class)
                ->constrained(indexName: 'operational_budget_type_id')
                ->cascadeOnDelete();
            $table->string('operational_detail_name');
            $table->decimal('value', 15, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('operational_budget_type_details');
    }
};
