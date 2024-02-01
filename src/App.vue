<script>
import { RouterLink, RouterView } from 'vue-router'
import Nav from '@/components/NavBar.vue'
import Homeview from '@/views/HomeView.vue'

export default{
  components:{
    Nav,
    Homeview,
  }
}
</script>

<template>
  <header>
    <Nav v-if="!$route.meta.hideNavbar"></Nav>
    <RouterView></RouterView>
  </header>
</template>
