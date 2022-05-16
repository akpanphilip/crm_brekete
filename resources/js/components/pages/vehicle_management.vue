<template>
  <div class="main">
    <Sidebar class="sidebar_section" />
    <main class="main_section">
      <div class="topInfo d-flex align-items-center">
        <button class="vehicleBtn font-weight-bold">VEHICLE MANAGEMENT</button>
        <button
          class="btn btn-register font-weight-bold"
          @click="registerVehicleModal = true"
        >
          REGISTER VEHICLE
        </button>
        <Modal
          v-model="registerVehicleModal"
          title="ADD VEHICLE"
          :mask-closable="false"
          :closable="false"
        >
          <!-- add vehicle modal -->
          <div class="row">
            <div class="col-sm-6 col-md-6">
              <div class="form-group mb-4">
                <label>
                  LICENSE PLATE
                  <span class="text-danger">*</span>
                </label>
                <input
                  type="text"
                  class="form-control"
                  v-model="vehicle.license_plate"
                />
                <small
                  class="text-danger"
                  v-if="errors && errors.license_plate"
                >
                  {{ errors.license_plate[0] }}
                </small>
              </div>
            </div>
            <div class="col-sm-6 col-md-6">
              <div class="form-group mb-4">
                <label>
                  TYPE
                  <span class="text-danger">*</span>
                </label>
                <input
                  type="text"
                  class="form-control"
                  v-model="vehicle.type"
                />
                <small class="text-danger" v-if="errors && errors.type">
                  {{ errors.type[0] }}
                </small>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-6 col-md-6">
              <div class="form-group mb-4">
                <label>
                  MODEL
                  <span class="text-danger">*</span>
                </label>
                <input
                  type="text"
                  class="form-control"
                  v-model="vehicle.model"
                />
                <small class="text-danger" v-if="errors && errors.model">
                  {{ errors.model[0] }}
                </small>
              </div>
            </div>
            <div class="col-sm-6 col-md-6">
              <div class="form-group mb-4">
                <label>
                  YEAR
                  <span class="text-danger">*</span>
                </label>
                <input
                  type="text"
                  class="form-control"
                  v-model="vehicle.year"
                />
                <small class="text-danger" v-if="errors && errors.year">
                  {{ errors.year[0] }}
                </small>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-sm-6 col-md-6">
              <div class="form-group mb-4">
                <label>
                  SIDE NUMBER
                  <span class="text-danger">*</span>
                </label>
                <input
                  type="text"
                  class="form-control"
                  v-model="vehicle.side_number"
                />
                <small class="text-danger" v-if="errors && errors.side_number">
                  {{ errors.side_number[0] }}
                </small>
              </div>
            </div>
            <div class="col-sm-6 col-md-6">
              <div class="form-group mb-4">
                <label>
                  CHASSIS
                  <span class="text-danger">*</span>
                </label>
                <input
                  type="text"
                  class="form-control"
                  v-model="vehicle.chassis"
                />
                <small class="text-danger" v-if="errors && errors.chassis">
                  {{ errors.chassis[0] }}
                </small>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-6 col-md-6">
              <div class="form-group mb-4">
                <label>
                  ENGINE
                  <span class="text-danger">*</span>
                </label>
                <input
                  type="text"
                  class="form-control"
                  v-model="vehicle.engine"
                />
                <small class="text-danger" v-if="errors && errors.engine">
                  {{ errors.engine[0] }}
                </small>
              </div>
            </div>
            <div class="col-sm-6 col-md-6">
              <div class="form-group mb-4">
                <label>
                  TRANSMISSION
                  <span class="text-danger">*</span>
                </label>
                <select class="form-select" v-model="vehicle.transmission">
                  <option value="">--Please Select--</option>
                  <option value="Automatic">Automatic</option>
                  <option value="Manual">Manual</option>
                  <option value="Hybrid">Hybrid</option>
                </select>
                <small class="text-danger" v-if="errors && errors.transmission">
                  {{ errors.transmission[0] }}
                </small>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-sm-6 col-md-6">
              <div class="form-group mb-4">
                <label>
                  BODY
                  <span class="text-danger">*</span>
                </label>
                <input
                  type="text"
                  class="form-control"
                  v-model="vehicle.body"
                />
                <small class="text-danger" v-if="errors && errors.body">
                  {{ errors.body[0] }}
                </small>
              </div>
            </div>
            <div class="col-sm-6 col-md-6">
              <div class="form-group mb-4">
                <label>
                  COLOR
                  <span class="text-danger">*</span>
                </label>
                <input
                  type="text"
                  class="form-control"
                  v-model="vehicle.color"
                />
                <small class="text-danger" v-if="errors && errors.color">
                  {{ errors.color[0] }}
                </small>
              </div>
            </div>
          </div>
          <div slot="footer">
            <Button type="default" @click="registerVehicleModal = false">
              CLOSE
            </Button>
            <Button style="background: navy; color: white;" @click="addVehicle">
              SUBMIT
            </Button>
          </div>
        </Modal>
        <!-- add vehicle modal -->
      </div>

      <div class="container-fluid mt-4">
        <div class="table-responsive">
          <table class="table table-bordered" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>S/N</th>
                <th>LICENCE PLATE</th>
                <th>TYPE</th>
                <th>MODEL</th>
                <th>SIDE NUMBER</th>
                <th>CHASSIS</th>
                <th>COLOR</th>
                <th></th>
              </tr>
            </thead>
            <tr v-for="(vehicle, i) in vehicles" :key="i">
              <td>{{ i + 1 }}</td>
              <td>{{ vehicle.license_plate }}</td>
              <td>{{ vehicle.type }}</td>
              <td>{{ vehicle.model }}</td>
              <td>{{ vehicle.side_number }}</td>
              <td>{{ vehicle.chassis }}</td>
              <td>{{ vehicle.color }}</td>
              <td>
                <Dropdown>
                  <a href="javascript:void(0)">
                    <Icon type="md-more" />
                  </a>
                  <DropdownMenu slot="list">
                    <DropdownItem>
                      <span @click="showVehicleEditModal(vehicle, i)">
                      Edit
                      </span>
                    </DropdownItem>
                    <DropdownItem>
                      <span @click="deleteVehicle(vehicle.id)">
                        Delete
                      </span>
                    </DropdownItem>
                  </DropdownMenu>
                </Dropdown>
              </td>
            </tr>
          </table>
          <Modal
              v-model="editVehicle"
              title="Edit Vehicle"
              :mask-closable="false"
              :closable="false"
            >
                <div class="row">
            <div class="col-sm-6 col-md-6">
              <div class="form-group mb-4">
                <label>
                  LICENSE PLATE
                  <span class="text-danger">*</span>
                </label>
                <input
                  type="text"
                  class="form-control"
                  v-model="editData.license_plate"
                />
                <small
                  class="text-danger"
                  v-if="errors && errors.license_plate"
                >
                  {{ errors.license_plate[0] }}
                </small>
              </div>
            </div>
            <div class="col-sm-6 col-md-6">
              <div class="form-group mb-4">
                <label>
                  TYPE
                  <span class="text-danger">*</span>
                </label>
                <input
                  type="text"
                  class="form-control"
                  v-model="editData.type"
                />
                <small class="text-danger" v-if="errors && errors.type">
                  {{ errors.type[0] }}
                </small>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-6 col-md-6">
              <div class="form-group mb-4">
                <label>
                  MODEL
                  <span class="text-danger">*</span>
                </label>
                <input
                  type="text"
                  class="form-control"
                  v-model="editData.model"
                />
                <small class="text-danger" v-if="errors && errors.model">
                  {{ errors.model[0] }}
                </small>
              </div>
            </div>
            <div class="col-sm-6 col-md-6">
              <div class="form-group mb-4">
                <label>
                  YEAR
                  <span class="text-danger">*</span>
                </label>
                <input
                  type="text"
                  class="form-control"
                  v-model="editData.year"
                />
                <small class="text-danger" v-if="errors && errors.year">
                  {{ errors.year[0] }}
                </small>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-sm-6 col-md-6">
              <div class="form-group mb-4">
                <label>
                  SIDE NUMBER
                  <span class="text-danger">*</span>
                </label>
                <input
                  type="text"
                  class="form-control"
                  v-model="editData.side_number"
                />
                <small class="text-danger" v-if="errors && errors.side_number">
                  {{ errors.side_number[0] }}
                </small>
              </div>
            </div>
            <div class="col-sm-6 col-md-6">
              <div class="form-group mb-4">
                <label>
                  CHASSIS
                  <span class="text-danger">*</span>
                </label>
                <input
                  type="text"
                  class="form-control"
                  v-model="editData.chassis"
                />
                <small class="text-danger" v-if="errors && errors.chassis">
                  {{ errors.chassis[0] }}
                </small>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-6 col-md-6">
              <div class="form-group mb-4">
                <label>
                  ENGINE
                  <span class="text-danger">*</span>
                </label>
                <input
                  type="text"
                  class="form-control"
                  v-model="editData.engine"
                />
                <small class="text-danger" v-if="errors && errors.engine">
                  {{ errors.engine[0] }}
                </small>
              </div>
            </div>
            <div class="col-sm-6 col-md-6">
              <div class="form-group mb-4">
                <label>
                  TRANSMISSION
                  <span class="text-danger">*</span>
                </label>
                <select class="form-select" v-model="editData.transmission">
                  <option value="">--Please Select--</option>
                  <option value="Automatic">Automatic</option>
                  <option value="Manual">Manual</option>
                  <option value="Hybrid">Hybrid</option>
                </select>
                <small class="text-danger" v-if="errors && errors.transmission">
                  {{ errors.transmission[0] }}
                </small>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-sm-6 col-md-6">
              <div class="form-group mb-4">
                <label>
                  BODY
                  <span class="text-danger">*</span>
                </label>
                <input
                  type="text"
                  class="form-control"
                  v-model="editData.body"
                />
                <small class="text-danger" v-if="errors && errors.body">
                  {{ errors.body[0] }}
                </small>
              </div>
            </div>
            <div class="col-sm-6 col-md-6">
              <div class="form-group mb-4">
                <label>
                  COLOR
                  <span class="text-danger">*</span>
                </label>
                <input
                  type="text"
                  class="form-control"
                  v-model="editData.color"
                />
                <small class="text-danger" v-if="errors && errors.color">
                  {{ errors.color[0] }}
                </small>
              </div>
            </div>
          </div>
              <div slot="footer">
                <Button type="default" @click="editVehicle = false">
                  Close
                </Button>
                <Button type="primary" @click="updateVehicle">
                  Update
                </Button>
              </div>
            </Modal>
        </div>
      </div>
    </main>
    <div class="topVehicle">
      <!-- <img :src="'../img/user.png'" alt="" /> -->
      <span class="text-light p-3">
        <!-- {{ currentUser.name }} -->
      </span>
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
      registerVehicleModal: false,
      errors: {},
      vehicles: {},
      vehicle: {
        license_plate: '',
        type: '',
        model: '',
        side_number: '',
        year: '',
        chassis: '',
        body: '',
        engine: '',
        transmission: '',
        color: '',
      },
      editData: {
          id: '',
        license_plate: '',
        type: '',
        model: '',
        side_number: '',
        year: '',
        chassis: '',
        body: '',
        engine: '',
        transmission: '',
        color: '',
      },
      Nvehicle: {},
      index: -1,
      editVehicle: false,
    }
  },

  methods: {
    addVehicle() {
      axios
        .post('/api/register_vehicle', {
          license_plate: this.vehicle.license_plate,
          type: this.vehicle.type,
          model: this.vehicle.model,
          side_number: this.vehicle.side_number,
          year: this.vehicle.year,
          chassis: this.vehicle.chassis,
          body: this.vehicle.body,
          engine: this.vehicle.engine,
          transmission: this.vehicle.transmission,
          color: this.vehicle.color,
        })
        .then((response) => {
          this.registerVehicleModal = false
          console.log(response.data)
          this.errors = {}
          this.getVehicles()
          Swal.fire('Success!', 'VEHICLE REGISTERED SUCCESSFULLY', 'success')
        })
        .catch((errors) => {
          this.errors = errors.response.data.errors
        })
    },
    getVehicles() {
      axios
        .get('/api/vehicles')
        .then((response) => {
          this.vehicles = response.data
        })
        .catch((errors) => {
          console.log(errors)
        })
    },
    deleteVehicle(vehicle_id) {
      Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!',
      }).then((result) => {
        if (result.isConfirmed) {
          axios
            .delete('/api/delete_vehicle/' + vehicle_id)
            .then((response) => {
              this.getVehicles()
              console.log(response)
            })
            .catch((errors) => {
              console.log(errors)
            })
          Swal.fire('Deleted!', 'Vehicle has been deleted.', 'success')
          this.getVehicles()
        }
      })
    },
    showVehicleEditModal(Nvehicle, index) {
      let obj = {
        id: Nvehicle.id,
        license_plate: Nvehicle.license_plate,
        type: Nvehicle.type,
        model: Nvehicle.model,
        side_number: Nvehicle.side_number,
        year: Nvehicle.year,
        chassis: Nvehicle.chassis,
        body: Nvehicle.body,
        engine: Nvehicle.engine,
        transmission: Nvehicle.transmission,
        color: Nvehicle.color,
      }
      this.editData = obj
      this.editVehicle = true
      this.index = index
    },
    updateVehicle() {
      axios
        .put('/api/update_vehicle/' + this.editData.id, {
          license_plate: this.editData.license_plate,
          type: this.editData.type,
          model: this.editData.model,
          side_number: this.editData.side_number,
          year: this.editData.year,
          chassis: this.editData.chassis,
          body: this.editData.body,
          engine: this.editData.engine,
          transmission: this.editData.transmission,
          color: this.editData.color,
        })
        .then((res) => {
          this.vehicles[this.index].license_plate = this.editData.license_plate
          this.vehicles[this.index].type = this.editData.type
          this.vehicles[this.index].model = this.editData.model
          this.vehicles[this.index].type = this.editData.type
          this.vehicles[this.index].side_number = this.editData.side_number
          this.vehicles[this.index].year = this.editData.year
          this.vehicles[this.index].chassis = this.editData.chassis
          this.vehicles[this.index].body = this.editData.body
          this.vehicles[this.index].engine = this.editData.engine
          this.vehicles[this.index].transmission = this.editData.transmission
          this.vehicles[this.index].color = this.editData.color
          this.$toaster.success('Updated successfully!')
          console.log(res)
          this.editVehicle = false
          this.editData.license_plate = ''
          this.editData.type = ''
          this.editData.model = ''
          this.editData.side_number = ''
          this.editData.year = ''
          this.editData.chassis = ''
          this.editData.body = ''
          this.editData.engine = ''
          this.editData.transmission = ''
          this.editData.color = ''
          this.errors = ''
        })
        .catch((error) => {
          if (error.response.status == 422) {
            this.errors = error.response.data.errors
            console.log('error')
          }
        })
    },
  },
  mounted() {
    this.tokenAvatar = window.Laravel.csrfToken
    window.axios.defaults.headers.common[
      'Authorization'
    ] = `Bearer ${this.token}`
    this.getVehicles()
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
<!-- 
<style>
.main {
  display: flex;
  justify-content: space-between;
  align-items: flex-start;
  padding: 50px 40px;
}
.main_section {
  padding: 20px 0;
  height: auto;
  background: #fff;
  width: 73%;
  z-index: 10;
  position: absolute;
  right: 40px;
  top: 40px;
  box-shadow: 0 0 5px 2px rgba(128, 128, 128, 0.247);
  border-radius: 7px;
}
.info {
  width: 100%;
  height: 100px;
  border-radius: 7px;
  display: flex;
  justify-content: center;
  align-items: center;
  box-shadow: 0 0 5px rgba(167, 166, 166, 0.76);
}
.leftInfo,
.rightInfo {
  height: 100%;
  width: 50%;
  color: #050505;
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
.topVehicle {
  position: fixed;
  top: 0;
  left: 0;
  height: 120px;
  background: navy;
  width: 100%;
  display: flex;
  justify-content: end;
}
.topVehicle img {
  width: 30px;
  height: 30px;
  margin-top: 12px;
}
.btn-register {
  background: navy;
  color: #fff;
}
.btn-register:hover {
  color: #f5f5f5 !important;
}
.vehicleBtn {
  font-weight: bold;
  border: none;
  background: #fff;
  font-size: 20px;
  padding-left: 25px;
}
.vertical-center-modal {
  display: flex;
  align-items: center;
  justify-content: center;
}
.ivu-modal {
  top: 0;
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
  .vehicleBtn {
    font-size: 10px;
  }
  .btn-register {
    font-size: 10px;
  }
  .topInfo {
    width: 70%;
  }
}
</style> -->
