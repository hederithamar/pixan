<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateServicesTable.
 */
class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->increments('id');
            $table->uuid('uuid');
            $table->integer('user_id')->nullable()->unsigned();
            $table->string('name')->nullable();
            $table->string('description')->nullable();
            $table->string('service')->nullable();
            $table->string('persons')->nullable();
            $table->string('material')->nullable();
            $table->string('category')->nullable();
            $table->string('genero')->nullable();
            $table->string('image_type')->default('gravatar');
            $table->string('image_location')->nullable();
            $table->tinyInteger('active')->default(1)->unsigned();
            $table->string('status')->nullable();
            $table->string('direccion')->nullable();
            $table->float('lat', 255, 14)->nullable();
            $table->float('lng', 255, 14)->nullable();
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
        Schema::dropIfExists('services');
    }
}
