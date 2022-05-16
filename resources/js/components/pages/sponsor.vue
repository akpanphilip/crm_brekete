<template>
  <div>
    <div class="upBox">
      <img :src="'../img/brekete_logo.png'" alt="" />
    </div>
    <div class="main">
      <Sidebar class="sidebar_section" />
      <main class="main_section">
        <div class="container-fluid">
          <!-- <div class="topInfo stay_fixed d-flex align-items-center">
            <button class="vehicleBtn font-weight-bold">SPONSOR DATA</button>
          </div> -->
          <div class="topInfo stay_fixed d-flex align-items-center">
            <button to="/driver-capturing" class="tab_btn font-weight-bold">
              SPONSOR DATA
            </button>
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
                  <li @click="step2" class="second_step">
                    <div class="step second_count">
                      <Icon size="20" type="ios-card" />
                    </div>
                    <span>User Bank Details</span>
                  </li>
                  <li @click="step3" class="third_step">
                    <div class="step third_count">
                      <Icon size="20" type="ios-camera-outline" />
                    </div>
                    <span>Data Upload</span>
                  </li>
                </ul>
                <div class="stepForms">
                  <div class="formBox" v-show="basic_info">
                    <div class="form-group mb-4">
                      <label>
                        LAST NAME
                        <span class="text-danger">*</span>
                      </label>
                      <input
                        name="last_name"
                        type="text"
                        class="form-control"
                        v-model="sponsor.last_name"
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
                        name="first_name"
                        type="text"
                        class="form-control"
                        v-model="sponsor.first_name"
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
                        name="date_of_birth"
                        type="date"
                        class="form-control"
                        v-model="sponsor.date_of_birth"
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
                        v-model="sponsor.gender"
                        class="form-control"
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
                        PHONE NUMBER
                        <span class="text-danger">*</span>
                      </label>
                      <input
                        type="text"
                        name="phone"
                        class="form-control"
                        v-model="sponsor.phone"
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
                        v-model="sponsor.email"
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
                        v-model="sponsor.nin"
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
                      <select
                        class="form-select"
                        name="state"
                        v-model="sponsor.state"
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
                        name="city"
                        v-model="sponsor.city"
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
                      <textarea
                        name="residential_address"
                        id=""
                        cols="30"
                        rows="2"
                        class="form-control"
                        v-model="sponsor.residential_address"
                      ></textarea>
                      <small
                        class="text-danger"
                        v-if="errors && errors.residential_address"
                      >
                        {{ errors.residential_address[0] }}
                      </small>
                    </div>
                    <div class="form-group mb-4">
                      <label>
                        ARE YOU A NIGERIAN CITIZEN
                        <span class="text-danger">*</span>
                      </label>
                      <select
                        class="form-select"
                        name="citizenship"
                        v-model="sponsor.citizenship"
                      >
                        <option value="">--PLEASE SELECT--</option>
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
                      <select
                        class="form-select"
                        name="ex_convict"
                        v-model="sponsor.ex_convict"
                      >
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
                        <button class="btn btn-primary" @click="basic_data">
                          Save & Proceed
                        </button>
                      </div>
                    </div>
                  </div>
                  <div class="formBox" v-show="bank_info">
                    <div class="form-group mb-4">
                      <label>
                        BANK NAME:
                        <span class="text-danger">*</span>
                      </label>
                      <input
                        name="bank_name"
                        type="text"
                        class="form-control"
                        v-model="sponsorBank.bank_name"
                      />
                      <small
                        class="text-danger"
                        v-if="errors && errors.bank_name"
                      >
                        {{ errors.bank_name[0] }}
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
                        v-model="sponsorBank.account_number"
                      />
                      <small
                        class="text-danger"
                        v-if="errors && errors.account_number"
                      >
                        {{ errors.account_number[0] }}
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
                        v-model="sponsorBank.account_name"
                      />
                      <small
                        class="text-danger"
                        v-if="errors && errors.account_name"
                      >
                        {{ errors.account_name[0] }}
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
                        v-model="sponsorBank.bank_verification_number"
                      />
                      <small
                        class="text-danger"
                        v-if="errors && errors.bank_verification_number"
                      >
                        {{ errors.bank_verification_number[0] }}
                      </small>
                    </div>
                    <div class="row">
                      <div class="col-sm-6 col-md-8">
                        <button class="btn btn-primary" @click="bank_data">
                          Save & Proceed
                        </button>
                      </div>
                    </div>
                  </div>
                  <div class="formBox" v-show="photo_section">
                    <SponsorPhoto @picture-taken="sponsor_photo = $event" />
                    <div class="imageBox" v-if="sponsor_photo != null">
                      <img :src="sponsor_photo" />
                    </div>
                    <div class="row">
                      <div class="col-sm-6 col-md-8">
                        <button
                          class="btn btn-primary mt-2"
                          @click="register_sponsor"
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
      <div class="topSponsor"></div>
    </div>
  </div>
