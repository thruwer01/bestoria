<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {

        /* <offer id="ПВЛ-01-01-02-06-006">
        <name>Двухкомнатная квартира № 6</name>
        <price>32459551</price>
        <currencyId>RUR</currencyId>
        <categoryId>1</categoryId>
        <categoryId>12</categoryId>
        <picture>
        https://best-novostroy.ru//upload/plan/zhk_paveletskaya_sity/k1_s1_f2_r6.jpg
        </picture>
        <store>false</store>
        <pickup>false</pickup>
        <description>
        <![CDATA[
        Двухкомнатная квартира<br>Площадь: 61.23 м<sup>2</sup><br>Этаж: 2<br>Корпус: 1<br>Секция: 1<br>№ квартиры: 6
        ]]>
        </description>
        <param name="Корпус">1</param>
        <param name="Секция">1</param>
        <param name="Этаж">2</param>
        <param name="Номер квартиры">6</param>
        <param name="Номер на площадке">6</param>
        <param name="Площадь">61.23</param>
        <param name="Количество комнат">2</param>
        </offer> */

        Schema::create('flats', function (Blueprint $table) {
            $table->id();
            $table->string('name', 256);
            $table->integer('price');
            $table->string('picture_link', 500);
            $table->string('description', 5000);
            $table->integer('frame');
            $table->integer('section');
            $table->integer('floor');
            $table->integer('apart_number');
            $table->float('squere');
            $table->integer('rooms');
            $table->boolean('finishing');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('flats');
    }
};
