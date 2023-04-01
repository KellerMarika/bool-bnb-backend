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
        Schema::create('apartments', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
                ->references('id')
                ->on('users');

            $table->string('title');
            $table->string('address');
            $table->float('latitude', 7, 5);
            $table->float('longitude', 7, 5);
            $table->string('cover_img')->nullable();
            $table->text('description')->nullable();
            $table->tinyInteger('rooms_qty');
            $table->tinyInteger('beds_qty');
            $table->tinyInteger('bathrooms_qty');
            $table->integer('mq')->nullable();
            $table->decimal('daily_price');
            $table->boolean('visible')->default(true);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('apartments');
    }
};
