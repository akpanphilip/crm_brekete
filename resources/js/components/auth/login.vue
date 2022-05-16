<template>
  <div class="form_box">
    <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-5">
        <div class="form">
          <div class="logoBox">
            <img :src="'../img/logo.png'" alt="" />
          </div>
          <div class="form-group mb-4">
            <label>
              EMAIL ADDRESS
              <span class="text-danger">*</span>
            </label>
            <input
              type="text"
              class="form-control"
              name="email"
              v-model="formData.email"
            />
            <small class="text-danger" v-if="errors && errors.email">
              {{ errors.email[0] }}
            </small>
          </div>
          <div class="form-group mb-4">
            <label>
              PASSWORD
              <span class="text-danger">*</span>
            </label>
            <input
              type="password"
              class="form-control"
              name="password"
              v-model="formData.password"
            />
            <small class="text-danger" v-if="errors && errors.password">
              {{ errors.password[0] }}
            </small>
          </div>
          <div class="form-group">
            <button class="btn btn-dark text-light loginBtn" @click="login">
              <span v-if="!loading">Login</span>
              <span v-else>Loading...</span>
            </button>
          </div>
          <div class="form-group d-flex justify-content-end">
            <router-link to="/forgotpwd" class="mt-2">
              forgot password?
            </router-link>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      formData: {
        email: '',
        password: '',
        device_name: 'browser',
      },
      errors: {},
      loading: false,
    }
  },
  methods: {
    login() {
      this.loading = true
      setTimeout(() => {
        this.loading = false
      }, 2000)
      axios
        .post('api/login', this.formData)
        .then((response) => {
          localStorage.setItem('token', response.data)
          this.$router.push('/')
        })
        .catch((errors) => {
          this.errors = errors.response.data.errors
        })
    },
  },
}
</script>
<style>
.form_box{
    height: 100vh;
    display: flex;
    align-items: center;
}
.form {
  width: 100%;
  height: auto;
  /*box-shadow: 0 0 10px 3px #0505054b;*/
  border-radius: 12px;
  padding: 18px;
}
.form label {
  font-weight: bold;
}
.form a {
  text-decoration: none;
}
.loginBtn {
  width: 100%;
}
.logoBox {
  height: 160px;
  margin-bottom: 15px;
  display: flex;
  justify-content: center;
  align-items: center;
}
.logoBox img {
  width: 150px;
  height: 150px;
}
</style>
