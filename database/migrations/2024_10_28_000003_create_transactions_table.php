<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id(); // Kolom id
            $table->unsignedBigInteger('laundry_id'); // Kolom laundry_id
            $table->unsignedBigInteger('user_id'); // Kolom user_id
            $table->unsignedBigInteger('shift_id'); // Kolom shift_id
            $table->decimal('amount', 10, 2); // Kolom amount
            $table->enum('status', ['tertunda', 'berhasil', 'gagal']); // Kolom status
            $table->enum('payment_type', ['cash', 'transfer']); // Kolom payment_type
            $table->timestamps(); // Kolom created_at dan updated_at

            // Menambahkan foreign key constraints
            $table->foreign('laundry_id')->references('id')->on('laundry')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('shift_id')->references('id')->on('shift')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
}
