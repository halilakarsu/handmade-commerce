<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCheckoutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('checkouts', function (Blueprint $table) {
            $table->id(); // Otomatik artan birincil anahtar
            $table->string('order_name'); // Ad
            $table->string('order_lastname'); // Soyad
            $table->string('order_email')->unique(); // E-posta (unique)
            $table->string('order_phone'); // Telefon numarası
            $table->string('order_il'); // İl
            $table->string('order_ilce'); // İlçe
            $table->text('order_adres'); // Açık adres
            $table->string('order_cargo'); // Kargo
            $table->string('order_type'); // Ödeme tipi
            $table->timestamps(); // created_at ve updated_at tarihleri
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('checkouts');
    }
}
