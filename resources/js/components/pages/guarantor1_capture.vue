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
            class="tab_btn2 font-weight-bold driverBtn"
          >
            DRIVER CAPTURING
          </router-link>
          <router-link
            to="/guarantor1-capture"
            class="tab_btn font-weight-bold guarantor1Btn"
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
        <div class="row">
          <div class="col-sm-6 col-md-12">
            <ul class="step_link">
              <li class="first_step clr" @click="step1">
                <div class="step first_count active_step">
                  <Icon size="20" type="ios-person-outline" />
                </div>
                <span>Basic User Data</span>
              </li>
              <li @click="step2" class="second_step">
                <div class="step second_count">
                  <Icon size="20" type="ios-call-outline" />
                </div>
                <span>Contact Information</span>
              </li>
              <li @click="step3" class="third_step">
                <div class="step third_count">
                  <Icon size="20" type="ios-briefcase-outline" />
                </div>
                <span>User Work Data</span>
              </li>
              <li @click="step4" class="forth_step">
                <div class="step forth_count">
                  <Icon size="20" type="ios-camera-outline" />
                </div>
                <span>Data Upload</span>
              </li>
            </ul>
            <div class="stepForms">
              <div class="formBox" v-show="basic_user_data">
                <div class="form-group mb-4">
                  <label>
                    DRIVER ID
                    <span class="text-danger">*</span>
                  </label>
                  <input
                    type="text"
                    class="form-control"
                    v-model="basic_data.driver_id"
                  />
                  <small class="text-danger" v-if="errors && errors.driver_id">
                    {{ errors.driver_id[0] }}
                  </small>
                </div>
                <div class="form-group mb-4">
                  <label>
                    TITLE
                    <span class="text-danger">*</span>
                  </label>
                  <select
                    name="title"
                    class="form-control"
                    v-model="basic_data.title"
                  >
                    <option value="">--Please select--</option>
                    <option value="Mr.">Mr.</option>
                    <option value="Mrs.">Mrs.</option>
                  </select>
                  <small class="text-danger" v-if="errors && errors.title">
                    {{ errors.title[0] }}
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
                    name="last_name"
                    v-model="basic_data.last_name"
                  />
                  <small class="text-danger" v-if="errors && errors.last_name">
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
                    v-model="basic_data.first_name"
                  />
                  <small class="text-danger" v-if="errors && errors.first_name">
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
                    v-model="basic_data.date_of_birth"
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
                    class="form-control"
                    v-model="basic_data.gender"
                  >
                    <option value="">--Please Select--</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                  </select>
                  <small class="text-danger" v-if="errors && errors.gender">
                    {{ errors.gender[0] }}
                  </small>
                </div>
                <div class="form-group mb-4">
                  <label>
                    RELIGION
                    <span class="text-danger">*</span>
                  </label>
                  <select
                    name="religion"
                    class="form-control"
                    v-model="basic_data.religion"
                  >
                    <option value="">--Please Select--</option>
                    <option value="Christain">Christain</option>
                    <option value="Muslim">Muslim</option>
                    <option value="Other">Other</option>
                  </select>
                  <small class="text-danger" v-if="errors && errors.religion">
                    {{ errors.religion[0] }}
                  </small>
                </div>
                <div class="row">
                  <div class="col-sm-6 col-md-8">
                    <button class="btn btn-primary" @click="guarantor1_data">
                      Save & Proceed
                    </button>
                  </div>
                </div>
              </div>
              <div class="formBox" v-show="basic_contact_data">
                <div class="form-group mb-4">
                  <label>
                    PHONE NUMBER:
                    <span class="text-danger">*</span>
                  </label>
                  <input
                    type="text"
                    class="form-control"
                    v-model="contact_data.phone_number"
                  />
                  <small
                    class="text-danger"
                    v-if="errors && errors.phone_number"
                  >
                    {{ errors.phone_number[0] }}
                  </small>
                </div>
                <div class="form-group mb-4">
                  <label>
                    EMAIL:
                    <span class="text-danger">*</span>
                  </label>
                  <input
                    type="email"
                    class="form-control"
                    v-model="contact_data.email"
                  />
                  <small class="text-danger" v-if="errors && errors.email">
                    {{ errors.email[0] }}
                  </small>
                </div>
                <div class="form-group mb-4">
                  <label>
                    NATIONAL IDENITY NUMBER:
                    <span class="text-danger">*</span>
                  </label>
                  <input
                    type="text"
                    class="form-control"
                    v-model="contact_data.nin"
                  />
                  <small class="text-danger" v-if="errors && errors.nin">
                    {{ errors.nin[0] }}
                  </small>
                </div>
                <div class="form-group mb-4">
                  <label>
                    STATE OF ORIGIN:
                    <span class="text-danger">*</span>
                  </label>
                  <select class="form-control" v-model="contact_data.state">
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
                    CITY OF RESIDENCE:
                    <span class="text-danger">*</span>
                  </label>
                  <input
                    type="text"
                    class="form-control"
                    v-model="contact_data.city"
                  />
                  <small class="text-danger" v-if="errors && errors.city">
                    {{ errors.city[0] }}
                  </small>
                </div>
                <div class="form-group mb-4">
                  <label>
                    RESIDENTIAL ADDRESS:
                    <span class="text-danger">*</span>
                  </label>
                  <input
                    type="text"
                    class="form-control"
                    v-model="contact_data.residential_address"
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
                    ARE YOU A NIGERIAN CITIZEN:
                    <span class="text-danger">*</span>
                  </label>
                  <select
                    class="form-control"
                    v-model="contact_data.citizenship"
                  >
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
                    ARE YOU AN EX-CONVICT
                    <span class="text-danger">*</span>
                  </label>
                  <select class="form-select" v-model="contact_data.ex_convict">
                    <option value="">--Please Select--</option>
                    <option value="YES">YES</option>
                    <option value="NO">NO</option>
                  </select>
                  <small class="text-danger" v-if="errors && errors.ex_convict">
                    {{ errors.ex_convict[0] }}
                  </small>
                </div>
                <div class="row">
                  <div class="col-sm-6 col-md-8">
                    <button
                      class="btn btn-primary"
                      @click="guarantor1_contact_data"
                    >
                      Save & Proceed
                    </button>
                  </div>
                </div>
              </div>
              <div class="formBox" v-show="basic_work_data">
                <div class="form-group mb-4">
                  <label>
                    COMPANY/ORGANIZATION NAME:
                    <span class="text-danger">*</span>
                  </label>
                  <input
                    type="text"
                    class="form-control"
                    name="driver_company"
                    v-model="company_data.guarantor_company_name"
                  />
                  <small
                    class="text-danger"
                    v-if="errors && errors.guarantor_company_name"
                  >
                    {{ errors.guarantor_company_name[0] }}
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
                    v-model="company_data.company_phone_number"
                  />
                  <small
                    class="text-danger"
                    v-if="errors && errors.company_phone_number"
                  >
                    {{ errors.company_phone_number[0] }}
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
                    v-model="company_data.company_website"
                  />
                  <small
                    class="text-danger"
                    v-if="errors && errors.company_website"
                  >
                    {{ errors.company_website[0] }}
                  </small>
                </div>
                <div class="form-group mb-4">
                  <label>
                    COMPANY/ORGANIZATION ADDRESS:
                    <span class="text-danger">*</span>
                  </label>
                  <input
                    type="text"
                    class="form-control"
                    v-model="company_data.company_address"
                  />
                  <small
                    class="text-danger"
                    v-if="errors && errors.company_address"
                  >
                    {{ errors.company_address[0] }}
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
                    v-model="company_data.job_title"
                  />
                  <small class="text-danger" v-if="errors && errors.job_title">
                    {{ errors.job_title[0] }}
                  </small>
                </div>
                <div class="form-group mb-4">
                  <label>
                    JOB GRADE/LEVEl:
                    <span class="text-danger">*</span>
                  </label>
                  <input
                    type="text"
                    class="form-control"
                    v-model="company_data.job_level"
                  />
                  <small class="text-danger" v-if="errors && errors.job_level">
                    {{ errors.job_level[0] }}
                  </small>
                </div>
                <div class="form-group mb-4">
                  <label>
                    RELATIONSHIP TO APPLICANT
                    <span class="text-danger">*</span>
                  </label>
                  <select
                    class="form-select"
                    v-model="company_data.relationship_to_applicant"
                  >
                    <option value="">--Please Select--</option>
                    <option value="Friend">Friend</option>
                    <option value="Colleague">Colleague</option>
                    <option value="Relative">Relative</option>
                    <option value="Others">Others</option>
                  </select>
                  <small
                    class="text-danger"
                    v-if="errors && errors.relationship_to_applicant"
                  >
                    {{ errors.relationship_to_applicant[0] }}
                  </small>
                </div>
                <div class="form-group mb-4">
                  <label>
                    CONTACT COMPANY FOR REFERENCE?
                    <span class="text-danger">*</span>
                  </label>
                  <select
                    class="form-select"
                    v-model="company_data.company_reference"
                  >
                    <option value="">--Please Select--</option>
                    <option value="YES">YES</option>
                    <option value="NO">NO</option>
                  </select>
                  <small
                    class="text-danger"
                    v-if="errors && errors.company_reference"
                  >
                    {{ errors.company_reference[0] }}
                  </small>
                </div>
                <div class="row">
                  <div class="col-sm-6 col-md-8">
                    <button
                      class="btn btn-primary"
                      @click="guarantor1_work_data"
                    >
                      Save & Proceed
                    </button>
                  </div>
                </div>
              </div>
              <div class="formBox" v-show="basic_photo_section">
                <Guarantor1Photo @picture-taken="guarantor_photo = $event" />
                <div class="imageBox" v-if="guarantor_photo != null">
                  <img :src="guarantor_photo" />
                </div>
                <div class="row">
                  <div class="col-sm-6 col-md-8">
                    <button
                      class="btn btn-primary mt-2"
                      @click="register_guarantor1"
                    >
                      SUBMIT
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-md-4"></div>
        </div>
      </div>
      </main>
      <div class="topGuarantor1"></div>
    </div>
  </div>
