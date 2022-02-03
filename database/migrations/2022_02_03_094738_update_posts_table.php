<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            // creazione della colonna della foreign key
            $table->unsignedBigInteger('category_id')->nullable()->after('id');

            // crezione constraint
            $table->foreign('category_id')
                    ->references('id')
                    ->on('categories')
                    ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            // distruggio la foreign key in posts chiamata category_id ceh rappresenta una foreign
            $table->dropForeignKey('posts_category_id_foreign');
            // distruggo la colonna
            $table->dropColumn('category_id');
        });
    }
}
