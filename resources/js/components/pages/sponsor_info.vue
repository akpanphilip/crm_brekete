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
              <img :src="sponsorData.photo" alt="" />
            </div>
          </div>
          <div class="col-sm-6 col-md-4">
            <div class="dataBox">
              <table>
                <table class="table table-responsive">
                  <tbody>
                    <tr>
                      <td>Full Name</td>
                      <th
                        class="d-flex justify-content-between align-items-center"
                      >
                        {{ sponsorData.last_name }}
                        {{ sponsorData.first_name }}
                      </th>
                    </tr>
                    <tr>
                      <td>Email</td>
                      <th
                        class="d-flex justify-content-between align-items-center"
                      >
                        {{ sponsorData.email }}
                      </th>
                    </tr>
                    <tr>
                      <td>Date of Birth</td>
                      <th
                        class="d-flex justify-content-between align-items-center"
                      >
                        {{ sponsorData.dob }}
                      </th>
                    </tr>
                    <tr>
                      <td>Gender</td>
                      <th
                        class="d-flex justify-content-between align-items-center"
                      >
                        {{ sponsorData.gender }}
                      </th>
                    </tr>
                    <tr>
                      <td>Phone number</td>
                      <th
                        class="d-flex justify-content-between align-items-center"
                      >
                        {{ sponsorData.phone }}
                      </th>
                    </tr>
                  </tbody>
                </table>
              </table>
            </div>
          </div>
          <div class="col-sm-6 col-md-4">
            <div class="dataBox">
              <table>
                <table class="table table-responsive">
                  <tbody>
                    <tr>
                      <td>State of Origin</td>
                      <th
                        class="d-flex justify-content-between align-items-center"
                      >
                        {{ sponsorData.state }}
                      </th>
                    </tr>
                    <tr>
                      <td>National Identity Number</td>
                      <th
                        class="d-flex justify-content-between align-items-center"
                      >
                        {{ sponsorData.nin }}
                      </th>
                    </tr>
                    <tr>
                      <td>Residential Address</td>
                      <th
                        class="d-flex justify-content-between align-items-center"
                      >
                        {{ sponsorData.residential_address }}
                      </th>
                    </tr>
                    <tr>
                      <td>Nigerian</td>
                      <th
                        class="d-flex justify-content-between align-items-center"
                      >
                        {{ sponsorData.nigerian }}
                      </th>
                    </tr>
                    <tr>
                      <td>Ex-convict</td>
                      <th
                        class="d-flex justify-content-between align-items-center"
                      >
                        <!-- {{ sponsorData.ex - convict }} -->
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
          <div class="col-sm-6 col-md-12">
            <div class="dataBox">
              <table>
                <table class="table table-responsive">
                  <tbody>
                    <tr>
                      <td>Bank name</td>
                      <th
                        class="d-flex justify-content-between align-items-center"
                      >
                        {{ sponsorData.bank_name }}
                      </th>
                    </tr>
                    <tr>
                      <td>Account number</td>
                      <th
                        class="d-flex justify-content-between align-items-center"
                      >
                        {{ sponsorData.account_number }}
                      </th>
                    </tr>
                    <tr>
                      <td>Account name</td>
                      <th
                        class="d-flex justify-content-between align-items-center"
                      >
                        {{ sponsorData.account_name }}
                      </th>
                    </tr>
                    <tr>
                      <td>Bank verification number</td>
                      <th
                        class="d-flex justify-content-between align-items-center"
                      >
                        {{ sponsorData.bvn }}
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
      sponsorData: {},
      tokenAvatar: '',
    }
  },

  methods: {
    getSponsor() {
      axios
        .get('/api/sponsor/' + this.$route.params.id)
        .then((response) => {
          this.sponsorData = response.data
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
    this.getSponsor()
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
