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
        if (Schema::hasTable('donations')) {
            Schema::table('donations', function (Blueprint $table) {
                if (!Schema::hasColumn('donations', 'donor_email')) {
                    $table->string('donor_email')->nullable()->after('donor_name');
                }
                if (!Schema::hasColumn('donations', 'payment_gateway')) {
                    $table->string('payment_gateway')->nullable()->after('payment_method_id');
                }
                if (!Schema::hasColumn('donations', 'gateway_transaction_id')) {
                    $table->string('gateway_transaction_id')->nullable()->after('transaction_id');
                }
                if (!Schema::hasColumn('donations', 'verification_notes')) {
                    $table->text('verification_notes')->nullable()->after('status');
                }
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasTable('donations')) {
            Schema::table('donations', function (Blueprint $table) {
                $table->dropColumn(['donor_email', 'payment_gateway', 'gateway_transaction_id', 'verification_notes']);
            });
        }
    }
};