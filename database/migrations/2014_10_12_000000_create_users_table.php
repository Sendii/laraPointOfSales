<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('akses');
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

        DB::table('users')->insert([
            'name' => "Teknosop Admin",
            'email' => "admin@gmail.com",
            'password' => Hash::make("888888"),
            'akses' => "Admin"
        ]);

        DB::table('users')->insert([
            'name' => "Teknosop SuperAdmin",
            'email' => "superadmin@gmail.com",
            'password' => Hash::make("888888"),
            'akses' => "SuperAdmin"
        ]);
        DB::table('users')->insert([
            'name' => "Teknosop Kasir",
            'email' => "kasir@gmail.com",
            'password' => Hash::make("888888"),
            'akses' => "Kasir"
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
