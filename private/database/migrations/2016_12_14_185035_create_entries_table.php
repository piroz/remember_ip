<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEntriesTable extends Migration
{
    const TABLE_NAME = 'entries';
    const INDEX_NAME = 'index_entries_address';
    
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(self::TABLE_NAME, function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('address');
        });
        
        Schema::table(self::TABLE_NAME, function($table) {
            $table->index('address');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table(self::TABLE_NAME, function($table) {
            $table->dropIndex(['address']);
        });
        Schema::dropIfExists(self::TABLE_NAME);
    }
}
