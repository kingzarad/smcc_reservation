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
        Schema::create('reservation', function (Blueprint $table) {
            $table->id();
            $table->string('reference_num');
            $table->unsignedBigInteger('users_id');
            $table->unsignedBigInteger('department_id');
            $table->timestamp('date_filled');
            $table->tinyInteger('school_premises')->default(0)->comment('1=inside,0=outside');
            $table->date('date_from');
            $table->date('date_to');
            $table->time('time_from');
            $table->time('time_to');
            $table->date('date_return');
            $table->time('time_return');
            $table->longText('purpose')->nullable();
            $table->string('remarks')->nullable();
            $table->string('signature');
            $table->tinyInteger('status')->default(0)->comment('2=cancelled,1=confirm,0=pending');
            $table->foreign('department_id')->references('id')->on('department')->onDelete('cascade');
            $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservation');
    }
};
