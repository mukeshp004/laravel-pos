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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('uuid')->comment('Unique Identifier');
            $table->string('slug')->nullable();
            $table->string('name')->nullable();
            $table->string('sku')->nullable();
            $table->integer('type')->default(1)->nullable();

            $table->string('description')->nullable();
            $table->string('url_key')->nullable();
            $table->boolean('is_new')->nullable();

            $table->decimal('quantity', 12, 4)->nullable();
            $table->decimal('cost', 12, 4)->nullable();
            $table->decimal('price', 12, 4)->nullable();
            $table->decimal('mrp', 12, 4)->nullable();


            $table->string('size')->nullable();
            $table->string('color')->nullable();

            $table->boolean('status')->default(0);

            $table->timestamps();
        });

        Schema::create('product_stocks', function (Blueprint $table) {

            $table->string('size')->nullable();
            $table->string('color')->nullable();
            $table->decimal('quantity', 12, 4)->nullable();
            $table->decimal('cost', 12, 4)->nullable();
            $table->decimal('mrp', 12, 4)->nullable();
            $table->decimal('price', 12, 4)->nullable();
            $table->foreignId('product_id')->onDelete('cascade');

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
        Schema::dropIfExists('products');
        Schema::dropIfExists('product_stocks');
    }
};
