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
        Schema::create('spam', function (Blueprint $table) {
            $table->id();
            $table->string('source');
            $table->string('state');
            $table->string('report_type');
            $table->string('report_id');
            $table->string('user_id');
            $table->string('referenceResourceType');
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
        Schema::dropIfExists('spam');
    }
};