</template>
<script>
import Sidebar from './sidebar.vue'
import SponsorPhoto from './sponsor_photo.vue'
export default {
  components: {
    Sidebar,
    SponsorPhoto,
  },
  data() {
    return {
      single: false,
      userType: false,
      basic_info: {},
      bank_info: false,
      photo_section: false,
      sponsor: {
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
      sponsorBank: {
        bank_name: '',
        account_number: '',
        account_name: '',
        bank_verification_number: '',
      },
      sponsor_photo: null,
      states: [],
      errors: {},
    }
  },
  methods: {
    step1() {
      let first_step = document.querySelector('.first_step')
      let second_step = document.querySelector('.second_step')
      let third_step = document.querySelector('.third_step')
      let first_count = document.querySelector('.first_count')
      let second_count = document.querySelector('.second_count')
      let third_count = document.querySelector('.third_count')

      first_step.classList.add('clr')
      second_step.classList.remove('clr')
      third_step.classList.remove('clr')

      first_count.classList.add('active_step')
      second_count.classList.remove('active_step')
      third_count.classList.remove('active_step')

      this.basic_info = true
      this.bank_info = false
      this.photo_section = false
    },
    step2() {
      let first_step = document.querySelector('.first_step')
      let second_step = document.querySelector('.second_step')
      let third_step = document.querySelector('.third_step')
      let first_count = document.querySelector('.first_count')
      let second_count = document.querySelector('.second_count')
      let third_count = document.querySelector('.third_count')

      first_step.classList.remove('clr')
      second_step.classList.add('clr')
      third_step.classList.remove('clr')

      first_count.classList.remove('active_step')
      second_count.classList.add('active_step')
      third_count.classList.remove('active_step')
      this.basic_info = false
      this.bank_info = true
      this.photo_section = false
    },
    step3() {
      let first_step = document.querySelector('.first_step')
      let second_step = document.querySelector('.second_step')
      let third_step = document.querySelector('.third_step')
      let first_count = document.querySelector('.first_count')
      let second_count = document.querySelector('.second_count')
      let third_count = document.querySelector('.third_count')

      first_step.classList.remove('clr')
      second_step.classList.remove('clr')
      third_step.classList.add('clr')

      first_count.classList.remove('active_step')
      second_count.classList.remove('active_step')
      third_count.classList.add('active_step')

      this.basic_info = false
      this.bank_info = false
      this.photo_section = true
    },
    basic_data() {
      axios
        .post('api/sponsor_basic_data', this.sponsor)
        .then((response) => {
          console.log(response.data)
          this.errors = {}
          this.basic_info = false
          this.bank_info = true
        })
        .catch((errors) => {
          this.errors = errors.response.data.errors
          console.log(errors.response.data.errors)
          this.basic_info = true
          this.bank_info = false
        })
    },
    bank_data() {
      axios
        .post('api/sponsor_bank_details', this.sponsorBank)
        .then((response) => {
          console.log(response.data)
          this.errors = {}
          this.basic_info = false
          this.bank_info = false
          this.photo_section = true
        })
        .catch((errors) => {
          this.errors = errors.response.data.errors
          console.log(errors.response.data.errors)
          this.basic_info = false
          this.bank_info = true
          this.photo_section = false
        })
    },
    register_sponsor() {
      axios
        .post('/api/add_sponsor', {
          last_name: this.sponsor.last_name,
          first_name: this.sponsor.first_name,
          date_of_birth: this.sponsor.date_of_birth,
          gender: this.sponsor.gender,
          phone: this.sponsor.phone,
          email: this.sponsor.email,
          nin: this.sponsor.nin,
          state: this.sponsor.state,
          city: this.sponsor.city,
          residential_address: this.sponsor.residential_address,
          citizenship: this.sponsor.citizenship,
          ex_convict: this.sponsor.ex_convict,
          bank_name: this.sponsorBank.bank_name,
          account_number: this.sponsorBank.account_number,
          account_name: this.sponsorBank.account_name,
          bank_verification_number: this.sponsorBank.bank_verification_number,
          sponsor_photo: this.sponsor_photo,
        })
        .then((res) => {
          this.$router.push('/user-management')
          location.reload()
          Swal.fire('Success!', 'SPONSOR REGISTERED SUCCESSFULLY', 'success')
          console.log(res)
          this.data.photo = ''
          this.sponsor.last_name = ''
          this.sponsor.first_name = ''
          this.sponsor.date_of_birth = ''
          this.sponsor.gender = ''
          this.sponsor.phone = ''
          this.sponsor.email = ''
          this.sponsor.nin = ''
          this.sponsor.state = ''
          this.sponsor.city = ''
          this.sponsor.residential_address = ''
          this.sponsor.citizenship = ''
          this.sponsor.ex_convict = ''
          this.sponsorBank.bank_name = ''
          this.sponsorBank.account_number = ''
          this.sponsorBank.account_name = ''
          this.sponsorBank.bank_verification_number = ''
          this.errors = ''
        })
        .catch((error) => {
          this.basic_info = false
          this.bank_info = false
          this.photo_section = true
          if (error.response.status == 422) {
            this.$toaster.error('PLEASE CAPTURE SPONSOR PHOTO!')
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
  },
  mounted() {
    this.get_states()
  },
}
</script>
<style>
.tab_btn {
  font-weight: bold;
  border: none;
  background: #fff;
  font-size: 14px;
  border-bottom: 2px solid #000;
}
.formBox {
  padding: 30px 44px;
  background: #fff;
}
.steps {
  padding: 30px;
}
.second_sponsor,
.third_sponsor {
  display: none;
}
#sponsor_bank_name {
  display: none;
}
#sponsor_photo {
  display: none;
}
#sponsor_step_2 {
  display: none;
}
#sponsor_step_3 {
  display: none;
}
.stepForms {
  width: 50%;
}
.step_link {
  list-style: none;
  display: flex;
  justify-content: space-evenly;
  position: fixed;
  right: 270px;
  top: 200px;
  flex-direction: column;
  width: 200px;
}
.downForm {
  position: relative;
}
.step_link li {
  margin-bottom: 30px;
  display: flex;
  cursor: pointer;
}
.step_link span {
  margin-left: 5px;
  margin-top: 10px;
  height: 30px;
  display: flex;
  justify-content: center;
  align-items: center;
}
.active_step {
  border: 1px dotted #20c997;
}
.clr {
  color: #20c997;
}
.step {
  width: 45px;
  height: 45px;
  border: 2px dashed;
  border-radius: 50px;
  display: flex;
  justify-content: center;
  align-items: center;
  background: #fff;
  margin-right: 16px;
}
.btn-primary {
  color: #2d9cdb;
  border-radius: 6px;
  width: 190px;
  height: 50px;
  color: #fff;
}
.topSponsor {
  position: fixed;
  top: 64px;
  left: 0;
  height: 120px;
  background: #00b775;
  width: 100%;
}
@media screen and (max-width: 700px) {
  .step_link {
    right: 5px;
    font-size: 12px;
  }
  .step {
    width: 30px;
    height: 30px;
  }
}
</style>
