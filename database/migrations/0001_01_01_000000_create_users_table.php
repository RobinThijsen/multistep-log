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
        Schema::create('plan_recurrences', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('plans', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('monthly_price');
            $table->integer('yearly_price');
            $table->timestamps();
        });

        Schema::create('plan_addons', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description');
            $table->integer('monthly_price');
            $table->integer('yearly_price');
            $table->timestamps();
        });

        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->foreignId('plan_id')->nullable();
            $table->foreignId('plan_recurrence_id')->nullable();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone')->nullable();
            $table->string('password');
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->timestamp('plan_started_at');
            $table->timestamp('plan_ended_at');

            $table->foreign('plan_id')->references('id')->on('plans')->onUpdate('cascade')->onDelete('set null');
            $table->foreign('plan_recurrence_id')->references('id')->on('plan_recurrences')->onUpdate('cascade')->onDelete('set null');
        });

        Schema::create('plan_addon_user', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('plan_addon_id');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('plan_addon_id')->references('id')->on('plan_addons')->onUpdate('cascade')->onDelete('cascade');

            $table->unique(['user_id', 'plan_addon_id'], 'plan_addon_user_unique');
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plan_addon_user');
        Schema::dropIfExists('users');
        Schema::dropIfExists('plan_addons');
        Schema::dropIfExists('plans');
        Schema::dropIfExists('plan_recurrences');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
