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
        Schema::table('users', function (Blueprint $table) {
            //U can use after or before in the table to place your field
            //We add the nullable field coz we don't the existing data doesn't know about 
            //the comming filed so it will the field null
            //And it will not add any error in the migration field
            $table->string("Image")->after("email")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('Image');
        });
    }
};
