<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (! Schema::hasTable('messages')) {
            return;
        }

        Schema::table('messages', function (Blueprint $table) {
            if (! Schema::hasColumn('messages', 'is_read')) {
                $table->boolean('is_read')->default(false)->after('message');
            }
            if (! Schema::hasColumn('messages', 'reply_subject')) {
                $table->string('reply_subject')->nullable()->after('is_read');
            }
            if (! Schema::hasColumn('messages', 'reply_message')) {
                $table->text('reply_message')->nullable()->after('reply_subject');
            }
            if (! Schema::hasColumn('messages', 'replied_at')) {
                $table->timestamp('replied_at')->nullable()->after('reply_message');
            }
            if (! Schema::hasColumn('messages', 'replied_by')) {
                $table->unsignedBigInteger('replied_by')->nullable()->after('replied_at');
            }

            $table->index('is_read');
        });
    }

    public function down(): void
    {
        if (! Schema::hasTable('messages')) {
            return;
        }

        Schema::table('messages', function (Blueprint $table) {
            if (Schema::hasColumn('messages', 'replied_by')) {
                $table->dropColumn('replied_by');
            }
            if (Schema::hasColumn('messages', 'replied_at')) {
                $table->dropColumn('replied_at');
            }
            if (Schema::hasColumn('messages', 'reply_message')) {
                $table->dropColumn('reply_message');
            }
            if (Schema::hasColumn('messages', 'reply_subject')) {
                $table->dropColumn('reply_subject');
            }
            if (Schema::hasColumn('messages', 'is_read')) {
                $table->dropColumn('is_read');
            }
        });
    }
};
