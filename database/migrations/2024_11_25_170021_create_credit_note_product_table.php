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
        Schema::create('credit_note_product', function (Blueprint $table) {
            $table->foreignId('credite_note_id')->constrained();
            $table->foreignId('product_id')->constrained();
            $table->primary(['product_id', 'credite_note_id']);
            $table->decimal('quantity');
            $table->decimal('unit_price');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('credit_note_product');
    }
};
