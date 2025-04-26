<?php

use App\Models\VillageBudget;
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
        Schema::create('village_budget_details', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(VillageBudget::class)->constrained()->cascadeOnDelete();
            $table->string('type');
            $table->decimal('value', 15, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('village_budget_details');
    }
};
