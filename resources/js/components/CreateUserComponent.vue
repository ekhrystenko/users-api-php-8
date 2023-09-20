<template>

  <div class="col-md-6 mt-3" :class="showForm ? 'd-none' : ''">
    <button @click="toggleForm" class="btn btn-success">Create User</button>
  </div>

  <template v-if="showForm">
    <div class="row mt-3">
      <div class="col">
        <input type="text" class="form-control" v-model="name" placeholder="Name">
      </div>

      <div class="col">
      <div class="input-group mb-2 mr-sm-2">
        <div class="input-group-prepend">
          <div class="input-group-text">@</div>
        </div>
        <input type="email" class="form-control" v-model="email" placeholder="Email" id="inlineFormInputGroupUsername2">
      </div>
      </div>
    </div>

    <div class="form-group mb-2 mr-sm-2">
      <input type="text" class="form-control" v-model="phone" placeholder="Phone">
    </div>

    <div class="row">
      <div class="col">
        <input type="password" class="form-control" v-model="password" placeholder="Password">
      </div>
      <div class="col">
        <input type="password" class="form-control" v-model="password_confirmation"
               placeholder="Password Confirm">
      </div>
    </div>
    <div class="col-md-6 mt-3 mb-3">
      <input @click.prevent="createUser" class="btn btn-primary" value="Create">
      <input @click.prevent="toggleForm" class="btn btn-secondary m-1" value="Close">
    </div>
  </template>
</template>
<script>

export default {
  name: 'CreateUserComponents',
  components: {
  },

  data() {
    return {
      showForm: false,
      name: null,
      email: null,
      phone: null,
      password: null,
      password_confirmation: null,
    }
  },

  mounted() {
    this.$parent.token();
  },

  methods: {
    createUser() {

      const userData = {
        name: this.name,
        email: this.email,
        phone: this.phone,
        password: this.password,
        password_confirmation: this.password_confirmation
      };

      axios.post('api/users', userData
          )
          .then(res => {
            Object.keys(userData).forEach(key => {
              this[key] = null;
            });

            this.$parent.$refs.users.getUsers();
            this.showForm = false;
          })
          .catch(error => {
            console.log(error.response.data);
          })
          .finally({})
    },
    toggleForm() {
      this.showForm = !this.showForm;
      this.$parent.$refs.users.editUserId = null;

    },
  },
}
</script>

<style scoped>

</style>