<template>
  <div>
    <NavComponent></NavComponent>
    <div class="container">
      <CreateUserComponent ref="createUser"></CreateUserComponent>
      <UsersComponent class="mt-3" ref="users"></UsersComponent>
    </div>
  </div>
</template>

<script>
import NavComponent from "./NavComponent";
import UsersComponent from "./UsersComponent";
import CreateUserComponent from "./CreateUserComponent";

export default {
  name: 'MainComponents',

  components: {
    NavComponent,
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