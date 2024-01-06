<?php

use Illuminate\Support\Facades\Schema;
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
        Schema::table('saturation_deductions', function (Blueprint $table) {
            $table->json('deduction_ranges')->nullable();
            \DB::statement('ALTER TABLE saturation_deductions MODIFY amount NULL');
        });
    }
    
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('saturation_deductions', function (Blueprint $table) {
            $table->dropColumn('deduction_ranges');
            \DB::statement('ALTER TABLE saturation_deductions MODIFY amount NOT NULL');
        });
    }
};
