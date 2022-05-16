<template>
  <div>
    <div class="upBox">
      <img :src="'../img/brekete_logo.png'" alt="" />
    </div>
    <div class="main">
      <Sidebar class="sidebar_section" />
      <main class="main_section">
        <div class="container-fluid">
          <div class="row g-3">
            <div class="col-sm-6 col-md-3">
              <div class="info active">
                <div class="leftInfo">
                  <div class="iconBox">
                    <img :src="'../img/user1.png'" alt="" />
                  </div>
                </div>
                <div class="rightInfo align-items-end">
                  <span class="title_info p-20">Total Users</span>
                  <span class="value p-20"></span>
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-md-3">
              <div class="info">
                <div class="leftInfo">
                  <div class="otherBox">
                    <img :src="'../img/user1.png'" alt="" />
                  </div>
                </div>
                <div class="rightInfo align-items-end">
                  <span class="title_info p-20">All Sponsors</span>
                  <span class="value p-20">{{ sponsors.length }}</span>
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-md-3">
              <div class="info">
                <div class="leftInfo">
                  <div class="otherBox">
                    <img :src="'../img/user1.png'" alt="" />
                  </div>
                </div>
                <div class="rightInfo align-items-end">
                  <span class="title_info p-20">All Drivers</span>
                  <span class="value p-20">{{ drivers.length }}</span>
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-md-3">
              <div class="info">
                <div class="leftInfo">
                  <div class="otherBox">
                    <img :src="'../img/user1.png'" alt="" />
                  </div>
                </div>
                <div class="rightInfo align-items-end">
                  <span class="title_info p-20">All Guarantors</span>
                  <span class="value p-20">{{ guarantors.length }}</span>
                </div>
              </div>
            </div>
          </div>
          <ul class="table_links text-capitalize font-weight-bold">
            <li class="driverLink" @click="driverbtn">ALL USERS</li>
            <li class="driverLink activeLink" @click="driverbtn">DRIVERS</li>
            <li class="sponsorLink" @click="sponsorbtn">SPONSORS</li>
            <li class="guarantorLink" @click="guarantorbtn">GUARANTORS</li>
          </ul>
          <div class="card shadow mb-4 mt-4">
            <div class="card-body">
              <div>
                <div class="d-flex justify-content-end dropAddBtn">
                  <Dropdown>
                    <a href="javascript:void(0)">
                      <button class="addUser">
                        ADD NEW USER
                      </button>
                    </a>
                    <DropdownMenu slot="list">
                      <DropdownItem>
                        <router-link to="sponsor-capturing">
                          SPONSOR
                        </router-link>
                      </DropdownItem>
                      <DropdownItem>
                        <router-link to="driver-capturing">DRIVER</router-link>
                      </DropdownItem>
                    </DropdownMenu>
                  </Dropdown>
                </div>
                <div class="table-responsive" v-show="guarantors_tbl">
                  <table class="table" id="dataTableGuarantors">
                    <thead>
                      <tr>
                        <th></th>
                        <th>USER ID</th>
                        <th>NAME</th>
                        <th>CONTACT</th>
                        <th>USER TYPE</th>
                        <th>STATUS</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr v-for="(guarantor, i) in guarantors" :key="i">
                        <td>
                          <input style="opacity: 0.5;" type="checkbox" />
                        </td>
                        <td>
                          <router-link
                            :to="{
                              name: 'guarantorInfo',
                              params: { id: guarantor.id },
                            }"
                          >
                            {{ guarantor.driver_id }}
                          </router-link>
                        </td>
                        <td>
                          {{ guarantor.last_name }} {{ guarantor.first_name }}
                        </td>
                        <td class="d-flex flex-column">
                          {{ guarantor.phone_number }}
                          <span class="subInfo">{{ guarantor.email }}</span>
                        </td>
                        <td>{{ guarantor.userType }}</td>
                        <td>
                          <span class="registeredSpan">Registered</span>
                        </td>
                        <td>
                          <Dropdown>
                            <a href="javascript:void(0)">
                              <Icon
                                type="md-more"
                                size="23"
                                style="color: black;"
                              />
                            </a>
                            <DropdownMenu slot="list">
                              <DropdownItem>
                                Edit
                              </DropdownItem>
                              <DropdownItem>
                                Delete
                              </DropdownItem>
                            </DropdownMenu>
                          </Dropdown>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <div class="table-responsive" v-show="drivers_tbl">
                  <table
                    id="dataTableDrivers"
                    class="table table-bordered"
                    width="100%"
                    cellspacing="0"
                  >
                    <thead>
                      <tr>
                        <th>S/N</th>
                        <th>USER ID</th>
                        <th>NAME</th>
                        <th>CONTACT</th>
                        <th>USER TYPE</th>
                        <th>STATUS</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr v-for="(driver, i) in drivers" :key="i">
                        <td>
                          <input style="opacity: 0.5;" type="checkbox" />
                        </td>
                        <td>
                          <router-link
                            :to="{
                              name: 'DriverInfo',
                              params: { id: driver.id },
                            }"
                          >
                            {{ driver.driver_id }}
                          </router-link>
                        </td>
                        <td>{{ driver.last_name }} {{ driver.first_name }}</td>
                        <td class="d-flex flex-column">
                          {{ driver.phone }}
                          <span class="subInfo">{{ driver.email }}</span>
                        </td>
                        <td>{{ driver.userType }}</td>
                        <td><span class="registeredSpan">Registered</span></td>
                        <td>
                          <Dropdown>
                            <a href="javascript:void(0)">
                              <Icon type="md-more" size="23"
                                style="color: black;" />
                            </a>
                            <DropdownMenu slot="list">
                              <DropdownItem>
                                Edit
                              </DropdownItem>
                              <DropdownItem>
                                Delete
                              </DropdownItem>
                            </DropdownMenu>
                          </Dropdown>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <div class="table-responsive" v-show="sponsors_tbl">
                  <table class="table" id="dataTable1">
                    <thead>
                      <tr>
                        <th></th>
                        <th>USER ID</th>
                        <th>NAME</th>
                        <th>CONTACT</th>
                        <th>USER TYPE</th>
                        <th>STATUS</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr v-for="(sponsor, i) in sponsors" :key="i">
                        <td>
                          <input style="opacity: 0.5;" type="checkbox" />
                        </td>
                        <td>
                          <router-link
                            :to="{
                              name: 'SponsorInfo',
                              params: { id: sponsor.id },
                            }"
                          >
                            {{ sponsor.sponsor_id }}
                          </router-link>
                        </td>
                        <td>
                          {{ sponsor.last_name }} {{ sponsor.first_name }}
                        </td>
                        <td class="d-flex flex-column">
                          {{ sponsor.phone }}
                          <span class="subInfo">{{ sponsor.email }}</span>
                        </td>
                        <td>{{ sponsor.userType }}</td>
                        <td>
                          <span class="registeredSpan">Registered</span>
                        </td>
                        <td>
                          <Dropdown>
                            <a href="javascript:void(0)">
                              <Icon
                                type="md-more"
                                size="23"
                                style="color: black;"
                              />
                            </a>
                            <DropdownMenu slot="list">
                              <DropdownItem>
                                Edit
                              </DropdownItem>
                              <DropdownItem>
                                Delete
                              </DropdownItem>
                            </DropdownMenu>
                          </Dropdown>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </main>
      <div class="topMain"></div>
    </div>
  </div>
