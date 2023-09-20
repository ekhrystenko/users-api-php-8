<template>
    <NavComponent></NavComponent>
    <router-view></router-view>
</template>

<script>

import NavComponent from "./NavComponent";
export default {
  name: "Index",

  components: {
    NavComponent
  },

}
</script>

<style scoped>
</style>