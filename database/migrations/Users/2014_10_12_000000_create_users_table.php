<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->string('name');
            $table->unsignedInteger('phone')->unique();
            $table->string('fingerprint', 20)->unique();
            $table->float('gender');
            $table->float('verfied');
            $table->boolean('trusted');
            $table->string('email')->unique();
            $table->string('image')->nullable();
            $table->string('password');
            $table->string('password_payments');
            $table->unsignedInteger('balance')->nullable();
            $table->integer('vf_code')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->text('mobile_token')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
            Schema::dropIfExists('users');
        Schema::enableForeignKeyConstraints();
    }
};
