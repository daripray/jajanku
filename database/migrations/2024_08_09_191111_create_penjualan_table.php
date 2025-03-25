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
        Schema::create('penjualan', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->unsignedBigInteger('price_id');
            $table->integer('quantity')->default(0);
            $table->decimal('sold', 15, 2)->default(0);
            $table->decimal('price', 15, 2)->default(0);
            $table->decimal('subtotal', 15, 2)->default(0);
            $table->decimal('total', 15, 2)->default(0);
            $table->decimal('paid', 15, 2)->default(0);
            $table->enum('paidoff', ['0', '1'])->default('0');
            $table->text('notes')->nullable();
            $table->timestamps();

            // Foreign keys
            $table->foreign('price_id')->references('id')->on('prices')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penjualan');
    }
};
