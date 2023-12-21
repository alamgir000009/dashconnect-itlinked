<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('target_sales', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->default(0);
            $table->date('date')->nullable();
            $table->decimal('target')->nullable();
            $table->integer('workspace')->nullable();
            $table->integer('create_by')->default(0);    
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
        Schema::dropIfExists('target_sales');
    }
};
