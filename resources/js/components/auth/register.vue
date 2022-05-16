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
                FULL NAME
                <span class="text-danger">*</span>
              </label>
              <input
                type="text"
                class="form-control"
                name="email"
                v-model="formData.name"
              />
              <small class="text-danger" v-if="errors && errors.name">
                {{ errors.name[0] }}
              </small>
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
            <div class="row">
              <div class="col-sm-6 col-md-6">
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
              </div>
              <div class="col-sm-6 col-md-6">
                <div class="form-group mb-4">
                  <label>
                    CONFIRM PASSWORD
                    <span class="text-danger">*</span>
                  </label>
                  <input
                    type="password"
                    class="form-control"
                    name="password"
                    v-model="formData.password_confirmation"
                  />
                  <small
                    class="text-danger"
                    v-if="errors && errors.password_confirmation"
                  >
                    {{ errors.password_confirmation[0] }}
                  </small>
                </div>
              </div>
            </div>
            <div class="form-group">
              <button
                class="btn btn-dark text-light loginBtn"
                @click="register"
              >
                <span v-if="!loading">Sign Up</span>
                <span v-else>Loading...</span>
              </button>
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
        name: '',
        email: '',
        password: '',
        password_confirmation: '',
      },
      errors: {},
      loading: false,
    }
  },
  methods: {
    register() {
      this.loading = true
      setTimeout(() => {
        this.loading = false
      }, 2000)
      axios
        .post('api/register', this.formData)
        .then((response) => {
          console.log(response.data)
          this.formData.name = this.formData.email = this.formData.password = this.formData.password_confirmation =
            ''
          this.errors = {}
          this.$router.push('/login')
          this.$toaster.success(
            'account created successfully, now you can login!',
          )
        })
        .catch((errors) => {
          this.errors = errors.response.data.errors
          console.log(errors.response.data.errors)
        })
    },
  },
}
</script>
