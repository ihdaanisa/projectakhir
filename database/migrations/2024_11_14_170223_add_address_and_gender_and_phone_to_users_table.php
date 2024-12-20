<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAddressAndGenderAndPhoneToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('address')->nullable()->after('email'); // Kolom 'address' ditambahkan setelah 'email'
            $table->string('gender')->nullable()->after('address'); // Kolom 'gender' ditambahkan setelah 'address'
            $table->string('phone')->nullable()->after('gender'); // Kolom 'gender' ditambahkan setelah 'address'
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['address', 'gender', 'phone']); // Hapus kedua kolom
        });
    }
}
