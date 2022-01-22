<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('parent_id')->default(0);
            $table->string('title', 150);
            $table->string('keywords')->nullable();
            $table->string('description', 100000)->nullable();
            $table->integer('category_id');
            $table->string('image');
            $table->text('detail');
            $table->integer('user_id');
            $table->string('file');
            $table->string('slug', 100)->unique();
            $table->string('status', 5)->nullable()->default('false');
            $table->timestamp('updated_at')->useCurrent();
            $table->timestamp('created_at')->useCurrent();
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
