<template>
  <div>
    <div class="upBox">
      <img :src="'../img/brekete_logo.png'" alt="" />
    </div>
    <div class="main">
      <Sidebar class="sidebar_section" />
      <main class="main_section">
        <div class="container-fluid">
          <div class="topInfo stay_fixed d-flex align-items-center">
            <router-link
              to="/driver-capturing"
              class="tab_btn font-weight-bold driverBtn"
            >
              DRIVER CAPTURING
            </router-link>
            <router-link
              to="/guarantor1-capture"
              class="tab_btn2 font-weight-bold guarantor1Btn"
            >
              GUARANTOR 1 CAPTURING
            </router-link>
            <router-link
              to="/guarantor2-capture"
              class="tab_btn3 font-weight-bold guarantor2Btn"
            >
              GUARANTOR 2 CAPTURING
            </router-link>
          </div>
          <div class="downInfo">
            <div class="row">
              <div class="col-sm-6 col-md-12">
                <ul class="step_link">
                  <li class="first_step clr" @click="step1">
                    <div class="step first_count active_step">
                      <Icon size="20" type="ios-person-outline" />
                    </div>
                    <span>Basic User Data</span>
                  </li>
                  <li class="second_step" @click="step2">
                    <div class="step second_count">
                      <Icon size="20" type="md-book" />
                    </div>
                    <span>Education Data</span>
                  </li>
                  <li class="third_step" @click="step3">
                    <div class="step third_count">
                      <Icon size="20" type="md-people" />
                    </div>
                    <span>User Relative Data</span>
                  </li>
                  <li class="forth_step" @click="step4">
                    <div class="step forth_count">
                      <Icon size="20" type="ios-briefcase-outline" />
                    </div>
                    <span>User Work Experience</span>
                  </li>
                  <li class="five_step" @click="step5">
                    <div class="step five_count">
                      <Icon size="20" type="ios-card" />
                    </div>
                    <span>User Bank Details</span>
                  </li>
                  <li class="six_step" @click="step6">
                    <div class="step six_count">
                      <Icon size="20" type="ios-camera-outline" />
                    </div>
                    <span>Data Upload</span>
                  </li>
                </ul>
                <div class="stepForms">
                  <div class="formBox" v-show="basic_user_data">
                    <div class="form-group mb-4">
                      <label>
                        LAST NAME
                        <span class="text-danger">*</span>
                      </label>
                      <input
                        type="text"
                        class="form-control"
                        name="last_name"
                        v-model="driver.last_name"
                      />
                      <small
                        class="text-danger"
                        v-if="errors && errors.last_name"
                      >
                        {{ errors.last_name[0] }}
                      </small>
                    </div>
                    <div class="form-group mb-4">
                      <label>
                        FIRST NAME
                        <span class="text-danger">*</span>
                      </label>
                      <input
                        type="text"
                        class="form-control"
                        name="first_name"
                        v-model="driver.first_name"
                      />
                      <small
                        class="text-danger"
                        v-if="errors && errors.first_name"
                      >
                        {{ errors.first_name[0] }}
                      </small>
                    </div>
                    <div class="form-group mb-4">
                      <label>
                        DATE OF BIRTH
                        <span class="text-danger">*</span>
                      </label>
                      <input
                        type="date"
                        class="form-control"
                        v-model="driver.date_of_birth"
                      />
                      <small
                        class="text-danger"
                        v-if="errors && errors.date_of_birth"
                      >
                        {{ errors.date_of_birth[0] }}
                      </small>
                    </div>
                    <div class="form-group mb-4">
                      <label>
                        GENDER
                        <span class="text-danger">*</span>
                      </label>
                      <select
                        name="gender"
                        class="form-select"
                        v-model="driver.gender"
                      >
                        <option value="">--Please Select--</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Other">Other</option>
                      </select>
                      <small class="text-danger" v-if="errors && errors.gender">
                        {{ errors.gender[0] }}
                      </small>
                    </div>
                    <div class="form-group mb-4">
                      <label>
                        PHONE NUMBER
                        <span class="text-danger">*</span>
                      </label>
                      <input
                        type="text"
                        class="form-control"
                        v-model="driver.phone"
                      />
                      <small class="text-danger" v-if="errors && errors.phone">
                        {{ errors.phone[0] }}
                      </small>
                    </div>
                    <div class="form-group mb-4">
                      <label>
                        EMAIL ADDRESS
                        <span class="text-danger">*</span>
                      </label>
                      <input
                        type="email"
                        name="email"
                        class="form-control"
                        v-model="driver.email"
                      />
                      <small class="text-danger" v-if="errors && errors.email">
                        {{ errors.email[0] }}
                      </small>
                    </div>
                    <div class="form-group mb-4">
                      <label>
                        NATIONAL IDENTITY NUMBER
                        <span class="text-danger">*</span>
                      </label>
                      <input
                        type="text"
                        name="nin"
                        class="form-control"
                        v-model="driver.nin"
                      />
                      <small class="text-danger" v-if="errors && errors.nin">
                        {{ errors.nin[0] }}
                      </small>
                    </div>
                    <div class="form-group mb-4">
                      <label>
                        STATE OF ORIGIN
                        <span class="text-danger">*</span>
                      </label>
                      <select class="form-select" v-model="driver.state">
                        <option value="">--Please select--</option>
                        <option
                          v-for="(state, i) in states"
                          :key="i"
                          :value="state.name"
                        >
                          {{ state.name }}
                        </option>
                      </select>
                      <small class="text-danger" v-if="errors && errors.state">
                        {{ errors.state[0] }}
                      </small>
                    </div>
                    <div class="form-group mb-4">
                      <label>
                        CITY OF RESIDENCE
                        <span class="text-danger">*</span>
                      </label>
                      <input
                        type="text"
                        class="form-control"
                        v-model="driver.city"
                      />
                      <small class="text-danger" v-if="errors && errors.city">
                        {{ errors.city[0] }}
                      </small>
                    </div>
                    <div class="form-group mb-4">
                      <label>
                        RESIDENTIAL ADDRESS
                        <span class="text-danger">*</span>
                      </label>
                      <input
                        type="text"
                        class="form-control"
                        v-model="driver.residential_address"
                      />
                      <small
                        class="text-danger"
                        v-if="errors && errors.residential_address"
                      >
                        {{ errors.residential_address[0] }}
                      </small>
                    </div>
                    <div class="form-group mb-4">
                      <label>
                        ARE YOU A NIGERIAN CITIZEN?
                        <span class="text-danger">*</span>
                      </label>
                      <select class="form-select" v-model="driver.citizenship">
                        <option value="">--Please Select--</option>
                        <option value="YES">YES</option>
                        <option value="NO">NO</option>
                      </select>
                      <small
                        class="text-danger"
                        v-if="errors && errors.citizenship"
                      >
                        {{ errors.citizenship[0] }}
                      </small>
                    </div>
                    <div class="form-group mb-4">
                      <label>
                        ARE YOU AN EX-CONVICT?
                        <span class="text-danger">*</span>
                      </label>
                      <select class="form-select" v-model="driver.ex_convict">
                        <option value="">--Please Select--</option>
                        <option value="YES">YES</option>
                        <option value="NO">NO</option>
                      </select>
                      <small
                        class="text-danger"
                        v-if="errors && errors.ex_convict"
                      >
                        {{ errors.ex_convict[0] }}
                      </small>
                    </div>
                    <div class="row">
                      <div class="col-sm-6 col-md-8">
                        <button class="btn btn-primary" @click="driver_data">
                          Save & Proceed
                        </button>
                      </div>
                    </div>
                  </div>
                  <div class="formBox" v-show="basic_education_data">
                    <div class="form-group mb-4">
                      <label>
                        PRIMARY SCHOOL:
                        <span class="text-danger">*</span>
                      </label>
                      <input
                        type="text"
                        class="form-control"
                        v-model="driverEducation.primary_school_name"
                      />
                      <small
                        class="text-danger"
                        v-if="errors && errors.primary_school_name"
                      >
                        {{ errors.primary_school_name[0] }}
                      </small>
                    </div>
                    <div class="form-group mb-4">
                      <label>
                        PRIMARY SCHOOL ADDRESS:
                        <span class="text-danger">*</span>
                      </label>
                      <input
                        type="text"
                        class="form-control"
                        v-model="driverEducation.primary_school_address"
                      />
                      <small
                        class="text-danger"
                        v-if="errors && errors.primary_school_address"
                      >
                        {{ errors.primary_school_address[0] }}
                      </small>
                    </div>
                    <div class="form-group mb-4">
                      <label>
                        DID YOU GRADUATE
                        <span class="text-danger">*</span>
                      </label>
                      <select
                        class="form-select"
                        v-model="driverEducation.graduate_primary"
                      >
                        <option value="">--Please Select--</option>
                        <option value="YES">YES</option>
                        <option value="NO">NO</option>
                      </select>
                      <small
                        class="text-danger"
                        v-if="errors && errors.graduate_primary"
                      >
                        {{ errors.graduate_primary[0] }}
                      </small>
                    </div>
                    <div class="form-group mb-4">
                      <label>
                        QUALIFICATION TYPE
                        <span class="text-danger">*</span>
                      </label>
                      <input
                        type="text"
                        class="form-control"
                        v-model="driverEducation.primary_qualification_type"
                      />
                      <small
                        class="text-danger"
                        v-if="errors && errors.primary_qualification_type"
                      >
                        {{ errors.primary_qualification_type[0] }}
                      </small>
                    </div>
                    <div class="form-group mb-4">
                      <label>
                        SECONDARY SCHOOL:
                        <span class="text-danger">*</span>
                      </label>
                      <input
                        type="text"
                        class="form-control"
                        v-model="driverEducation.secondary_school_name"
                      />
                      <small
                        class="text-danger"
                        v-if="errors && errors.secondary_school_name"
                      >
                        {{ errors.secondary_school_name[0] }}
                      </small>
                    </div>
                    <div class="form-group mb-4">
                      <label>
                        SECONDARY SCHOOL ADDRESS
                        <span class="text-danger">*</span>
                      </label>
                      <input
                        type="text"
                        name=""
                        class="form-control"
                        v-model="driverEducation.secondary_school_address"
                      />
                      <small
                        class="text-danger"
                        v-if="errors && errors.secondary_school_address"
                      >
                        {{ errors.secondary_school_address[0] }}
                      </small>
                    </div>
                    <div class="form-group mb-4">
                      <label>
                        DID YOU GRADUATE
                        <span class="text-danger">*</span>
                      </label>
                      <select
                        class="form-select"
                        v-model="driverEducation.graduate_secondary"
                      >
                        <option value="">--Please Select--</option>
                        <option value="YES">YES</option>
                        <option value="NO">NO</option>
                      </select>
                      <small
                        class="text-danger"
                        v-if="errors && errors.graduate_secondary"
                      >
                        {{ errors.graduate_secondary[0] }}
                      </small>
                    </div>
                    <div class="form-group mb-4">
                      <label>
                        QUALIFICATION TYPE
                        <span class="text-danger">*</span>
                      </label>
                      <input
                        type="text"
                        class="form-control"
                        v-model="driverEducation.secondary_qualification_type"
                      />
                      <small
                        class="text-danger"
                        v-if="errors && errors.secondary_qualification_type"
                      >
                        {{ errors.secondary_qualification_type[0] }}
                      </small>
                    </div>
                    <div class="form-group mb-4">
                      <label>
                        TERTIARY SCHOOL:
                        <span class="text-danger">*</span>
                      </label>
                      <input
                        type="text"
                        class="form-control"
                        v-model="driverEducation.tertiary_school_name"
                      />
                      <small
                        class="text-danger"
                        v-if="errors && errors.tertiary_school_name"
                      >
                        {{ errors.tertiary_school_name[0] }}
                      </small>
                    </div>
                    <div class="form-group mb-4">
                      <label>
                        TERTIARY SCHOOL ADDRESS:
                        <span class="text-danger">*</span>
                      </label>
                      <input
                        type="text"
                        class="form-control"
                        v-model="driverEducation.tertiary_school_address"
                      />
                      <small
                        class="text-danger"
                        v-if="errors && errors.tertiary_school_address"
                      >
                        {{ errors.tertiary_school_address[0] }}
                      </small>
                    </div>
                    <div class="form-group mb-4">
                      <label>
                        DID YOU GRADUATE:
                        <span class="text-danger">*</span>
                      </label>
                      <select
                        class="form-select"
                        v-model="driverEducation.graduate_tertiary"
                      >
                        <option value="">--Please Select--</option>
                        <option value="YES">YES</option>
                        <option value="NO">NO</option>
                      </select>
                      <small
                        class="text-danger"
                        v-if="errors && errors.graduate_tertiary"
                      >
                        {{ errors.graduate_tertiary[0] }}
                      </small>
                    </div>
                    <div class="form-group mb-4">
                      <label>
                        QUALIFICATION TYPE
                        <span class="text-danger">*</span>
                      </label>
                      <input
                        type="text"
                        class="form-control"
                        v-model="driverEducation.tertiary_qualification_type"
                      />
                      <small
                        class="text-danger"
                        v-if="errors && errors.tertiary_qualification_type"
                      >
                        {{ errors.tertiary_qualification_type[0] }}
                      </small>
                    </div>
                    <div class="row">
                      <div class="col-sm-6 col-md-8">
                        <button
                          class="btn btn-primary"
                          @click="driver_education_data"
                        >
                          Save & Proceed
                        </button>
                      </div>
                    </div>
                  </div>
                  <div class="formBox" v-show="user_relative_data">
                    <div class="form-group mb-4">
                      <label>
                        RELATIONSHIP
                        <span class="text-danger">*</span>
                      </label>
                      <select
                        name="relationship"
                        v-model="driverRelation.relationship"
                        class="form-control"
                      >
                        <option value="">--Please Select--</option>
                        <option value="Father">Father</option>
                        <option value="Mother">Mother</option>
                        <option value="Friend">Friend</option>
                        <option value="Cousin">Cousin</option>
                        <option value="Colleague">Colleague</option>
                        <option value="Others">Others</option>
                      </select>
                      <small
                        class="text-danger"
                        v-if="errors && errors.relationship"
                      >
                        {{ errors.relationship[0] }}
                      </small>
                    </div>
                    <div class="form-group mb-4">
                      <label>
                        LAST NAME
                        <span class="text-danger">*</span>
                      </label>
                      <input
                        type="text"
                        class="form-control"
                        name="relative_last_name"
                        v-model="driverRelation.relative_last_name"
                      />
                      <small
                        class="text-danger"
                        v-if="errors && errors.relative_last_name"
                      >
                        {{ errors.relative_last_name[0] }}
                      </small>
                    </div>
                    <div class="form-group mb-4">
                      <label>
                        FIRST NAME
                        <span class="text-danger">*</span>
                      </label>
                      <input
                        type="text"
                        class="form-control"
                        name="relative_first_name"
                        v-model="driverRelation.relative_first_name"
                      />
                      <small
                        class="text-danger"
                        v-if="errors && errors.relative_first_name"
                      >
                        {{ errors.relative_first_name[0] }}
                      </small>
                    </div>
                    <div class="form-group mb-4">
                      <label>
                        DATE OF BIRTH
                        <span class="text-danger">*</span>
                      </label>
                      <input
                        type="date"
                        class="form-control"
                        v-model="driverRelation.relative_date_of_birth"
                      />
                      <small
                        class="text-danger"
                        v-if="errors && errors.relative_date_of_birth"
                      >
                        {{ errors.relative_date_of_birth[0] }}
                      </small>
                    </div>
                    <div class="form-group mb-4">
                      <label>
                        GENDER
                        <span class="text-danger">*</span>
                      </label>
                      <select
                        name="gender"
                        class="form-control"
                        v-model="driverRelation.relative_gender"
                      >
                        <option value="">--Please Select--</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Other">Other</option>
                      </select>
                      <small
                        class="text-danger"
                        v-if="errors && errors.relative_gender"
                      >
                        {{ errors.relative_gender[0] }}
                      </small>
                    </div>
                    <div class="form-group mb-4">
                      <label>
                        PHONE NUMBER
                        <span class="text-danger">*</span>
                      </label>
                      <input
                        type="text"
                        class="form-control"
                        v-model="driverRelation.relative_phone"
                      />
                      <small
                        class="text-danger"
                        v-if="errors && errors.relative_phone"
                      >
                        {{ errors.relative_phone[0] }}
                      </small>
                    </div>
                    <div class="form-group mb-4">
                      <label>
                        EMAIL ADDRESS
                        <span class="text-danger">*</span>
                      </label>
                      <input
                        type="email"
                        name="email"
                        class="form-control"
                        v-model="driverRelation.relative_email"
                      />
                      <small
                        class="text-danger"
                        v-if="errors && errors.relative_email"
                      >
                        {{ errors.relative_email[0] }}
                      </small>
                    </div>
                    <div class="form-group mb-4">
                      <label>
                        NATIONAL IDENTIFICATION NUMBER
                        <span class="text-danger">*</span>
                      </label>
                      <input
                        type="text"
                        class="form-control"
                        v-model="driverRelation.relative_nin"
                      />
                      <small
                        class="text-danger"
                        v-if="errors && errors.relative_nin"
                      >
                        {{ errors.relative_nin[0] }}
                      </small>
                    </div>
                    <div class="form-group mb-4">
                      <label>
                        STATE OF ORIGIN
                        <span class="text-danger">*</span>
                      </label>
                      <select
                        class="form-select"
                        v-model="driverRelation.relative_state"
                      >
                        <option value="">--Please select--</option>
                        <option
                          v-for="(state, i) in states"
                          :key="i"
                          :value="state.name"
                        >
                          {{ state.name }}
                        </option>
                      </select>
                      <small
                        class="text-danger"
                        v-if="errors && errors.relative_state"
                      >
                        {{ errors.relative_state[0] }}
                      </small>
                    </div>
                    <div class="form-group mb-4">
                      <label>
                        CITY OF RESIDENCE
                        <span class="text-danger">*</span>
                      </label>
                      <input
                        type="text"
                        class="form-control"
                        v-model="driverRelation.relative_city"
                      />
                      <small
                        class="text-danger"
                        v-if="errors && errors.relative_city"
                      >
                        {{ errors.relative_city[0] }}
                      </small>
                    </div>
                    <div class="form-group mb-4">
                      <label>
                        RESIDENTIAL ADDRESS
                        <span class="text-danger">*</span>
                      </label>
                      <input
                        type="text"
                        class="form-control"
                        v-model="driverRelation.relative_residential_address"
                      />
                      <small
                        class="text-danger"
                        v-if="errors && errors.relative_residential_address"
                      >
                        {{ errors.relative_residential_address[0] }}
                      </small>
                    </div>
                    <div class="form-group mb-4">
                      <label>
                        ARE YOU A NIGERIAN CITIZEN?
                        <span class="text-danger">*</span>
                      </label>
                      <select
                        class="form-select"
                        v-model="driverRelation.relative_citizenship"
                      >
                        <option value="">--Please Select--</option>
                        <option value="YES">YES</option>
                        <option value="NO">NO</option>
                      </select>
                      <small
                        class="text-danger"
                        v-if="errors && errors.relative_citizenship"
                      >
                        {{ errors.relative_citizenship[0] }}
                      </small>
                    </div>
                    <div class="form-group mb-4">
                      <label>
                        ARE YOU AN EX-CONVICT?
                        <span class="text-danger">*</span>
                      </label>
                      <select
                        class="form-select"
                        v-model="driverRelation.relative_ex_convict"
                      >
                        <option value="">--Please Select--</option>
                        <option value="YES">YES</option>
                        <option value="NO">NO</option>
                      </select>
                      <small
                        class="text-danger"
                        v-if="errors && errors.relative_ex_convict"
                      >
                        {{ errors.relative_ex_convict[0] }}
                      </small>
                    </div>
                    <div class="row">
                      <div class="col-sm-6 col-md-8">
                        <button
                          class="btn btn-primary"
                          @click="driver_relative_data"
                        >
                          Save & Proceed
                        </button>
                      </div>
                    </div>
                  </div>
                  <div class="formBox" v-show="user_company_data">
                    <div class="form-group mb-4">
                      <label>
                        COMPANY/ORGANIZATION NAME:
                        <span class="text-danger">*</span>
                      </label>
                      <input
                        type="text"
                        class="form-control"
                        name="driver_company"
                        v-model="company.driver_company"
                      />
                      <small
                        class="text-danger"
                        v-if="errors && errors.driver_company"
                      >
                        {{ errors.driver_company[0] }}
                      </small>
                    </div>
                    <div class="form-group mb-4">
                      <label>
                        OFFICIAL PHONE NUMBER
                        <span class="text-danger">*</span>
                      </label>
                      <input
                        type="text"
                        class="form-control"
                        name="driver_company_official_phone_number"
                        v-model="company.driver_company_official_phone_number"
                      />
                      <small
                        class="text-danger"
                        v-if="
                          errors && errors.driver_company_official_phone_number
                        "
                      >
                        {{ errors.driver_company_official_phone_number[0] }}
                      </small>
                    </div>
                    <div class="form-group mb-4">
                      <label>
                        WEBSITE:
                        <span class="text-danger">*</span>
                      </label>
                      <input
                        type="text"
                        class="form-control"
                        v-model="company.driver_company_website"
                      />
                      <small
                        class="text-danger"
                        v-if="errors && errors.driver_company_website"
                      >
                        {{ errors.driver_company_website[0] }}
                      </small>
                    </div>
                    <div class="form-group mb-4">
                      <label>
                        SUPERVISOR NAME:
                        <span class="text-danger">*</span>
                      </label>
                      <input
                        type="text"
                        class="form-control"
                        v-model="company.driver_company_supervisor"
                      />
                      <small
                        class="text-danger"
                        v-if="errors && errors.driver_company_supervisor"
                      >
                        {{ errors.driver_company_supervisor[0] }}
                      </small>
                    </div>
                    <div class="form-group mb-4">
                      <label>
                        SUPERVISOR PHONE NUMBER:
                        <span class="text-danger">*</span>
                      </label>
                      <input
                        type="text"
                        class="form-control"
                        v-model="company.driver_company_supervisor_phone"
                      />
                      <small
                        class="text-danger"
                        v-if="errors && errors.driver_company_supervisor_phone"
                      >
                        {{ errors.driver_company_supervisor_phone[0] }}
                      </small>
                    </div>
                    <div class="form-group mb-4">
                      <label>
                        YOUR JOB TITLE:
                        <span class="text-danger">*</span>
                      </label>
                      <input
                        type="text"
                        class="form-control"
                        v-model="company.driver_job_title"
                      />
                      <small
                        class="text-danger"
                        v-if="errors && errors.driver_job_title"
                      >
                        {{ errors.driver_job_title[0] }}
                      </small>
                    </div>
                    <div class="form-group mb-4">
                      <label>
                        HOW LONG DID YOU WORK:
                        <span class="text-danger">*</span>
                      </label>
                      <input
                        type="text"
                        class="form-control"
                        v-model="company.driver_work_lenght"
                      />
                      <small
                        class="text-danger"
                        v-if="errors && errors.driver_work_lenght"
                      >
                        {{ errors.driver_work_lenght[0] }}
                      </small>
                    </div>
                    <div class="form-group mb-4">
                      <label>
                        REASON FOR LEAVING:
                        <span class="text-danger">*</span>
                      </label>
                      <input
                        type="text"
                        class="form-control"
                        v-model="company.driver_reason_for_leaving"
                      />
                      <small
                        class="text-danger"
                        v-if="errors && errors.driver_reason_for_leaving"
                      >
                        {{ errors.driver_reason_for_leaving[0] }}
                      </small>
                    </div>
                    <div class="form-group mb-4">
                      <label>
                        CONTACT COMPANY FOR REFERENCE?
                        <span class="text-danger">*</span>
                      </label>
                      <select
                        class="form-select"
                        v-model="company.contact_company_for_reference"
                      >
                        <option value="">--Please Select--</option>
                        <option value="YES">YES</option>
                        <option value="NO">NO</option>
                      </select>
                      <small
                        class="text-danger"
                        v-if="errors && errors.contact_company_for_reference"
                      >
                        {{ errors.contact_company_for_reference[0] }}
                      </small>
                    </div>
                    <div class="row">
                      <div class="col-sm-6 col-md-8">
                        <button class="btn btn-primary" @click="company_data">
                          Save & Proceed
                        </button>
                      </div>
                    </div>
                  </div>
                  <div class="formBox" v-show="user_bank_data">
                    <div class="form-group mb-4">
                      <label>
                        BANK NAME:
                        <span class="text-danger">*</span>
                      </label>
                      <input
                        name="bank_name"
                        type="text"
                        class="form-control"
                        v-model="driverBank.driver_bank_name"
                      />
                      <small
                        class="text-danger"
                        v-if="errors && errors.driver_bank_name"
                      >
                        {{ errors.driver_bank_name[0] }}
                      </small>
                    </div>
                    <div class="form-group mb-4">
                      <label>
                        ACCOUNT NUMBER
                        <span class="text-danger">*</span>
                      </label>
                      <input
                        name="account_number"
                        type="text"
                        class="form-control"
                        v-model="driverBank.driver_account_number"
                      />
                      <small
                        class="text-danger"
                        v-if="errors && errors.driver_account_number"
                      >
                        {{ errors.driver_account_number[0] }}
                      </small>
                    </div>
                    <div class="form-group mb-4">
                      <label>
                        ACCOUNT NAME:
                        <span class="text-danger">*</span>
                      </label>
                      <input
                        name="account_name"
                        type="text"
                        class="form-control"
                        v-model="driverBank.driver_account_name"
                      />
                      <small
                        class="text-danger"
                        v-if="errors && errors.driver_account_name"
                      >
                        {{ errors.driver_account_name[0] }}
                      </small>
                    </div>
                    <div class="form-group mb-4">
                      <label>
                        BANK VERIFICATION NUMBER
                        <span class="text-danger">*</span>
                      </label>
                      <input
                        name="bank-verification_number"
                        type="text"
                        class="form-control"
                        v-model="driverBank.driver_bvn"
                      />
                      <small
                        class="text-danger"
                        v-if="errors && errors.driver_bvn"
                      >
                        {{ errors.driver_bvn[0] }}
                      </small>
                    </div>
                    <div class="row">
                      <div class="col-sm-6 col-md-8">
                        <button class="btn btn-primary" @click="bank_details">
                          Save & Proceed
                        </button>
                      </div>
                    </div>
                  </div>
                  <div class="formBox" v-show="user_photo_section">
                    <DriverPhoto @picture-taken="imageSrc = $event" />
                    <div class="imageBox" v-if="imageSrc != null">
                      <img :src="imageSrc" />
                    </div>
                    <div class="row">
                      <div class="col-sm-6 col-md-8">
                        <button
                          class="btn btn-primary mt-2"
                          @click="register_driver"
                        >
                          SUBMIT
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </main>
      <div class="topDriver"></div>
    </div>
  </div>
