<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShiftsTable extends Migration // Renamed to plural
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shift', function (Blueprint $table) { // Renamed to plural
            $table->id(); // Kolom id
            $table->unsignedBigInteger('user_id'); // Kolom user_id
            $table->timestamp('start_time'); // Kolom start_time
            $table->timestamp('end_time'); // Kolom end_time
            $table->decimal('total_income', 10, 2); // Kolom total_income
            $table->timestamps(); // Kolom created_at dan updated_at

            // Foreign key constraint
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shift'); // Renamed to plural
    }
}
