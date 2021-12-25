<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class CreateBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table, Request $request) {
            $table->increments('id');
            $table->integer('parent_id')->default(0);
            $table->string('title', 150);
            $table->string('keywords')->nullable();
            $table->string('description')->nullable();
            $table->integer('category_id');
            $table->text('detail');
            $table->integer('user_id');
            $table->string('file');
            $table->string('slug', 100)->nullable();
            $table->string('status', 5)->nullable();
            $table->timestamps();
            $table->image = Storage::putFile('images', $request->file('image'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blogs');
    }
}
