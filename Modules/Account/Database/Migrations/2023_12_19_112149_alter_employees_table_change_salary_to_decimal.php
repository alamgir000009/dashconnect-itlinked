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
        if (Schema::hasTable('employees')) {
            Schema::table('employees', function (Blueprint $table) {
                // $table->decimal('salary')->change();
                \DB::statement('ALTER TABLE employees MODIFY salary DECIMAL(10, 2)');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasTable('employees')) {
            Schema::table('employees', function (Blueprint $table) {
                // $table->integer('salary')->change();
                \DB::statement('ALTER TABLE employees MODIFY salary INTEGER');
            });
        }
    }
};
