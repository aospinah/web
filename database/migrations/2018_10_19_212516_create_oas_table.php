<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('oas', function (Blueprint $table) {
            $table->increments('oa_id');
            $table->string('oa_title');
            $table->string('oa_path');
            $table->text('oa_description');
            $table->unsignedInteger('oa_user_id');
            $table->unsignedInteger('oa_tax_id');
            $table->unsignedInteger('oa_top_id');
            $table->unsignedInteger('oa_tar_id');
            $table->timestamp('oa_created_at')->nullable();
            $table->timestamp('oa_updated_at')->nullable();

            $table->foreign('oa_user_id')->references('user_id')->on('users');
            $table->foreign('oa_tax_id')->references('tax_id')->on('taxonomies');
            $table->foreign('oa_tar_id')->references('tar_id')->on('targets');
            // $table->timestamps();4
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('oas');
    }
}
