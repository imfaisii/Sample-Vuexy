<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateUserAttributesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_attributes', function (Blueprint $table) {
            $table->id();
            $table->text('image',40)->default('AMS_Default.png');
            $table->text('user_type')->nullable();
            $table->biginteger("user_id")->unsigned();
            $table->foreign("user_id")->references("id")->on("users")->onDelete('cascade');
            $table->softDeletes();
            $table->timestamps();
        });
        $userattr = array(
            array( 'user_type' => 'Super_Admin', 'user_id' => '1'),

        );
        DB::table('user_attributes')->insert($userattr);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_attributes');
    }
}
