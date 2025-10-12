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
        Schema::table('orders', function (Blueprint $table) {
            $table->date('delivery_date')->nullable()->after('status');
            $table->string('delivery_time')->nullable()->after('delivery_date');
            $table->text('delivery_instructions')->nullable()->after('delivery_time');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn('delivery_date');
            $table->dropColumn('delivery_time');
            $table->dropColumn('delivery_instructions');
        });
    }
};
