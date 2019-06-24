<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->increments('id');
			$table->text('title_ar',1000);
			$table->text('title_en',1000)->nullable();
			$table->text('description_ar',5000);
			$table->text('description_en',5000)->nullable();
			$table->text('link',1000)->nullable();
			$table->text('main_image',1000);
			$table->softDeletes();
            $table->index(['deleted_at']);
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
        Schema::dropIfExists('projects');
    }
}
