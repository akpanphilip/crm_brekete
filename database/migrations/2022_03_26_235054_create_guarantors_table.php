<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGuarantorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guarantors', function (Blueprint $table) {
            $table->id();
            $table->string('driver_id')->nullable();
            $table->string('title')->nullable();
            $table->string('last_name')->nullable();
            $table->string('first_name')->nullable();
            $table->string('dob')->nullable();
            $table->string('gender')->nullable();
            $table->string('religion')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('email')->nullable();
            $table->string('nin')->nullable();
            $table->string('state')->nullable();
            $table->string('city')->nullable();
            $table->string('residential_address')->nullable();
            $table->string('nigerian')->nullable();
            $table->string('ex_convict')->nullable();
            $table->string('company_name')->nullable();
            $table->string('official_phone_number')->nullable();
            $table->string('website')->nullable();
            $table->string('company_address')->nullable();
            $table->string('job_title')->nullable();
            $table->string('job_grade')->nullable();
            $table->string('relationship_to_applicant')->nullable();
            $table->string('contact_company')->nullable();
            $table->string('user_photo')->nullable();
            $table->string('guarantor_type')->nullable();
            $table->string('userType')->nullable();

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
        Schema::dropIfExists('guarantors');
    }
}
