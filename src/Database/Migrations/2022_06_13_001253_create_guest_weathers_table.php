<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Query\Expression;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guest_weathers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('guest_id')
                    ->constrained('guests')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
            $table->date('datetime');
            $table->json('weather')->default(new Expression('(JSON_ARRAY())'))->nullable();
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
        Schema::dropIfExists('weathers');
    }
};
