<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
			$table->text('parcel_description');
			$table->string('pickup_address');
			$table->string('drop_address');
            $table->timestamp('pickup_time')->nullable();
            $table->timestamp('drop_time')->nullable();
            $table->enum("status", ['Pending', 'Pickedup', 'Delivered', 'Cancelled'])->default('Pending');
            $table->foreignId("user_id")->constrained("users")->references("id")->onDelete('cascade');
            $table->bigInteger("biker_id")->nullable();
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
        Schema::dropIfExists('orders');
    }
};
