<template>
    <nav class="navbar navbar-light bg-light justify-content-between">
      <h3 class="m-lg-5"><router-link class="link" to="/">Welcome to Laravel test API</router-link></h3>
      <router-link class="link m-md-5" to="/api" v-if="isHomePage"><a class="btn btn-success">Use API</a></router-link>
    </nav>
</template>

<script>

export default {
  name: "NavComponent",
  components: {
  },
  computed: {
    isHomePage() {
      return this.$route.path === '/';
    },
  },
}
</script>

<style scoped>
  .link {
      text-decoration: none;
      color: #000;
  }
</style>