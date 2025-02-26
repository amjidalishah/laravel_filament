<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('qrs', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('title');
            $table->string('origin_domain')->unique();
            $table->string('target_domain');
            $table->boolean('status')->default(true);
            $table->timestamps();
        });
    }
};