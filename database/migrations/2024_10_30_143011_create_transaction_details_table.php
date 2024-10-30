<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaction_details', function (Blueprint $table) {
            $table->id(); // Kolom id, gunakan autoIncrement secara default
            $table->unsignedBigInteger('transaction_id'); // Kolom transaction_id
            $table->string('item'); // Kolom item
            $table->integer('quantity'); // Kolom quantity
            $table->decimal('unit_price', 10, 2); // Kolom unit_price
            $table->decimal('total_price', 10, 2); // Kolom total_price
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
        Schema::dropIfExists('transaction_details');
    }
}
