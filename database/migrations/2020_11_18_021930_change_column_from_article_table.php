<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeColumnFromArticleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('article', function (Blueprint $table) {
            $table->string('category',45)->default('General')->change();
            $table->renameColumn('desc', 'description');
            $table->renameColumn('foto', 'picture');
            $table->dropForeign('article_id_plant_foreign');
            $table->dropColumn('id_plant');
            $table->string('author')->default('Admin');
        });
    }

    /** Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('article', function (Blueprint $table) {
            $table->char('category',45)->change();
            $table->renameColumn('description', 'desc');
            $table->renameColumn('picture', 'foto');
            $table->uuid('id_plant');
            $table->foreign('id_plant')->references('id')->on('plant');
            $table->dropColumn('author');
        });
    }
}
