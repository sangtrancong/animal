<?php

use App\Models\Category;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('account', function (Blueprint $table) {
            $table->id();
            $table->string('username');
            $table->string('password');
            $table->boolean('status');
            $table->timestamps();
        });
        Schema::create('category', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->longText('description')->nullable();
            $table->timestamps();
        });
        Schema::create('product', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code');
            $table->string('name');
            $table->string('image',500);
            $table->string('url',500);
            $table->boolean('status');
            $table->foreignIdFor(Category::class);
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('category');
        });
        Schema::create('port', function (Blueprint $table) {
            $table->increments('id');
            $table->longText('title');
            $table->longText('short_content');
            $table->longText('content');
            $table->longText('video_url')->nullable();
            $table->longText('image');
            $table->longText('slug');
            $table->boolean('status');
            $table->foreignIdFor(Category::class);
            $table->timestamps();
            $table->foreign('category_id')->references('id')->on('category');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('category');
    }
}
