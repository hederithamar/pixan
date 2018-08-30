<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateVoluntariesTable.
 */
class CreateVoluntariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('voluntaries', function (Blueprint $table) {
            $table->increments('id');
            $table->uuid('uuid');
            $table->integer('user_id')->nullable()->unsigned();
            $table->string('celular')->nullable();
            $table->string('sexo')->nullable();
            $table->string('facebook')->nullable();
            $table->string('escolaridad')->nullable();
            $table->string('carrera')->nullable();
            $table->string('habilidad')->nullable();
            $table->string('razon')->nullable();
            $table->tinyInteger('active')->default(1)->unsigned();
            $table->string('status')->nullable();
            $table->dateTime('fecha')->nullable();
            $table->dateTime('date_start')->nullable();
            $table->dateTime('date_end')->nullable();
            $table->dateTime('date_start_geo')->nullable();
            $table->dateTime('date_end_geo')->nullable();
            $table->timestamps();
            $table->softDeletes();

            /**
             * Add Foreign/Unique/Index
             */
            $table->foreign('user_id')
                ->references('id')
                ->on(config('access.table_names.users'))
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('voluntaries');
    }
}
