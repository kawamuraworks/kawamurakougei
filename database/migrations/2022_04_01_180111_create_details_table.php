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
        Schema::create('details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->string('headline');
            $table->string('period');
            $table->string('cs_request');
            $table->text('lead');
            $table->string('location');
            $table->integer('type1');
            $table->integer('type2')->nullable();
            $table->integer('type3')->nullable();
            $table->integer('content_tag1');
            $table->integer('content_tag2')->nullable();
            $table->integer('content_tag3')->nullable();
            $table->integer('priority')->nullable();
            $table->integer('is_detail_deleted');
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
        Schema::dropIfExists('details');
    }
};
