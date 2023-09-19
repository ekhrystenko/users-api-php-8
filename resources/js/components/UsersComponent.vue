<template>
  <table class="table table-hover">
    <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Phone</th>
      <th scope="col">Edit</th>
      <th scope="col">Delete</th>
    </tr>
    </thead>
    <tbody>
    <template v-for="user in users">
      <tr :class="isEdit(user.id) ? 'd-none' : ''">
        <th scope="row">{{ user.id }}</th>
        <td>{{ user.name }}</td>
        <td>{{ user.email }}</td>
        <td>{{ user.phone }}</td>
        <td><a @click.prevent="changeEditUserId(user.id, user.name, user.email, user.phone)" href="#" class="btn btn-warning">Edit</a></td>
        <td><a @click.prevent="deleteUser(user.id)" href="#" class="btn btn-danger">Delete</a></td>
      </tr>
      <tr :class="isEdit(user.id) ? '' : 'd-none'">
        <th scope="row">{{ user.id }}</th>
        <td><input type="text" class="form-control" v-model="name"></td>
        <td><input type="email" class="form-control" v-model="email"></td>
        <td><input type="text" class="form-control" v-model="phone"></td>
        <td><a @click.prevent="updateUser(user.id)" href="#" class="btn btn-success">Update</a></td>
        <td><a @click.prevent="deleteUser(user.id)" href="#" class="btn btn-danger">Delete</a></td>
      </tr>
    </template>
    </tbody>
  </table>
</template>

<script>
export default {
  name: 'UsersComponents',

  data() {
    return {
      users: null,
      editUserId: null,
      name: null,
      email: null,
      phone: null,
    }
  },

  mounted() {
    this.$parent.token();
    this.getUsers();
  },

  methods: {
    getUsers() {
      axios.get('api/users')
          .then(res => {
            this.users = res.data.data;
          })
          .catch(error => {
            console.log(error.response.data);
          })
    },

    updateUser(id) {
      this.editUserId = null;
      axios.put(`api/users/${id}`, {name: this.name, email: this.email, phone: this.phone})
          .then(res => {
            this.getUsers();
          })
          .catch(error => {
            console.log(error.response.data);
          })
    },

    deleteUser(id) {
      this.editUserId = null;
      axios.delete(`api/users/${id}`)
          .then(res => {
            this.getUsers();
          })
          .catch(error => {
            console.log(error.response.data);
          })
    },

    changeEditUserId(id, name, email, phone) {
      this.$parent.$refs.createUser.showForm = false;
      this.editUserId = id;
      this.name = name;
      this.email = email;
      this.phone = phone;
    },

    isEdit(id) {
      return this.editUserId === id;
    }
  },
}
</script>

<style scoped>

</style>