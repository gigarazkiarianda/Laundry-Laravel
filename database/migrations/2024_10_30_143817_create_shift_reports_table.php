<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShiftReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shift_reports', function (Blueprint $table) {
            $table->integer('id'); // Kolom id
            $table->unsignedBigInteger('shift_id'); // Kolom shift_id
            $table->decimal('total_sales', 10, 2); // Kolom total_sales
            $table->integer('total_transactions'); // Kolom total_transactions
            $table->integer('total_laundry_items'); // Kolom total_laundry_items
            $table->timestamps(); // Kolom created_at dan updated_at

            // Menambahkan foreign key constraints
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
        Schema::dropIfExists('shift_reports');
    }
}
