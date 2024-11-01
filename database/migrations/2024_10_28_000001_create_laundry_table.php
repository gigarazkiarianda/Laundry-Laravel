<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLaundryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laundry', function (Blueprint $table) {
            $table->id(); // Kolom id
            $table->string('customer_name'); // Kolom customer_name
            $table->string('phone'); // Kolom phone
            $table->enum('status', ['selesai', 'dibayar', 'diambil', 'proses pencucian', 'pending']); // Kolom status
            $table->timestamps(); // Kolom created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('laundry');
    }
}
