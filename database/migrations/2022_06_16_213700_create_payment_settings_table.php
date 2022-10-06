<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_settings', function (Blueprint $table) {
            $table->id();
			$table->tinyInteger('live_mode')->default('0');
			$table->text('test_secret_key')->nullable(false);
			$table->text('test_publishable_key')->nullable(false);
			$table->text('live_secret_key')->nullable(false);
			$table->text('live_publishable_key')->nullable(false);
			$table->text('test_key')->nullable(false);
			$table->text('live_key')->nullable(false);
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
        Schema::dropIfExists('payment_settings');
    }
}