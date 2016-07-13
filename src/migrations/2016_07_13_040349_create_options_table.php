<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOptionsTable extends Migration {
    public function up() {
        Schema::create('options', function(Blueprint $table) {
            $table->bigIncrements('id')->comment = '主键';
            $table->string('option_name',181)->unique()->comment = '名称';
            $table->string('option_group',181)->comment = '分组';
            $table->longText('option_value')->comment = '值';
            $table->boolean('autoload')->default('false')->comment = '是否自动加载';
            $table->timestamps();
            $table->comment = '站点Options';
        });
    }

    public function down() {
        Schema::drop('options');
    }
}