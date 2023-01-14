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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            // $table->string('cover');
            $table->string('title');
            $table->string('author');
            $table->unsignedBigInteger('departmentID');
            $table->unsignedBigInteger('teacherID');
            $table->string('company');
            $table->string('year');
            $table->text('description');
            $table->string('file');
            $table->string('count')->nullable();
            $table->timestamps();

            $table->foreign('departmentID')->references('id')->on('departments')->onDelete('cascade');
            $table->foreign('teacherID')->references('id')->on('teachers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books');
    }
};
