<template>
  <div>
    <div class="container">
      <CreateUserComponent ref="createUser"></CreateUserComponent>
      <UsersComponent class="mt-3" ref="users"></UsersComponent>
    </div>
  </div>
</template>

<script>
import UsersComponent from "./UsersComponent";
import CreateUserComponent from "./CreateUserComponent";

export default {
  name: 'MainApiComponents',

  components: {
    UsersComponent,
    CreateUserComponent,
  },

  data() {
    return {}
  },

  mounted() {
    this.token();
  },

  methods: {
    token() {
      axios.defaults.headers.common['Authorization'] = `Bearer test`;
    }
  }
}
</script>

<style scoped>

</style>