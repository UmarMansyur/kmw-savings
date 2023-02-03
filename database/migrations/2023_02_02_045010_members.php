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
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();
            $table->foreignId('saving_category_id')->constrained('saving_categories')->onDelete('cascade')->onUpdate('cascade');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('name');
            $table->string('address');
            $table->enum('gender', ['male', 'female']);
            $table->string('phone')->nullable();
            $table->string('thumbnail')->nullable();
            $table->string('file')->nullable();
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
        Schema::dropIfExists('members');
    }
};
