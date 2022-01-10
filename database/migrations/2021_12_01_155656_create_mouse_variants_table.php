<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMouseVariantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mouse_variants', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('mouse_id');
            $table->foreign('mouse_id')->references('id')->on('mice')->onDelete('cascade');
            $table->integer('stock');
            $table->string('color');
            $table->integer('price');
            $table->boolean('is_active')->default(true);
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
        Schema::dropIfExists('mouse_variants');
    }
}
