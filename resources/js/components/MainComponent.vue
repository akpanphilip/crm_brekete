<template>
    <div>
        <router-view></router-view>
    </div>
</template>
<script>
export default {
  data() {
    return {
      currentUser: {},
      token: localStorage.getItem('token'),
    }
  },
  methods: {
    logout() {
      axios
        .post('api/logout')
        .then((response) => {
          localStorage.removeItem('token')
          this.$router.push('/login')
          location.reload()
        })
        .catch((errors) => {
          console.log(errors)
        })
    },
  },
  mounted() {
    window.axios.defaults.headers.common[
      'Authorization'
    ] = `Bearer ${this.token}`
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
