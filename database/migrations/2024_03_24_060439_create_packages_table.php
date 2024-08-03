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
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->string('title')->unique();
            $table->text('description');
            $table->float('price');
            $table->float('old_price')->nullable();
            $table->date("start_date")->default(now());
            $table->integer('months');
            $table->date("end_date")->nullable();
            $table->boolean("is_active")->default(true);
            $table->enum("badge", ["NEW", "HOT", "BASIC","PREMIUM"]);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('packages');
    }
};
