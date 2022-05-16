<template>
  <div class="main">
    <Sidebar class="sidebar_section" />
    <main class="main_section">
      <div class="container-fluid">
        <p class="titleText">
          Bio Data
        </p>
        <div class="row">
          <div class="col-sm-6 col-md-4">
            <div class="dataBox">
              <img :src="driverData.driver_photo" alt="" />
            </div>
          </div>
          <div class="col-sm-6 col-md-6">
            <div class="dataBox">
              <table>
                <table class="table table-responsive">
                  <tbody>
                    <tr>
                      <td>Full Name</td>
                      <th
                        class="d-flex justify-content-between align-items-center"
                      >
                        {{ driverData.last_name }}
                        {{ driverData.first_name }}
                      </th>
                    </tr>
                    <tr>
                      <td>Email</td>
                      <th
                        class="d-flex justify-content-between align-items-center"
                      >
                        {{ driverData.email }}
                      </th>
                    </tr>
                    <tr>
                      <td>Date of Birth</td>
                      <th
                        class="d-flex justify-content-between align-items-center"
                      >
                        {{ driverData.dob }}
                      </th>
                    </tr>
                    <tr>
                      <td>Gender</td>
                      <th
                        class="d-flex justify-content-between align-items-center"
                      >
                        {{ driverData.gender }}
                      </th>
                    </tr>
                    <tr>
                      <td>Phone number</td>
                      <th
                        class="d-flex justify-content-between align-items-center"
                      >
                        {{ driverData.phone }}
                      </th>
                    </tr>
                  </tbody>
                </table>
              </table>
            </div>
          </div>
          <div class="col-sm-6 col-md-6">
            <div class="dataBox">
              <table>
                <table class="table table-responsive">
                  <tbody>
                    <tr>
                      <td>State of Origin</td>
                      <th
                        class="d-flex justify-content-between align-items-center"
                      >
                        {{ driverData.state }}
                      </th>
                    </tr>
                    <tr>
                      <td>National Identity Number</td>
                      <th
                        class="d-flex justify-content-between align-items-center"
                      >
                        {{ driverData.nin }}
                      </th>
                    </tr>
                    <tr>
                      <td>Residential Address</td>
                      <th
                        class="d-flex justify-content-between align-items-center"
                      >
                        {{ driverData.residential_address }}
                      </th>
                    </tr>
                    <tr>
                      <td>Nigerian</td>
                      <th
                        class="d-flex justify-content-between align-items-center"
                      >
                        {{ driverData.nigerian }}
                      </th>
                    </tr>
                    <tr>
                      <td>Ex-convict</td>
                      <th
                        class="d-flex justify-content-between align-items-center"
                      >
                        <!-- {{ driverData.ex - convict }} -->
                      </th>
                    </tr>
                  </tbody>
                </table>
              </table>
            </div>
          </div>
        </div>
      </div>
      <hr />
      <div class="container-fluid">
        <p class="titleText">
          Education Data
        </p>
        <div class="row">
          <div class="col-sm-6 col-md-6">
            <div class="dataBox">
              <table>
                <table class="table table-responsive">
                  <tbody>
                    <tr>
                      <td>Primary School</td>
                      <th
                        class="d-flex justify-content-between align-items-center"
                      >
                        {{ driverData.primary_school }}
                      </th>
                    </tr>
                    <tr>
                      <td>Address</td>
                      <th
                        class="d-flex justify-content-between align-items-center"
                      >
                        {{ driverData.primary_school_address }}
                      </th>
                    </tr>
                    <tr>
                      <td>Did you graduated?</td>
                      <th
                        class="d-flex justify-content-between align-items-center"
                      >
                        {{ driverData.graduated_primary }}
                      </th>
                    </tr>
                    <tr>
                      <td>Qualification</td>
                      <th
                        class="d-flex justify-content-between align-items-center"
                      >
                        {{ driverData.qualification_type_primary }}
                      </th>
                    </tr>
                  </tbody>
                </table>
              </table>
            </div>
          </div>
          <div class="col-sm-6 col-md-6">
            <div class="dataBox">
              <table>
                <table class="table table-responsive">
                  <tbody>
                    <tr>
                      <td>Secondary School</td>
                      <th
                        class="d-flex justify-content-between align-items-center"
                      >
                        {{ driverData.secondary_school }}
                      </th>
                    </tr>
                    <tr>
                      <td>Address</td>
                      <th
                        class="d-flex justify-content-between align-items-center"
                      >
                        {{ driverData.secondary_school_address }}
                      </th>
                    </tr>
                    <tr>
                      <td>Did you graduated?</td>
                      <th
                        class="d-flex justify-content-between align-items-center"
                      >
                        {{ driverData.graduated_secondary }}
                      </th>
                    </tr>
                    <tr>
                      <td>Qualification</td>
                      <th
                        class="d-flex justify-content-between align-items-center"
                      >
                        {{ driverData.qualification_type_secondary }}
                      </th>
                    </tr>
                  </tbody>
                </table>
              </table>
            </div>
          </div>
          <div class="col-sm-6 col-md-6">
            <div class="dataBox">
              <table>
                <table class="table table-responsive">
                  <tbody>
                    <tr>
                      <td>Tertiary School</td>
                      <th
                        class="d-flex justify-content-between align-items-center"
                      >
                        {{ driverData.tertiary_school }}
                      </th>
                    </tr>
                    <tr>
                      <td>Address</td>
                      <th
                        class="d-flex justify-content-between align-items-center"
                      >
                        {{ driverData.tertiary_school_address }}
                      </th>
                    </tr>
                    <tr>
                      <td>Did you graduated?</td>
                      <th
                        class="d-flex justify-content-between align-items-center"
                      >
                        {{ driverData.graduated_tertiary }}
                      </th>
                    </tr>
                    <tr>
                      <td>Qualification</td>
                      <th
                        class="d-flex justify-content-between align-items-center"
                      >
                        {{ driverData.qualification_type_tertiary }}
                      </th>
                    </tr>
                  </tbody>
                </table>
              </table>
            </div>
          </div>
        </div>
      </div>
      <hr />
      <div class="container-fluid">
        <p class="titleText">
          Relative Information
        </p>
        <div class="row">
          <div class="col-sm-6 col-md-6">
            <div class="dataBox">
              <table>
                <table class="table table-responsive">
                  <tbody>
                    <tr>
                      <td>Last name</td>
                      <th
                        class="d-flex justify-content-between align-items-center"
                      >
                        {{ driverData.relative_last_name }}
                      </th>
                    </tr>
                    <tr>
                      <td>First name</td>
                      <th
                        class="d-flex justify-content-between align-items-center"
                      >
                        {{ driverData.relative_first_name }}
                      </th>
                    </tr>
                    <tr>
                      <td>Relationship</td>
                      <th
                        class="d-flex justify-content-between align-items-center"
                      >
                        {{ driverData.relationship }}
                      </th>
                    </tr>
                    <tr>
                      <td>Date of birth</td>
                      <th
                        class="d-flex justify-content-between align-items-center"
                      >
                        {{ driverData.relative_date_of_birth }}
                      </th>
                    </tr>
                  </tbody>
                </table>
              </table>
            </div>
          </div>
          <div class="col-sm-6 col-md-6">
            <div class="dataBox">
              <table>
                <table class="table table-responsive">
                  <tbody>
                    <tr>
                      <td>Gender</td>
                      <th
                        class="d-flex justify-content-between align-items-center"
                      >
                        {{ driverData.relative_gender }}
                      </th>
                    </tr>
                    <tr>
                      <td>Phone</td>
                      <th
                        class="d-flex justify-content-between align-items-center"
                      >
                        {{ driverData.relative_phone }}
                      </th>
                    </tr>
                    <tr>
                      <td>Email</td>
                      <th
                        class="d-flex justify-content-between align-items-center"
                      >
                        {{ driverData.relative_email }}
                      </th>
                    </tr>
                    <tr>
                      <td>National Identity Number</td>
                      <th
                        class="d-flex justify-content-between align-items-center"
                      >
                        {{ driverData.relative_nin }}
                      </th>
                    </tr>
                  </tbody>
                </table>
              </table>
            </div>
          </div>
          <div class="col-sm-6 col-md-6">
            <div class="dataBox">
              <table>
                <table class="table table-responsive">
                  <tbody>
                    <tr>
                      <td>State</td>
                      <th
                        class="d-flex justify-content-between align-items-center"
                      >
                        {{ driverData.relative_state }}
                      </th>
                    </tr>
                    <tr>
                      <td>City</td>
                      <th
                        class="d-flex justify-content-between align-items-center"
                      >
                        {{ driverData.relative_city }}
                      </th>
                    </tr>
                    <tr>
                      <td>Residential address</td>
                      <th
                        class="d-flex justify-content-between align-items-center"
                      >
                        {{ driverData.relative_residential_address }}
                      </th>
                    </tr>
                    <tr>
                      <td>Qualification</td>
                      <th
                        class="d-flex justify-content-between align-items-center"
                      >
                        {{ driverData.qualification_type_tertiary }}
                      </th>
                    </tr>
                  </tbody>
                </table>
              </table>
            </div>
          </div>
        </div>
      </div>
      <hr />
      <div class="container-fluid">
        <p class="titleText">
          Work Experience
        </p>
        <div class="row">
          <div class="col-sm-6 col-md-6">
            <div class="dataBox">
              <table>
                <table class="table table-responsive">
                  <tbody>
                    <tr>
                      <td>Company name</td>
                      <th
                        class="d-flex justify-content-between align-items-center"
                      >
                        {{ driverData.driver_company }}
                      </th>
                    </tr>
                    <tr>
                      <td>Official Phone number</td>
                      <th
                        class="d-flex justify-content-between align-items-center"
                      >
                        {{ driverData.driver_company_official_phone_number }}
                      </th>
                    </tr>
                    <tr>
                      <td>Website</td>
                      <th
                        class="d-flex justify-content-between align-items-center"
                      >
                        {{ driverData.driver_company_website }}
                      </th>
                    </tr>
                    <tr>
                      <td>Supervisor name</td>
                      <th
                        class="d-flex justify-content-between align-items-center"
                      >
                        {{ driverData.driver_company_supervisor }}
                      </th>
                    </tr>
                    <tr>
                      <td>Supervisor contact</td>
                      <th
                        class="d-flex justify-content-between align-items-center"
                      >
                        {{ driverData.driver_company_supervisor_phone }}
                      </th>
                    </tr>
                  </tbody>
                </table>
              </table>
            </div>
          </div>
          <div class="col-sm-6 col-md-6">
            <div class="dataBox">
              <table>
                <table class="table table-responsive">
                  <tbody>
                    <tr>
                      <td>Job title</td>
                      <th
                        class="d-flex justify-content-between align-items-center"
                      >
                        {{ driverData.driver_job_title }}
                      </th>
                    </tr>
                    <tr>
                      <td>Lenght of work</td>
                      <th
                        class="d-flex justify-content-between align-items-center"
                      >
                        {{ driverData.driver_work_lenght }}
                      </th>
                    </tr>
                    <tr>
                      <td>Reason for leaving</td>
                      <th
                        class="d-flex justify-content-between align-items-center"
                      >
                        {{ driverData.driver_reason_for_leaving }}
                      </th>
                    </tr>
                    <tr>
                      <td>Contact company for reference</td>
                      <th
                        class="d-flex justify-content-between align-items-center"
                      >
                        {{ driverData.contact_company_for_reference }}
                      </th>
                    </tr>
                  </tbody>
                </table>
              </table>
            </div>
          </div>
        </div>
      </div>
      <hr />
      <div class="container-fluid">
        <p class="titleText">
          Bank Information
        </p>
        <div class="row">
          <div class="col-sm-6 col-md-6">
            <div class="dataBox">
              <table>
                <table class="table table-responsive">
                  <tbody>
                    <tr>
                      <td>Bank name</td>
                      <th
                        class="d-flex justify-content-between align-items-center"
                      >
                        {{ driverData.driver_bank_name }}
                      </th>
                    </tr>
                    <tr>
                      <td>Account number</td>
                      <th
                        class="d-flex justify-content-between align-items-center"
                      >
                        {{ driverData.driver_account_number }}
                      </th>
                    </tr>
                    <tr>
                      <td>Account name</td>
                      <th
                        class="d-flex justify-content-between align-items-center"
                      >
                        {{ driverData.driver_account_name }}
                      </th>
                    </tr>
                    <tr>
                      <td>Bank verification number</td>
                      <th
                        class="d-flex justify-content-between align-items-center"
                      >
                        {{ driverData.driver_bvn }}
                      </th>
                    </tr>
                    <tr>
                      <td>Supervisor contact</td>
                      <th
                        class="d-flex justify-content-between align-items-center"
                      >
                        {{ driverData.driver_company_supervisor_phone }}
                      </th>
                    </tr>
                  </tbody>
                </table>
              </table>
            </div>
          </div>
        </div>
      </div>
    </main>
    <div class="topMain"></div>
  </div>
</template>
<script>
import Sidebar from './sidebar.vue'
export default {
  components: {
    Sidebar,
  },
  data() {
    return {
      currentUser: {},
      token: localStorage.getItem('token'),
      driverData: {},
      tokenAvatar: '',
    }
  },

  methods: {
    getDriver() {
      axios
        .get('/api/driver/' + this.$route.params.id)
        .then((response) => {
          this.driverData = response.data
        })
        .catch((errors) => {
          console.log(errors)
        })
    },
  },
  mounted() {
    this.tokenAvatar = window.Laravel.csrfToken
    window.axios.defaults.headers.common[
      'Authorization'
    ] = `Bearer ${this.token}`
    this.getDriver()
    axios
      .get('api/user')
      .then((response) => {
        this.currentUser = response.data
      })
      .catch((errors) => {
        console.log(errors)
      })
  },
}
</script>
<style>
.dataBox {
  padding: 10px;
  width: 100%;
  height: auto;
  display: flex;
  justify-content: center;
  align-items: center;
}

.dataBox img {
  width: 100%;
  height: 100%;
}
.titleText {
  font-size: 15px;
  font-weight: bold;
  color: gray;
  padding: 15px;
}
</style>
