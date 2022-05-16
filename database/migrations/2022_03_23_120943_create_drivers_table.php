<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDriversTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drivers', function (Blueprint $table) {
            $table->id();
            $table->string('last_name')->nullable();
            $table->string('first_name')->nullable();
            $table->string('dob')->nullable();
            $table->string('gender')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->unique();
            $table->string('nin')->nullable();
            $table->string('state')->nullable();
            $table->string('city')->nullable();
            $table->string('residential_address')->nullable();
            $table->string('address')->nullable();
            $table->string('nigerian')->nullable();
            $table->string('ex-convict')->nullable();
            // primary school
            $table->string('primary_school')->nullable();
            $table->string('primary_school_address')->nullable();
            $table->string('graduated_primary')->nullable();
            $table->string('qualification_type_primary')->nullable();
            // secondary school
            $table->string('secondary_school')->nullable();
            $table->string('secondary_school_address')->nullable();
            $table->string('graduated_secondary')->nullable();
            $table->string('qualification_type_secondary')->nullable();
            // tertiary school
            $table->string('tertiary_school')->nullable();
            $table->string('tertiary_school_address')->nullable();
            $table->string('graduated_tertiary_school')->nullable();
            $table->string('qualification_type_tertiary')->nullable();
            // relative data
            $table->string('relationship')->nullable();
            $table->string('relative_last_name')->nullable();
            $table->string('relative_first_name')->nullable();
            $table->string('relative_date_of_birth')->nullable();
            $table->string('relative_gender')->nullable();
            $table->string('relative_phone')->nullable();
            $table->string('relative_email')->nullable();
            $table->string('relative_nin')->nullable();
            $table->string('relative_state')->nullable();
            $table->string('relative_city')->nullable();
            $table->string('relative_residential_address')->nullable();
            $table->string('relative_citizenship')->nullable();
            $table->string('relative_ex_convict')->nullable();
            // driver work experience
            $table->string('driver_company')->nullable();
            $table->string('driver_company_official_phone_number')->nullable();
            $table->string('driver_company_website')->nullable();
            $table->string('driver_company_supervisor')->nullable();
            $table->string('driver_company_supervisor_phone')->nullable();
            $table->string('driver_job_title')->nullable();
            $table->string('driver_work_lenght')->nullable();
            $table->string('driver_reason_for_leaving')->nullable();
            $table->string('contact_company_for_reference')->nullable();
            // driver bank details
            $table->string('driver_bank_name')->nullable();
            $table->string('driver_account_number')->nullable();
            $table->string('driver_account_name')->nullable();
            $table->string('driver_bvn')->nullable();
            // photo
            $table->string('driver_photo')->nullable();

            //
            $table->string('driver_id')->nullable();
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
        Schema::dropIfExists('drivers');
    }
}
