<?php

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
        Schema::create('purchase_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('purchase_id')->onDelete('cascade');
            $table->foreignId('product_id')->onDelete('cascade');
            // $table->string('description')->nullable();
            $table->decimal('quantity', 12, 4)->nullable();
            $table->decimal('cost', 12, 4)->nullable();
            $table->decimal('mrp', 12, 4)->nullable();
            $table->decimal('price', 12, 4)->nullable();
            $table->decimal('discount', 12, 4)->nullable();
            $table->decimal('discount_percentage', 12, 4)->nullable();

            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchase_items');
    }
};
