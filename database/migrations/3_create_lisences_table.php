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
        Schema::create('lisences', function (Blueprint $table) {
            $table->id("id");
            $table->string('type_lisence');
            $table->text('description_lisence');
            $table->bigInteger("id_sector"); // id etranger
            $table->bigInteger("id_user"); // id etranger
            $table->foreign('id_sector') // reference id de l'autre table
                ->references('id') // reference a l'id du secteur 
                ->on('sectors'); // table 
            $table->foreign('id_user')
                ->references('id')
                ->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lisences');
    }
};
