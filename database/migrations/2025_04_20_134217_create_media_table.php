<?php

use App\Models\News;
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
        Schema::create('media', function (Blueprint $table) {
            $table->id();
            // Polymorphic fields
            // $table->unsignedBigInteger('mediable_id');
            // $table->string('mediable_type');

            $table->foreignIdFor(News::class)->constrained()->cascadeOnDelete();

            // Media-specific fields
            $table->enum('type', ['image', 'file'])->default('image');
            $table->string('name')->nullable(); // stored path or URL
            $table->string('url'); // stored path or URL
            $table->string('alt')->nullable();

            // Index for better polymorphic performance
            // $table->index(['mediable_id', 'mediable_type']);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('media');
    }
};