</template>

<script>
import Sidebar from './sidebar.vue'
import DriverPhoto from './driver_photo.vue'
export default {
  components: {
    Sidebar,
    DriverPhoto,
  },
  data() {
    return {
      single: false,
      userType: false,
      basic_user_data: {},
      basic_education_data: false,
      user_relative_data: false,
      user_company_data: false,
      user_bank_data: false,
      user_photo_section: false,
      guarntor1_user_data: false,
      contact_info_data: false,
      guarantor1_company_info_data: false,
      guarantor1_data_upload_data: false,

      imageSrc: null,
      driver: {
        last_name: '',
        first_name: '',
        date_of_birth: '',
        gender: '',
        phone: '',
        email: '',
        nin: '',
        state: '',
        city: '',
        residential_address: '',
        citizenship: '',
        ex_convict: '',
      },
      driverEducation: {
        primary_school_name: '',
        primary_school_address: '',
        graduate_primary: '',
        primary_qualification_type: '',
        secondary_school_name: '',
        secondary_school_address: '',
        graduate_secondary: '',
        secondary_qualification_type: '',
        tertiary_school_name: '',
        tertiary_school_address: '',
        graduate_tertiary: '',
        tertiary_qualification_type: '',
      },
      driverRelation: {
        relationship: '',
        relative_last_name: '',
        relative_first_name: '',
        relative_date_of_birth: '',
        relative_gender: '',
        relative_phone: '',
        relative_email: '',
        relative_nin: '',
        relative_state: '',
        relative_city: '',
        relative_residential_address: '',
        relative_citizenship: '',
        relative_ex_convict: '',
      },
      company: {
        driver_company: '',
        driver_company_official_phone_number: '',
        driver_company_website: '',
        driver_company_supervisor: '',
        driver_company_supervisor_phone: '',
        driver_job_title: '',
        driver_work_lenght: '',
        driver_reason_for_leaving: '',
        contact_company_for_reference: '',
      },
      driverBank: {
        driver_bank_name: '',
        driver_account_number: '',
        driver_account_name: '',
        driver_bvn: '',
      },
      states: [],
      errors: {},
    }
  },
  methods: {
    driver_data() {
      axios
        .post('api/driver_basic_data', this.driver)
        .then((response) => {
          console.log(response.data)
          this.errors = {}
          this.basic_user_data = false
          this.basic_education_data = true
        })
        .catch((errors) => {
          this.errors = errors.response.data.errors
          console.log(errors.response.data.errors)
          ;(this.basic_user_data = true), (this.basic_education_data = false)
        })
    },
    driver_education_data() {
      axios
        .post('api/driver_education_data', this.driverEducation)
        .then((response) => {
          console.log(response.data)
          this.errors = {}
          this.basic_user_data = false
          this.basic_education_data = false
          this.user_relative_data = true
        })
        .catch((errors) => {
          this.errors = errors.response.data.errors
          this.basic_user_data = false
          this.basic_education_data = true
          this.user_relative_data = false
          console.log(errors.response.data.errors)
        })
    },
    driver_relative_data() {
      axios
        .post('api/driver_relative_data', this.driverRelation)
        .then((response) => {
          console.log(response.data)
          this.errors = {}
          this.basic_user_data = false
          this.basic_education_data = false
          this.user_relative_data = false
          this.user_company_data = true
        })
        .catch((errors) => {
          this.errors = errors.response.data.errors
          this.basic_user_data = false
          this.basic_education_data = false
          this.user_relative_data = true
          this.user_company_data = false
          console.log(errors.response.data.errors)
        })
    },
    company_data() {
      axios
        .post('api/company_data', this.company)
        .then((response) => {
          console.log(response.data)
          this.errors = {}
          this.basic_user_data = false
          this.basic_education_data = false
          this.user_company_data = false
          this.user_bank_data = true
        })
        .catch((errors) => {
          this.errors = errors.response.data.errors
          console.log(errors.response.data.errors)
          this.basic_user_data = false
          this.basic_education_data = false
          this.user_company_data = true
          this.user_bank_data = false
        })
    },
    bank_details() {
      axios
        .post('api/driver_bank_data', this.driverBank)
        .then((response) => {
          console.log(response.data)
          this.errors = {}
          this.basic_user_data = false
          this.basic_education_data = false
          this.user_company_data = false
          this.user_bank_data = false
          this.user_photo_section = true
        })
        .catch((errors) => {
          this.errors = errors.response.data.errors
          console.log(errors.response.data.errors)
          this.basic_user_data = false
          this.basic_education_data = false
          this.user_company_data = false
          this.user_bank_data = true
          this.user_photo_section = false
        })
    },
    startCapture() {
      navigator.mediaDevices
        .getUserMedia({ video: true, audio: false })
        .then((stream) => {
          this.video.srcObject = stream
          this.video.play()
        })
        .catch((error) => {
          console.log(error)
        })
    },
    takePicture() {
      let vidSec = document.getElementById('streamSection')
      vidSec.style.display = 'none'
      let context = this.canvas.getContext('2d')
      context.drawImage(
        this.video,
        0,
        0,
        this.video.videoWidth,
        this.video.videoHeight,
      )
      this.$emit('picture-taken', this.canvas.toDataURL('image/png'))
    },
    initCanvas() {
      this.canvas.setAttribute('width', this.video.videoWidth)
      this.canvas.setAttribute('height', this.video.videoHeight)
    },
    register_driver() {
      axios
        .post('/api/register_driver', {
          last_name: this.driver.last_name,
          first_name: this.driver.first_name,
          date_of_birth: this.driver.date_of_birth,
          gender: this.driver.gender,
          phone: this.driver.phone,
          email: this.driver.email,
          nin: this.driver.nin,
          state: this.driver.state,
          city: this.driver.city,
          residential_address: this.driver.residential_address,
          citizenship: this.driver.citizenship,
          ex_convict: this.driver.ex_convict,
          primary_school_name: this.driverEducation.primary_school_name,
          primary_school_address: this.driverEducation.primary_school_address,
          graduate_primary: this.driverEducation.graduate_primary,
          primary_qualification_type: this.driverEducation
            .primary_qualification_type,
          secondary_school_name: this.driverEducation.secondary_school_name,
          secondary_school_address: this.driverEducation
            .secondary_school_address,
          graduate_secondary: this.driverEducation.graduate_secondary,
          secondary_qualification_type: this.driverEducation
            .secondary_qualification_type,
          tertiary_school_name: this.driverEducation.tertiary_school_name,
          tertiary_school_address: this.driverEducation.tertiary_school_address,
          graduate_tertiary: this.driverEducation.graduate_tertiary,
          tertiary_qualification_type: this.driverEducation
            .tertiary_qualification_type,
          relationship: this.driverRelation.relationship,
          relative_last_name: this.driverRelation.relative_last_name,
          relative_first_name: this.driverRelation.relative_first_name,
          relative_date_of_birth: this.driverRelation.relative_date_of_birth,
          relative_gender: this.driverRelation.relative_gender,
          relative_phone: this.driverRelation.relative_phone,
          relative_email: this.driverRelation.relative_email,
          relative_nin: this.driverRelation.relative_nin,
          relative_state: this.driverRelation.relative_state,
          relative_city: this.driverRelation.relative_city,
          relative_residential_address: this.driverRelation
            .relative_residential_address,
          relative_citizenship: this.driverRelation.relative_citizenship,
          relative_ex_convict: this.driverRelation.relative_ex_convict,
          driver_company: this.company.driver_company,
          driver_company_official_phone_number: this.company
            .driver_company_official_phone_number,
          driver_company_website: this.company.driver_company_website,
          driver_company_supervisor: this.company.driver_company_supervisor,
          driver_company_supervisor_phone: this.company
            .driver_company_supervisor_phone,
          driver_job_title: this.company.driver_job_title,
          driver_work_lenght: this.company.driver_work_lenght,
          driver_reason_for_leaving: this.company.driver_reason_for_leaving,
          contact_company_for_reference: this.company
            .contact_company_for_reference,
          driver_bank_name: this.driverBank.driver_bank_name,
          driver_account_number: this.driverBank.driver_account_number,
          driver_account_name: this.driverBank.driver_account_name,
          driver_bvn: this.driverBank.driver_bvn,
          userImage: this.imageSrc,
        })
        .then((res) => {
          Swal.fire('Success!', 'DRIVER REGISTERED SUCCESSFULLY', 'success')
          this.$router.push('/user-management')
          location.reload()
          console.log(res)
          this.errors = ''
        })
        .catch((error) => {
          this.user_photo_section = true
          if ((this.imageSrc = '')) {
            this.$toaster.error('PLEASE CAPTURE GUARANTOR PHOTO!')
          }
          if (error.response.status == 422) {
            this.$toaster.error('PLEASE CONFIRM ALL FIELDS HAVE BEEN FILLED!')
          }
        })
    },
    get_states() {
      axios
        .get('/api/states')
        .then((response) => {
          this.states = response.data
        })
        .catch((errors) => {
          console.log(errors)
        })
    },
    step1() {
      let first_step = document.querySelector('.first_step')
      let second_step = document.querySelector('.second_step')
      let third_step = document.querySelector('.third_step')
      let forth_step = document.querySelector('.forth_step')
      let five_step = document.querySelector('.five_step')
      let six_step = document.querySelector('.six_step')

      let first_count = document.querySelector('.first_count')
      let second_count = document.querySelector('.second_count')
      let third_count = document.querySelector('.third_count')
      let forth_count = document.querySelector('.forth_count')
      let five_count = document.querySelector('.five_count')
      let six_count = document.querySelector('.six_count')

      first_step.classList.add('clr')
      second_step.classList.remove('clr')
      third_step.classList.remove('clr')
      forth_step.classList.remove('clr')
      five_step.classList.remove('clr')
      six_step.classList.remove('clr')

      first_count.classList.add('active_step')
      second_count.classList.remove('active_step')
      third_count.classList.remove('active_step')
      forth_count.classList.remove('active_step')
      five_count.classList.remove('active_step')
      six_count.classList.remove('active_step')

      this.basic_user_data = true
      this.basic_education_data = false
      this.user_relative_data = false
      this.user_company_data = false
      this.user_bank_data = false
      this.user_photo_section = false
    },
    step2() {
      let first_step = document.querySelector('.first_step')
      let second_step = document.querySelector('.second_step')
      let third_step = document.querySelector('.third_step')
      let forth_step = document.querySelector('.forth_step')
      let five_step = document.querySelector('.five_step')
      let six_step = document.querySelector('.six_step')

      let first_count = document.querySelector('.first_count')
      let second_count = document.querySelector('.second_count')
      let third_count = document.querySelector('.third_count')
      let forth_count = document.querySelector('.forth_count')
      let five_count = document.querySelector('.five_count')
      let six_count = document.querySelector('.six_count')

      first_step.classList.remove('clr')
      second_step.classList.add('clr')
      third_step.classList.remove('clr')
      forth_step.classList.remove('clr')
      five_step.classList.remove('clr')
      six_step.classList.remove('clr')

      first_count.classList.remove('active_step')
      second_count.classList.add('active_step')
      third_count.classList.remove('active_step')
      forth_count.classList.remove('active_step')
      five_count.classList.remove('active_step')
      six_count.classList.remove('active_step')

      this.basic_user_data = false
      this.basic_education_data = true
      this.user_relative_data = false
      this.user_company_data = false
      this.user_bank_data = false
      this.user_photo_section = false
    },
    step3() {
      let first_step = document.querySelector('.first_step')
      let second_step = document.querySelector('.second_step')
      let third_step = document.querySelector('.third_step')
      let forth_step = document.querySelector('.forth_step')
      let five_step = document.querySelector('.five_step')
      let six_step = document.querySelector('.six_step')

      let first_count = document.querySelector('.first_count')
      let second_count = document.querySelector('.second_count')
      let third_count = document.querySelector('.third_count')
      let forth_count = document.querySelector('.forth_count')
      let five_count = document.querySelector('.five_count')
      let six_count = document.querySelector('.six_count')

      first_step.classList.remove('clr')
      second_step.classList.remove('clr')
      third_step.classList.add('clr')
      forth_step.classList.remove('clr')
      five_step.classList.remove('clr')
      six_step.classList.remove('clr')

      first_count.classList.remove('active_step')
      second_count.classList.remove('active_step')
      third_count.classList.add('active_step')
      forth_count.classList.remove('active_step')
      five_count.classList.remove('active_step')
      six_count.classList.remove('active_step')
      this.basic_user_data = false
      this.basic_education_data = false
      this.user_relative_data = true
      this.user_company_data = false
      this.user_bank_data = false
      this.user_photo_section = false
    },
    step4() {
      let first_step = document.querySelector('.first_step')
      let second_step = document.querySelector('.second_step')
      let third_step = document.querySelector('.third_step')
      let forth_step = document.querySelector('.forth_step')
      let five_step = document.querySelector('.five_step')
      let six_step = document.querySelector('.six_step')

      let first_count = document.querySelector('.first_count')
      let second_count = document.querySelector('.second_count')
      let third_count = document.querySelector('.third_count')
      let forth_count = document.querySelector('.forth_count')
      let five_count = document.querySelector('.five_count')
      let six_count = document.querySelector('.six_count')

      first_step.classList.remove('clr')
      second_step.classList.remove('clr')
      third_step.classList.remove('clr')
      forth_step.classList.add('clr')
      five_step.classList.remove('clr')
      six_step.classList.remove('clr')

      first_count.classList.remove('active_step')
      second_count.classList.remove('active_step')
      third_count.classList.remove('active_step')
      forth_count.classList.add('active_step')
      five_count.classList.remove('active_step')
      six_count.classList.remove('active_step')

      this.basic_user_data = false
      this.basic_education_data = false
      this.user_relative_data = false
      this.user_company_data = true
      this.user_bank_data = false
      this.user_photo_section = false
    },
    step5() {
      let first_step = document.querySelector('.first_step')
      let second_step = document.querySelector('.second_step')
      let third_step = document.querySelector('.third_step')
      let forth_step = document.querySelector('.forth_step')
      let five_step = document.querySelector('.five_step')
      let six_step = document.querySelector('.six_step')

      let first_count = document.querySelector('.first_count')
      let second_count = document.querySelector('.second_count')
      let third_count = document.querySelector('.third_count')
      let forth_count = document.querySelector('.forth_count')
      let five_count = document.querySelector('.five_count')
      let six_count = document.querySelector('.six_count')

      first_step.classList.remove('clr')
      second_step.classList.remove('clr')
      third_step.classList.remove('clr')
      forth_step.classList.remove('clr')
      five_step.classList.add('clr')
      six_step.classList.remove('clr')

      first_count.classList.remove('active_step')
      second_count.classList.remove('active_step')
      third_count.classList.remove('active_step')
      forth_count.classList.remove('active_step')
      five_count.classList.add('active_step')
      six_count.classList.remove('active_step')

      this.basic_user_data = false
      this.basic_education_data = false
      this.user_relative_data = false
      this.user_company_data = false
      this.user_bank_data = true
      this.user_photo_section = false
    },
    step6() {
      let first_step = document.querySelector('.first_step')
      let second_step = document.querySelector('.second_step')
      let third_step = document.querySelector('.third_step')
      let forth_step = document.querySelector('.forth_step')
      let five_step = document.querySelector('.five_step')
      let six_step = document.querySelector('.six_step')

      let first_count = document.querySelector('.first_count')
      let second_count = document.querySelector('.second_count')
      let third_count = document.querySelector('.third_count')
      let forth_count = document.querySelector('.forth_count')
      let five_count = document.querySelector('.five_count')
      let six_count = document.querySelector('.six_count')

      first_step.classList.remove('clr')
      second_step.classList.remove('clr')
      third_step.classList.remove('clr')
      forth_step.classList.remove('clr')
      five_step.classList.remove('clr')
      six_step.classList.add('clr')

      first_count.classList.remove('active_step')
      second_count.classList.remove('active_step')
      third_count.classList.remove('active_step')
      forth_count.classList.remove('active_step')
      five_count.classList.remove('active_step')
      six_count.classList.add('active_step')
      this.basic_user_data = false
      this.basic_education_data = false
      this.user_relative_data = false
      this.user_company_data = false
      this.user_bank_data = false
      this.user_photo_section = true
    },
  },
  mounted() {
    this.canvas = this.$refs.canvas
    this.video = this.$refs.video
    this.get_states()
  },
}
</script>
<style>
.topInfo {
  height: auto;
  background: #fff;
  justify-content: space-between;
  position: fixed;
  width: 930px;
  box-shadow: 0px 8px 12px rgba(218, 218, 218, 0.5);
}
.tab_btn {
  font-weight: bold;
  border: none;
  background: #fff;
  font-size: 16px;
  border-bottom: 3px solid #000;
}

.tab_btn2,
.tab_btn3 {
  font-weight: bold;
  border: none;
  background: #fff;
  font-size: 16px;
  opacity: 0.3;
}
.formBox {
  padding: 30px 44px;
  background: #fff;
}
.steps {
  padding: 30px;
}
.shadowBox {
  box-shadow: 0 0 4px #0505056c !important;
  margin: 20px 0 10px 10px;
  padding: 20px;
}
.imageBox {
  width: 100%;
  height: 400px;
}
.imageBox img {
  width: 100%;
  height: 100%;
}
.tab_btn,
.tab_btn2,
.tab_btn3 {
  color: unset;
  padding: 40px 35px 20px 30px !important;
  margin-bottom: -12px;
  margin-left: -13px;
}
.tab_btn:hover,
.tab_btn2:hover,
.tab_btn3:hover {
  color: grey;
}
.topDriver {
  position: fixed;
  top: 64px;
  left: 0;
  height: 120px;
  background: #b70000;
  width: 100%;
}
.stay_fixed {
  position: fixed;
}
.downInfo{
    padding-top: 95px;
}
label{
    font-weight:bold;
    font-size: 12px;
}
</style>
