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
            $table->string('phone', 50)->required();
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
            [
                'name' =>  'Clementine Bauch',
                'username' =>  'Samantha',
                'email' =>  'Nathan@yesenia.net',
                'address_street' =>  'Douglas Extension',
                'address_suite' =>  'Suite 847',
                'address_city' =>  'McKenziehaven',
                'address_zipcode' =>  '59590-4157',
                'address_geo_lat' =>  '-68.6102',
                'address_geo_lng' =>  '-47.0653',
                'phone' =>  '1-463-123-4447',
                'website' =>  'ramiro.info',
                'company_name' =>  'Romaguera-Jacobson',
                'company_catchPhrase' =>  'Face to face bifurcated interface',
                'company_bs' =>  'e-enable strategic applications'
            ],
            [
                'name' => 'Patricia Lebsack',
                'username' => 'Karianne',
                'email' => 'Julianne.OConner@kory.org',
                'address_street' => 'Hoeger Mall',
                'address_suite' => 'Apt. 692',
                'address_city' => 'South Elvis',
                'address_zipcode' => '53919-4257',
                'address_geo_lat' => '29.4572',
                'address_geo_lng' => '-164.2990',
                'phone' => '493-170-9623 x156',
                'website' => 'kale.biz',
                'company_name' => 'Robel-Corkery',
                'company_catchPhrase' => 'Multi-tiered zero tolerance productivity',
                'company_bs' => 'transition cutting-edge web services',
            ],
            [
                'name' => 'Chelsey Dietrich',
                'username' => 'Kamren',
                'email' => 'Lucio_Hettinger@annie.ca',
                'address_street' => 'Skiles Walks',
                'address_suite' => 'Suite 351',
                'address_city' => 'Roscoeview',
                'address_zipcode' => '33263',
                'address_geo_lat' => '-31.8129',
                'address_geo_lng' => '62.5342',
                'phone' => '(254)954-1289',
                'website' => 'demarco.info',
                'company_name' => 'Keebler LLC',
                'company_catchPhrase' => 'User-centric fault-tolerant solution',
                'company_bs' => 'revolutionize end-to-end systems',
            ],
            [
                'name' => 'Mrs. Dennis Schulist',
                'username' => 'Leopoldo_Corkery',
                'email' => 'Karley_Dach@jasper.info',
                'address_street' => 'Norberto Crossing',
                'address_suite' => 'Apt. 950',
                'address_city' => 'South Christy',
                'address_zipcode' => '23505-1337',
                'address_geo_lat' => '-71.4197',
                'address_geo_lng' => '71.7478',
                'phone' => '1-477-935-8478 x6430',
                'website' => 'ola.org',
                'company_name' => 'Considine-Lockman',
                'company_catchPhrase' => 'Synchronised bottom-line interface',
                'company_bs' => 'e-enable innovative applications',
            ],
            [
                'name' => 'Kurtis Weissnat',
                'username' => 'Elwyn.Skiles',
                'email' => 'Telly.Hoeger@billy.biz',
                'address_street' => 'Rex Trail',
                'address_suite' => 'Suite 280',
                'address_city' => 'Howemouth',
                'address_zipcode' => '58804-1099',
                'address_geo_lat' => '24.8918',
                'address_geo_lng' => '21.8984',
                'phone' => '210.067.6132',
                'website' => 'elvis.io',
                'company_name' => 'Johns Group',
                'company_catchPhrase' => 'Configurable multimedia task-force',
                'company_bs' => 'generate enterprise e-tailers',
            ],
            [
                'name' => 'Nicholas Runolfsdottir V',
                'username' => 'Maxime_Nienow',
                'email' => 'Sherwood@rosamond.me',
                'address_street' => 'Ellsworth Summit',
                'address_suite' => 'Suite 729',
                'address_city' => 'Aliyaview',
                'address_zipcode' => '45169',
                'address_geo_lat' => '-14.3990',
                'address_geo_lng' => '-120.7677',
                'phone' => '586.493.6943 x140',
                'website' => 'jacynthe.com',
                'company_name' => 'Abernathy Group',
                'company_catchPhrase' => 'Implemented secondary concept',
                'company_bs' => 'e-enable extensible e-tailers',
            ],
            [
                'name' => 'Glenna Reichert',
                'username' => 'Delphine',
                'email' => 'Chaim_McDermott@dana.io',
                'address_street' => 'Dayna Park',
                'address_suite' => 'Suite 449',
                'address_city' => 'Bartholomebury',
                'address_zipcode' => '76495-3109',
                'address_geo_lat' => '24.6463',
                'address_geo_lng' => '-168.8889',
                'phone' => '(775)976-6794 x41206',
                'website' => 'conrad.com',
                'company_name' => 'Yost and Sons',
                'company_catchPhrase' => 'Switchable contextually-based project',
                'company_bs' => 'aggregate real-time technologies',
            ],
            [
                'name' => 'Clementina DuBuque',
                'username' => 'Moriah.Stanton',
                'email' => 'Rey.Padberg@karina.biz',
                'address_street' => 'Kattie Turnpike',
                'address_suite' => 'Suite 198',
                'address_city' => 'Lebsackbury',
                'address_zipcode' => '31428-2261',
                'address_geo_lat' => '-38.2386',
                'address_geo_lng' => '57.2232',
                'phone' => '024-648-3804',
                'website' => 'ambrose.net',
                'company_name' => 'Hoeger LLC',
                'company_catchPhrase' => 'Centralized empowering task-force',
                'company_bs' => 'target end-to-end models',
            ]
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
