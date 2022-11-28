<?php
use Illuminate\Database\QueryException;
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
        Schema::create('turma', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_school')->unsigned();
            $table->foreign('id_school')->references('id')->on('school')->onDelete('cascade');
            $table->string('status', 20);
            $table->string('turn', 20);
            $table->string('name_turm', 50);
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
        Schema::dropIfExists('turma');
    }
};
