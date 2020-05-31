<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ar_name')->nullable();
            $table->string('ar_slug')->index();
            $table->string('ar_description')->nullable();
            $table->longText('ar_content')->nullable();
            $table->string('ar_avatar')->nullable();
            $table->integer('ar_author_id')->default(0)->index();
            $table->tinyInteger('ar_status')->default(1)->index();
            $table->string('ar_hot')->default(0);
            $table->string('ar_title_seo')->nullable();
            $table->string('ar_description_seo')->nullable();
            $table->string('ar_keyword_seo')->nullable();
            $table->timestamps();;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles');
    }
}
