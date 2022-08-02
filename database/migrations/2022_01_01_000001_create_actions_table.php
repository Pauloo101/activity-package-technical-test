<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('actions', function(Blueprint $table) {
            $table->id();
            $table->unsignedInteger("user_id");
            $table->string("description");
            $table->string("ip_address");
            $table->string("model_performed_on_name");
            $table->unsignedInteger("model_performed_on_id");
            $table->string('summary')->nullable();
            // TODO: Create actions table

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('actions');
    }
};
