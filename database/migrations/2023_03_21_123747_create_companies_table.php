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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('company_name')->default('Amret PLC');
            $table->string('company_address')->default('Boueng Kak, Toul Kok, Phnom Penh');
            $table->string('company_phone')->default('023 999 033');
            $table->string('company_email')->default('info@amret.com.kh');
            $table->string('company_fax')->default('023 999 033');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
