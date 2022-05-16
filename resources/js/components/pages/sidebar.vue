<template>
  <div>
    <div class="upBox">
      <img :src="'../img/brekete_logo.png'" alt="" />
    </div>
  <div class="sidebar">
    <div class="logo_section">
      <img :src="'../img/logo.png'" alt="" />
      <span style="margin-left: 15px">Data Console</span>
    </div>
    <ul class="links_section">
      <li>
        <router-link to="/" class="active" aria-current="page">
          <Icon type="ios-albums" />
          <span class="m-3">Dashboard</span>
        </router-link>
      </li>
      <li>
        <router-link to="/user-management">
          <Icon type="md-people" />
          <span class="m-3">User Management</span>
        </router-link>
      </li>
      <li>
        <router-link to="/vehicle-management">
          <Icon type="md-car" />
          <span class="m-3">Vehicle Management</span>
        </router-link>
      </li>
      <li>
        <router-link to="/admin">
          <Icon type="md-person" />
          <span class="m-3">Administrator</span>
        </router-link>
      </li>
      <li @click="logout" class="sideExit text-danger">
        <router-link to="/logout">
          <Icon type="md-exit" />
          <span class="m-3">Log out</span>
        </router-link>
      </li>
    </ul>
    <!-- <div class="exitbtn_section" @click="logout"> -->
      <!-- <router-link to=""> -->
      <!-- <Icon type="md-exit" /> -->
      <!-- <span class="m-3">Log out</span> -->
      <!-- </router-link> -->
    <!-- </div> -->
  </div>
  </div>
</template>
<script>
export default {
  data() {
    return {}
  },
  methods: {
    logout() {
      axios
        .post('api/logout')
        .then((response) => {
          localStorage.removeItem('token')
          this.$router.push('/login')
        })
        .catch((errors) => {
          console.log(errors)
        })
    },
  },
  //   mounted() {
  //     this.tokenAvatar = window.Laravel.csrfToken
  //     window.axios.defaults.headers.common[
  //       'Authorization'
  //     ] = `Bearer ${this.token}`
  //     axios
  //       .get('api/user')
  //       .then((response) => {
  //         this.currentUser = response.data
  //       })
  //       .catch((errors) => {
  //         console.log(errors)
  //       })
  //   },
}
</script>
<style>
.sidebar .router-link-exact-active {
  color: #000;
  font-weight: bold;
}
.sidebar a {
  color: rgba(128, 128, 128, 0.644);
  padding: 15px;
  width: 100%;
}
.sidebar {
  background: #fff;
  width: 20%;
  height: 80vh;
  z-index: 20;
  position: fixed;
  left: 75px;
  box-shadow: 0px 8px 12px rgba(218, 218, 218, 0.5);
  border-radius: 6px;
}
.logo_section {
  height: 20%;
  display: flex;
  justify-content: center;
  align-items: center;
  font-size: 18px;
}
.links_section {
  height: 70%;
  list-style: none;
  font-size: 15px;
  width: 100%;
}
.links_section li {
  display: flex;
  justify-content: center;
  margin-bottom: 15px;
  width: 100%;
}
.exitbtn_section {
  height: 10%;
  display: flex;
  align-items: center;
  font-size: 15px;
  font-weight: bold;
  color: red;
  padding: 0 14px;
  cursor: pointer;
}
.logo_section img {
  width: 70px;
  height: 70px;
}

@media screen and (max-width: 700px) {
  .exitbtn_section{
    display: none;
  }
  .sidebar {
    width: 100%;
    left: 0;
    border-radius: 0px;
    font-size: 60px;
    height: 60px;
    box-shadow: unset;
    border-right: 1px solid rgba(128, 128, 128, 0.247);
    position: fixed;
    bottom: 0;
    left: 0;
    display: flex;
    background: #f5f5f5;
    top: unset;
    justify-content: space-evenly;
    align-items: center;
  }
  .links_section {
    display: flex;
  }
  .links_section li {
    margin-bottom: unset;
    margin-top: 1px;
    font-size: 30px;
  }
  .exitbtn_section {
    display: none;
    align-items: center;
    justify-content: center;
    padding: unset;
  }
  .sidebar span {
    display: none !important;
  }
  .sidebar a {
    color: grey;
    padding: unset;
    width: unset;
  }
  .logo_section {
    display: none;
  }
  .sideExit{
    display: block;
  }
}
</style>
