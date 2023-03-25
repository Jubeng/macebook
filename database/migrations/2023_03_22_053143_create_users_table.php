<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
            $table->string('name', 255)->required();
            $table->string('username', 255)->unique()->required();
            $table->string('email', 255)->unique()->required();
            $table->string('address_street', 255)->required();
            $table->string('address_suite', 255)->required();
            $table->string('address_city', 255)->required();
            $table->string('address_zipcode', 10)->required();
            $table->float('address_geo_lat', 8, 6)->required();
            $table->float('address_geo_lng', 9, 6)->required();
            $table->string('phone', 10)->required();
            $table->string('website', 255)->required();
            $table->string('company_name', 255)->required();
            $table->string('company_catchPhrase', 500)->required();
            $table->string('company_bs', 255)->required();
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
        });

        DB::table('users')->insert([
            [
                'name' => 'Leanne Graham',
                'username' => 'Bret',
                'email' => 'Sincere@april.biz',
                'phone' => '1-770-736-8031 x56442',
                'website' => 'hildegard.org',
                'address_street' => 'Kulas Light',
                'address_suite' => 'Apt. 556',
                'address_city' => 'Gwenborough',
                'address_zipcode' => '92998-3874',
                'address_geo_lat' => '-37.3159',
                'address_geo_lng' => '81.1496',
                'company_name' => 'Romaguera-Crona',
                'company_catchPhrase' => 'Multi-layered client-server neural-net',
                'company_bs' => 'harness real-time e-markets',
            ],
            [
                'name' => 'Ervin Howell',
                'username' => 'Antonette',
                'email' => 'Shanna@melissa.tv',
                'phone' => '010-692-6593 x09125',
                'website' => 'anastasia.net',
                'address_street' => 'Victor Plains',
                'address_suite' => 'Suite 879',
                'address_city' => 'Wisokyburgh',
                'address_zipcode' => '90566-7771',
                'address_geo_lat' => '-43.9509',
                'address_geo_lng' => '-34.4618',
                'company_name' => 'Deckow-Crist',
                'company_catchPhrase' => 'Proactive didactic contingency',
                'company_bs' => 'synergize scalable supply-chains',
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
