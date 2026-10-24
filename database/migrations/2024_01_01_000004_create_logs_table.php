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
        Schema::create('logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('shift_id')->nullable()->constrained()->nullOnDelete();
            $table->dateTime('login_time');
            $table->dateTime('logout_time')->nullable();
            $table->enum('status', ['working', 'completed', 'auto_closed', 'overtime', 'pending_overtime'])->default('working');
            // new columns
            $table->dateTime('overtime_started_at')->null();
            $table->datetime('overtime_ended_at')->null();
            $table->string('overtime_reason', 500)->null();
            $table->unsignedInteger('worked_minutes')->null();
            $table->unsignedInteger('payable_cap_minutes')->null();
            $table->unsignedInteger('excess_minutes')->default(0);
            $table->enum('overtime_flag_status', [
                'none', 'pending_special_approval', 'approved', 'rejected',
            ])->default('none');
            $table->dateTime('flagged_at')->null();
            $table->foreignId('reviewed_by_user_id')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();
                $table->dateTime('reviewed_at')->null();
                $table->string('review_note',500)->null();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('logs');
    }
};
