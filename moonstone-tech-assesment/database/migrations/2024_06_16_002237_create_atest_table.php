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
        Schema::create('atest', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });

        Schema::create('atest', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->string('name', 60);
            $table->integer('pef_item_id')->nullable();
            $table->integer('order_no');
            $table->timestamps();
        });

        // insert the data into the table
        $this->insertData();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('atest');
    }

    // Todo: implement the 'insertData()' function and perform migration
};