</template>

<script>
import Sidebar from './sidebar.vue'
import Guarantor1Photo from './guarantor1_photo.vue'
import Guarantor1Nin from './guarantor1_nin.vue'
export default {
  components: {
    Sidebar,
    Guarantor1Photo,
    Guarantor1Nin,
  },
  data() {
    return {
      single: false,
      userType: false,
      basic_user_data: {},
      basic_contact_data: false,
      basic_work_data: false,
      basic_photo_section: false,
      tokenAvatar: '',
      guarantor_photo: null,

      basic_data: {
        driver_id: '',
        title: '',
        last_name: '',
        first_name: '',
        date_of_birth: '',
        gender: '',
        religion: '',
      },
      contact_data: {
        phone_number: '',
        email: '',
        nin: '',
        state: '',
        city: '',
        residential_address: '',
        citizenship: '',
        ex_convict: '',
      },
      company_data: {
        guarantor_company_name: '',
        company_phone_number: '',
        company_website: '',
        company_address: '',
        job_title: '',
        job_level: '',
        relationship_to_applicant: '',
        company_reference: '',
      },
      states: [],
      errors: {},
    }
  },
  methods: {
    guarantor1_data() {
      axios
        .post('api/guarantor1_basic_data', this.basic_data)
        .then((response) => {
          console.log(response.data)
          this.errors = {}
          this.basic_user_data = false
          this.basic_contact_data = true
        })
        .catch((errors) => {
          this.errors = errors.response.data.errors
          console.log(errors.response.data.errors)
          this.basic_user_data = true
          this.basic_contact_data = false
        })
    },
    guarantor1_contact_data() {
      axios
        .post('api/guarantor1_contact_data', this.contact_data)
        .then((response) => {
          console.log(response.data)
          this.errors = {}
          this.basic_user_data = false
          this.basic_contact_data = false
          this.basic_work_data = true
        })
        .catch((errors) => {
          this.errors = errors.response.data.errors
          this.basic_user_data = false
          this.basic_contact_data = true
          this.basic_work_data = false
          console.log(errors.response.data.errors)
        })
    },
    guarantor1_work_data() {
      axios
        .post('api/guarantor1_work_data', this.company_data)
        .then((response) => {
          console.log(response.data)
          this.errors = {}
          this.basic_user_data = false
          this.basic_contact_data = false
          this.basic_work_data = false
          this.basic_photo_section = true
        })
        .catch((errors) => {
          this.errors = errors.response.data.errors
          this.basic_user_data = false
          this.basic_contact_data = false
          this.basic_work_data = true
          this.basic_photo_section = false

          console.log(errors.response.data.errors)
        })
    },
    register_guarantor1() {
      axios
        .post('/api/register_guarantor1', {
          driver_id: this.basic_data.driver_id,
          title: this.basic_data.title,
          last_name: this.basic_data.last_name,
          first_name: this.basic_data.first_name,
          date_of_birth: this.basic_data.date_of_birth,
          gender: this.basic_data.gender,
          religion: this.basic_data.religion,
          phone_number: this.contact_data.phone_number,
          email: this.contact_data.email,
          nin: this.contact_data.nin,
          state: this.contact_data.state,
          city: this.contact_data.city,
          residential_address: this.contact_data.residential_address,
          citizenship: this.contact_data.citizenship,
          ex_convict: this.contact_data.ex_convict,
          guarantor_company_name: this.company_data.guarantor_company_name,
          company_phone_number: this.company_data.company_phone_number,
          company_website: this.company_data.company_website,
          company_address: this.company_data.company_address,
          job_title: this.company_data.job_title,
          job_level: this.company_data.job_level,
          relationship_to_applicant: this.company_data
            .relationship_to_applicant,
          company_reference: this.company_data.company_reference,
          guarantor_photo: this.guarantor_photo,
        })
        .then((response) => {
          this.$router.push('/guarantor2-capture')
          location.reload()
          console.log(response.data)
          this.errors = {}
          this.basic_user_data = false
          this.basic_contact_data = false
          this.basic_work_data = false
          this.basic_photo_section = false
          Swal.fire('Success!', 'REGISTERED SUCCESSFULLY', 'success')
        })
        .catch((error) => {
          this.basic_user_data = false
          this.basic_contact_data = false
          this.basic_work_data = false
          this.basic_photo_section = true
          if (error.response.status == 422) {
            this.$toaster.error('PLEASE CAPTURE GUARANTOR PHOTO!')
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

      let first_count = document.querySelector('.first_count')
      let second_count = document.querySelector('.second_count')
      let third_count = document.querySelector('.third_count')
      let forth_count = document.querySelector('.forth_count')

      first_step.classList.add('clr')
      second_step.classList.remove('clr')
      third_step.classList.remove('clr')
      forth_step.classList.remove('clr')

      first_count.classList.add('active_step')
      second_count.classList.remove('active_step')
      third_count.classList.remove('active_step')
      forth_count.classList.remove('active_step')

      this.basic_user_data = true
      this.basic_contact_data = false
      this.basic_work_data = false
      this.basic_photo_section = false
    },
    step2() {
      let first_step = document.querySelector('.first_step')
      let second_step = document.querySelector('.second_step')
      let third_step = document.querySelector('.third_step')
      let forth_step = document.querySelector('.forth_step')

      let first_count = document.querySelector('.first_count')
      let second_count = document.querySelector('.second_count')
      let third_count = document.querySelector('.third_count')
      let forth_count = document.querySelector('.forth_count')

      first_step.classList.remove('clr')
      second_step.classList.add('clr')
      third_step.classList.remove('clr')
      forth_step.classList.remove('clr')

      first_count.classList.remove('active_step')
      second_count.classList.add('active_step')
      third_count.classList.remove('active_step')
      forth_count.classList.remove('active_step')

      this.basic_user_data = false
      this.basic_contact_data = true
      this.basic_work_data = false
      this.basic_photo_section = false
    },
    step3() {
      let first_step = document.querySelector('.first_step')
      let second_step = document.querySelector('.second_step')
      let third_step = document.querySelector('.third_step')
      let forth_step = document.querySelector('.forth_step')

      let first_count = document.querySelector('.first_count')
      let second_count = document.querySelector('.second_count')
      let third_count = document.querySelector('.third_count')
      let forth_count = document.querySelector('.forth_count')

      first_step.classList.remove('clr')
      second_step.classList.remove('clr')
      third_step.classList.add('clr')
      forth_step.classList.remove('clr')

      first_count.classList.remove('active_step')
      second_count.classList.remove('active_step')
      third_count.classList.add('active_step')
      forth_count.classList.remove('active_step')

      this.basic_user_data = false
      this.basic_contact_data = false
      this.basic_work_data = true
      this.basic_photo_section = false
    },
    step4() {
      let first_step = document.querySelector('.first_step')
      let second_step = document.querySelector('.second_step')
      let third_step = document.querySelector('.third_step')
      let forth_step = document.querySelector('.forth_step')

      let first_count = document.querySelector('.first_count')
      let second_count = document.querySelector('.second_count')
      let third_count = document.querySelector('.third_count')
      let forth_count = document.querySelector('.forth_count')

      first_step.classList.remove('clr')
      second_step.classList.remove('clr')
      third_step.classList.remove('clr')
      forth_step.classList.add('clr')

      first_count.classList.remove('active_step')
      second_count.classList.remove('active_step')
      third_count.classList.remove('active_step')
      forth_count.classList.add('active_step')

      this.basic_user_data = false
      this.basic_contact_data = false
      this.basic_work_data = false
      this.basic_photo_section = true
    },
  },
  mounted() {
    this.get_states()
  },
}
</script>
<style>
.topGuarantor1 {
  position: fixed;
  top: 64px;
  left: 0;
  height: 120px;
  background: teal;
  width: 100%;
}
</style>
