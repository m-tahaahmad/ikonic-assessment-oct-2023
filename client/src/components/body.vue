<template>
  <div id="body">
    <div class="wrapper">
      <Header />
      <NavBar />
      <router-view class="view"></router-view>
    </div>
  </div>
</template>
<script>
import Header from "@/components/header.vue";
import NavBar from "@/components/navbar.vue";
export default {
  components: {
    Header,
    NavBar,
  },
};
</script>
