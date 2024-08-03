<?php

use Carbon\Carbon;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('gender',['male', 'female']);
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->enum('role',['super_admin', 'men_admin', 'girls_admin', 'user'])->default('user');
            $table->float("the_price_of_registration", 8, 2)->default(200.00);
            $table->integer("number_of_months")->default(1);
            $table->timestamp("start_date")->default(Carbon::now());
            $table->timestamp("end_date")->default(DB::raw("DATE_ADD(`start_date`, INTERVAL `number_of_months` MONTH)"));
            $table->enum('status',['active', 'inactive'])->default("active");
            $table->string('phone')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
