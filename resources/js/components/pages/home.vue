<template>
  <div>
    <div class="upBox">
      <img :src="'../img/brekete_logo.png'" alt="" />
    </div>
    <div class="main">
      <Sidebar class="sidebar_section" />
      <main class="main_section">
        <Icon type="ios-menu" class="sideBtn d-none" />
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
          <div class="row g-3 mt-1">
            <div class="col-sm-6 col-md-6">
              <div class="info">
                <div class="leftInfo">
                  <div class="orangeBox">
                    <img :src="'../img/user2.png'" alt="" />
                  </div>
                </div>
                <div class="rightInfo align-items-end">
                  <span class="title_info p-20 orangeBox-text">Registered Drivers</span>
                  <span class="value p-20">{{ drivers.length }}</span>
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-md-6">
              <div class="info">
                <div class="leftInfo">
                  <div class="greenBox">
                    <img :src="'../img/user3.png'" alt="" />
                  </div>
                </div>
                <div class="rightInfo align-items-end">
                  <span class="title_info p-20 greenBox-text">Integrated Drivers</span>
                  <span class="value p-20">{{ drivers.length }}</span>
                </div>
              </div>
            </div>
          </div>
          <div></div>
        </div>
      </main>
      <div class="topMain">
        <span class="text-light p-3"></span>
      </div>
    </div>
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
      sponsors: {},
      guarantors: {},
      drivers: {},
      currentUser: {},
      token: localStorage.getItem('token'),
    }
  },

  methods: {
    getGuarantors() {
      axios
        .get('/api/guarantors')
        .then((response) => {
          this.guarantors = response.data
          $('#datatable').DataTable()
        })
        .catch((errors) => {
          console.log(errors)
        })
    },
    getSponsors() {
      axios
        .get('/api/sponsors')
        .then((response) => {
          this.sponsors = response.data
          $('#datatable').DataTable()
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
          $('#datatable').DataTable()
        })
        .catch((errors) => {
          console.log(errors)
        })
    },
    // getCars() {
    //   axios
    //     .get('api/cars')
    //     .then((response) => {
    //       this.cars = response.data
    //     })
    //     .catch((errors) => {
    //       console.log(errors)
    //     })
    // },
    // storeCars(){
    //     axios
    //     .post('api/store_cars')
    //     .then((response) => {
    //       console.log(response.data)
    //       this.errors = {}
    //     })
    //     .catch((errors) => {
    //       this.errors = errors.response.data.errors
    //       console.log(errors.response.data.errors)
    //     })
    // }
  },
  mounted() {
    window.axios.defaults.headers.common[
      'Authorization'
    ] = `Bearer ${this.token}`
    this.getGuarantors()
    this.getSponsors()
    this.getDrivers()
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
.upBox {
  height: 65px;
  background: #ffffff;
  display: flex;
  align-items: center;
  position: fixed;
  left: 0;
  width: 100%;
}
.upBox img {
  padding-left: 50px;
}
/*
.sideBtn {
  position: absolute;
  top: -40px;
  left: 5px;
  font-size: 40px;
}

*/
.main {
  width: 100%;
  display: flex;
  justify-content: space-between;
  align-items: flex-start;
  padding: 36px 40px;
  position: absolute;
  top: 60px;
}
.main_section {
    overflow: hidden !important;
  padding-bottom: 90px;
  height: auto;
  width: 70% !important;
  z-index: 10;
  position: absolute;
  right: 60px;
  box-shadow: 0px 8px 12px rgba(218, 218, 218, 0.5);
  border-radius: 6px;
}
.info {
  width: 100%;
  height: 100px;
  border-radius: 10px;
  display: flex;
  justify-content: center;
  align-items: center;
  box-shadow: 0px 12.9315px 25.8631px rgba(196, 196, 196, 0.14);
  border: 1px solid #eeeeee;
}
.info.active {
  background: #2d9cdb;
}
.leftInfo,
.rightInfo {
  height: 100%;
  width: 50%;
  color: #050505;
}
.iconBox {
  width: 70px;
  height: 70px;
  display: flex;
  justify-content: center;
  align-items: center;
  border-radius: 50px;
  background: #77bfe9;
}
.otherBox {
  width: 70px;
  height: 70px;
  display: flex;
  justify-content: center;
  align-items: center;
  border-radius: 50px;
  background: #e5e5e5;
}
.orangeBox {
  width: 70px;
  height: 70px;
  display: flex;
  justify-content: center;
  align-items: center;
  border-radius: 50px;
  background: #ecb17c;
}

.orangeBox-text{
    color: #f2994a;
}
.greenBox {
  background: #7fecad;
  width: 70px;
  height: 70px;
  display: flex;
  justify-content: center;
  align-items: center;
  border-radius: 50px;
}
.greenBox-text{
    color: #27ae60;
}
.leftInfo {
  display: flex;
  justify-content: center;
  align-items: center;
  font-size: 75px;
}
.rightInfo {
  display: flex;
  justify-content: center;
  flex-direction: column;
}
.title_info {
  font-size: 14px;
}
.value {
  font-size: 27px;
}
.topMain {
  position: fixed;
  top: 64px;
  left: 0;
  height: 120px;
  width: 100%;
  /*background: #00b775; */
}
.p-20{
    padding-right: 20px;
}
.topMain img {
  width: 30px;
  height: 30px;
  margin-top: 12px;
}
@media screen and (max-width: 700px) {
  .main_section {
    width: 100%;
    right: 0;
  }
  .main {
    padding: 15px 2px;
  }
  .title_info {
    font-size: 17px;
  }
  .value {
    font-size: 20px;
  }
}
</style>
