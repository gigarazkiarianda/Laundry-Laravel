<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->integer('id'); // Kolom id
            $table->unsignedBigInteger('transaction_id'); // Kolom transaction_id
            $table->decimal('amount', 10, 2); // Kolom amount
            $table->enum('payment_type', ['cash', 'credit_card', 'transfer']); // Kolom payment_type
            $table->timestamp('paid_at')->nullable(); // Kolom paid_at
            $table->timestamps(); // Kolom created_at dan updated_at

            // Menambahkan foreign key constraints
            $table->foreign('transaction_id')->references('id')->on('transactions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payments');
    }
}
