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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('username')->unique();
            $table->string('email');
            $table->string('address_street');
            $table->string('address_suite');
            $table->string('address_city');
            $table->string('address_zipcode');
            $table->string('address_geo_lat');
            $table->string('address_geo_lng');
            $table->string('phone');
            $table->string('website');
            $table->string('company_name');
            $table->string('company_catchPhrase');
            $table->string('company_bs');
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
