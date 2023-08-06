<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShoppingcarttblsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shoppingcarttbls', function (Blueprint $table) {
            $table->id();
            $table->integer("bookid");
            $table->foreign("bookid")->on("id")->references("booktbl");
            $table->integer("userid");
            $table->foreign("userid")->on("id")->references("User");   
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
        Schema::dropIfExists('shoppingcarttbls');
    }
}
