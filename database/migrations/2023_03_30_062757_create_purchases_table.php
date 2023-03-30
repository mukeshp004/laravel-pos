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
        Schema::create('purchases', function (Blueprint $table) {
            $table->id();

            $table->decimal('quantity', 12, 4)->nullable();
            $table->decimal('sub_total', 12, 4)->nullable();
            $table->decimal('tax', 12, 4)->nullable();
            $table->decimal('total', 12, 4)->nullable();
            $table->decimal('profit', 12, 4)->nullable();

            $table->foreignId('client_id')->onDelete('cascade')->nullable();
            $table->foreignId('supplier_id')->onDelete('cascade')->nullable();
            $table->foreignId('user_id')->onDelete('cascade')->nullable();


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
        Schema::dropIfExists('purchases');
    }
};