</template>
<script>
import DatatableFactory from 'vuejs-datatable'
import Sidebar from './sidebar.vue'
export default {
  components: {
    Sidebar,
    DatatableFactory,
  },
  data() {
    return {
      guarantors_tbl: false,
      sponsors_tbl: false,
      drivers_tbl: {},
      single: false,
      userType: false,
      guarantors: {},
      sponsors: {},
      drivers: {},
      currentUser: {},
      token: localStorage.getItem('token'),
      title: 'Tile Lists',
      datas: [],
    }
  },
  created: function () {
    this.danhsach_user()
  },
  methods: {
    getSponsors() {
      axios.get('api/sponsors').then((response) => {
        this.sponsors = response.data
        setTimeout(() => $('#dataTable1').DataTable(), 1000)
      })
    },
    getGuarantors() {
      axios
        .get('/api/guarantors')
        .then((response) => {
          this.guarantors = response.data
          setTimeout(() => $('#dataTableGuarantors').DataTable(), 1000)
        })
        .catch((errors) => {
          console.log(errors)
        })
    },
    getDrivers() {
      axios
        .get('/api/drivers')
        .then((response) => {
          this.drivers = response.data
          setTimeout(() => $('#dataTableDrivers').DataTable(), 1000)
        })
        .catch((errors) => {
          console.log(errors)
        })
    },
    sponsorbtn() {
      let sponsorBtn = document.querySelector('.sponsorLink')
      let guarantorBtn = document.querySelector('.guarantorLink')
      let driverBtn = document.querySelector('.driverLink')

      sponsorBtn.classList.add('activeLink')
      guarantorBtn.classList.remove('activeLink')
      driverBtn.classList.remove('activeLink')

      this.guarantors_tbl = false
      this.sponsors_tbl = true
      this.drivers_tbl = false
    },
    driverbtn() {
      let sponsorBtn = document.querySelector('.sponsorLink')
      let guarantorBtn = document.querySelector('.guarantorLink')
      let driverBtn = document.querySelector('.driverLink')

      sponsorBtn.classList.remove('activeLink')
      guarantorBtn.classList.remove('activeLink')
      driverBtn.classList.add('activeLink')
      this.guarantors_tbl = false
      this.sponsors_tbl = false
      this.drivers_tbl = true
    },
    guarantorbtn() {
      let sponsorBtn = document.querySelector('.sponsorLink')
      let guarantorBtn = document.querySelector('.guarantorLink')
      let driverBtn = document.querySelector('.driverLink')

      sponsorBtn.classList.remove('activeLink')
      guarantorBtn.classList.add('activeLink')
      driverBtn.classList.remove('activeLink')

      this.guarantors_tbl = true
      this.sponsors_tbl = false
      this.drivers_tbl = false
    },
  },
  mounted() {
    window.axios.defaults.headers.common[
      'Authorization'
    ] = `Bearer ${this.token}`
    this.getGuarantors()
    this.getDrivers()
    this.getSponsors()
    // this.danhsach_user()
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
.table_links {
  width: 100%;
  display: flex;
  list-style: none;
  justify-content: space-between;
  border-bottom: 2px solid #c6c2de;
}
.table_links li {
  margin-bottom: -1px;
}
table {
  text-align: center;
}
.wbg {
  background: #fff;
  width: 95%;
  float: left;
}
td img {
  width: 150px;
  height: 150px;
}
.table_links li {
  padding: 15px 0;
}
.activeLink {
  border-bottom: 2px solid;
  font-weight: bold;
  margin-bottom: -1px;
}
.alluserLink,
.sponsorLink,
.guarantorLink,
.driverLink {
  cursor: pointer;
}
.registeredSpan {
  background: #fff8e0;
  color: #f2994a;
  padding: 7px 10px;
  border-radius: 24px;
}
table thead {
  background: #e5e5e5;
}
table td {
  font-weight: bold;
  align-items: center;
  border-top: unset !important;
}
.subInfo {
  font-size: 10px;
  color: #bebaba;
}
.addUser {
  background: #4a4aff;
  color: white;
  padding: 10px 27px;
  border: none;
}
.dropAddBtn {
  margin: 5px 0;
}
</style>
