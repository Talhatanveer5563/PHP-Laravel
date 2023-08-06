<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooktblsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booktbls', function (Blueprint $table) {
            $table->id();
            $table->string("bookimage");
            $table->string("bookname");
            $table->string("bookcategory");
            $table->foreign("bookcategory")->on("id")->references("categorytbl");
            $table->string("bookauthor");
            $table->foreign("bookauthor")->on("id")->references("authortbl");
            $table->integer("bookprice");
            $table->date('bookdate')->default(date('y/m/d'));
            $table->string("bookpdf");
           
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
        Schema::dropIfExists('booktbls');
    }
}
