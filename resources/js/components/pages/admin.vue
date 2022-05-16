<template>
  <div class="main">
    <Sidebar class="sidebar_section" />
    <main class="main_section">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-6 col-md-6 col-lg-3">
            <div class="user-section">
              <div class="userImg">
                <img :src="'../img/user.png'" alt="" />
              </div>
              <Button type="success" @click="updateImageModal = true">
                update profile image
              </Button>
              <!-- update image modal -->
              <Modal
                v-model="updateImageModal"
                title="UPDATE PICTURE"
                :mask-closable="false"
                :closable="false"
              >
                <!-- frontend image validation -->
                <Upload
                  type="drag"
                  :headers="{ 'x-csrf-token': tokenAvatar }"
                  :on-success="handleSuccess"
                  :max-size="2048"
                  :format="['jpg', 'jpeg', 'png']"
                  :on-exceeded-size="handleMaxSize"
                  :on-format-error="handleFormatError"
                  ref="uploads"
                  action="/api/update_avatar"
                  class="mt-2"
                >
                  <div style="padding: 20px 0;">
                    <Icon
                      type="ios-cloud-upload"
                      size="52"
                      style="color: #3399ff;"
                    ></Icon>
                    <p>Click or drag files here to upload</p>
                  </div>
                </Upload>
                <div slot="footer">
                  <Button type="default" @click="updateImageModal = false">
                    CLOSE
                  </Button>
                  <Button type="success" @click="updateAvatar">
                    SUBMIT
                  </Button>
                </div>
              </Modal>

              <!-- end update image modal -->
            </div>
          </div>
          <div class="col-sm-6 col-md-6 col-lg-6">
            <div class="table-section">
              <table class="table table-responsive">
                <tbody>
                  <tr>
                    <td>Name</td>
                    <th
                      class="d-flex justify-content-between align-items-center"
                    >
                      {{ currentUser.name }}
                      <Icon
                        type="ios-create-outline"
                        size="30"
                        @click="editNameModal = true"
                        style="cursor: pointer;"
                      />
                    </th>
                    <!-- editnamemodal -->
                    <Modal
                      v-model="editNameModal"
                      title="EDIT FULL NAME"
                      :mask-closable="false"
                      :closable="false"
                      :width="600"
                      :styles="{ top: '20px' }"
                    >
                      <div class="form-group">
                        <label class="text-dark mb-2">FULL NAME</label>
                        <input
                          name="phone"
                          class="form-control"
                          v-model="currentUser.name"
                        />
                        <small class="text-danger" v-if="errors && errors.name">
                          {{ errors.name[0] }}
                        </small>
                      </div>
                      <div slot="footer">
                        <Button @click="editNameModal = false">
                          CLOSE
                        </Button>
                        <Button @click="editName" type="success">
                          SUBMIT
                        </Button>
                      </div>
                    </Modal>
                    <!-- end of modal -->
                  </tr>
                  <tr>
                    <td>Email</td>
                    <th
                      class="d-flex justify-content-between align-items-center"
                    >
                      {{ currentUser.email }}
                      <Icon
                        type="ios-create-outline"
                        size="30"
                        @click="editEmailModal = true"
                        style="cursor: pointer;"
                      />
                    </th>
                  </tr>
                  <!-- edit email modal -->
                  <Modal
                    v-model="editEmailModal"
                    title="EDIT EMAIL ADDRESS"
                    :mask-closable="false"
                    :closable="false"
                    :width="600"
                    :styles="{ top: '20px' }"
                  >
                    <div class="form-group">
                      <label class="text-dark mb-2">EMAIL ADDRESS</label>
                      <input
                        name="email"
                        class="form-control"
                        v-model="currentUser.email"
                      />
                      <small class="text-danger" v-if="errors && errors.email">
                        {{ errors.email[0] }}
                      </small>
                    </div>
                    <div slot="footer">
                      <Button @click="editEmailModal = false">
                        CLOSE
                      </Button>
                      <Button @click="editEmail" type="success">
                        SUBMIT
                      </Button>
                    </div>
                  </Modal>
                  <!-- end of edit email modal -->
                  <tr>
                    <td>Role</td>
                    <th>Admin</th>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
          <div class="col-sm-6 col-md-6 col-lg-3">
            <div class="addAdminSec">
              <Button type="success" @click="addAdminModal = true">
                ADD ADMIN
              </Button>
              <Modal
                v-model="addAdminModal"
                title="REGISTER AN ADMIN"
                :mask-closable="false"
                :closable="false"
                :width="600"
                :styles="{ top: '20px' }"
              >
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
                <div slot="footer">
                  <Button @click="addAdminModal = false">
                    CLOSE
                  </Button>
                  <Button @click="registerAdmin" type="success">
                    SUBMIT
                  </Button>
                </div>
              </Modal>
            </div>
          </div>
        </div>
      </div>
    </main>
    <div class="topAdmin">
      <span class="text-light p-3">{{ currentUser.name }}</span>
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
      currentUser: {},
      token: localStorage.getItem('token'),
      editNameModal: false,
      editEmailModal: false,
      addAdminModal: false,
      updateImageModal: false,
      errors: {},
      formData: {
        name: '',
        email: '',
        password: '',
        password_confirmation: '',
      },
      tokenAvatar: '',
      data: {
        avatar: '',
      },
    }
  },
  methods: {
    editName() {
      axios
        .put('api/edit_name/' + this.currentUser.id, this.currentUser)
        .then((response) => {
          console.log(response.data)
          this.currentUser.name = ''
          this.errors = {}
          this.currentUser = response.data
          this.$toaster.success('UPDATED SUCCESSFULLY!')
          this.editNameModal = false
        })
        .catch((errors) => {
          this.errors = errors.response.data.errors
          console.log(errors.response.data.errors)
        })
    },
    editEmail() {
      axios
        .put('api/edit_email/' + this.currentUser.id, this.currentUser)
        .then((response) => {
          console.log(response.data)
          this.currentUser.email = ''
          this.errors = {}
          this.currentUser = response.data
          this.$toaster.success('UPDATED SUCCESSFULLY!')
          this.editEmailModal = false
        })
        .catch((errors) => {
          this.errors = errors.response.data.errors
          console.log(errors.response.data.errors)
        })
    },
    registerAdmin() {
      axios
        .post('api/register', this.formData)
        .then((response) => {
          console.log(response.data)
          this.formData.name = this.formData.email = this.formData.password = this.formData.password_confirmation =
            ''
          this.errors = {}
          this.addAdminModal = false
          this.$toaster.success('ACCOUNT CREATED SUCCESSFULLY!')
        })
        .catch((errors) => {
          this.errors = errors.response.data.errors
          console.log(errors.response.data.errors)
        })
    },
    handleSuccess(res, file) {
      this.data.avatar = res
    },
    handleFormatError(file) {
      this.$Notice.warning({
        title: 'The file format is incorrect',
        desc:
          'FIle format of' +
          ' ' +
          file.name +
          ' ' +
          'is incorrect, please select jpg or png.',
      })
    },
    handleMaxSize(file) {
      this.$Notice.warning({
        title: 'Exceeding file size limit',
        desc:
          'File ' + ' ' + file.name + ' ' + 'is too large, no more than 2M.',
      })
    },
    updateAvatar() {
      if (this.data.avatar.trim() == '')
        this.$toaster.error('Image is required')
      this.data.avatar = `/uploads/${this.data.avatar}`
      axios
        .post('/api/update_avatar', {
          avatar: this.data.avatar,
        })
        .then((res) => {
          this.$toaster.success('Updated sucessfully!')
          console.log(res)
          this.updateProfileImg = false
          this.data.avatar = ''
          this.errors = ''
          this.currentUser = response.data
        })
        .catch((error) => {
          if (error.response.status == 422) {
            if (data.errors.avatar) {
              this.e(data.errors.avatar[0])
            }
          } else {
            this.swr()
          }
        })
    },
  },
  mounted() {
    this.tokenAvatar = window.Laravel.csrfToken
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

<style>
.topAdmin {
  position: fixed;
  top: 0;
  left: 0;
  height: 120px;
  background: #19be6b;
  width: 100%;
  display: flex;
  justify-content: end;
}
.titleBox {
  height: auto;
  padding: 5px;
  display: flex;
  align-items: center;
}
.info {
  background: #fff;
  padding: 20px 0;
}
.topInfo {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 10px 12px;
}
.user-section {
  width: 100%;
  height: 250px;
  display: flex;
  justify-content: center;
  align-items: center;
  flex-direction: column;
}
.userImg {
  height: 150px;
  width: 150px;
  border-radius: 50%;
  margin-bottom: 5px;
  padding: 5px;
}
.userImg img {
  width: 100%;
  height: 100%;
  border-radius: 50%;
}
.table-section {
  width: 100%;
  height: 250px;
  display: flex;
  justify-content: center;
  align-items: center;
}
.addAdminSec {
  width: 100%;
  height: 250px;
  display: flex;
  justify-content: flex-end;
  padding: 35px;
}
@media screen and (max-width: 700px) {
  .titleBox {
    flex-direction: column;
    align-items: flex-start;
  }
  .text-title {
    padding: 5px 12px;
    margin: 0;
  }
}
</style>
