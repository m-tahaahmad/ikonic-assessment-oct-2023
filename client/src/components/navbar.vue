<template>
  <nav>
    <div class="container">
      <ul>
        <li>
          <router-link to="/feedback">Feedback</router-link>
        </li>
        <li v-if="permissions && permissions.includes('users')">
          <router-link to="/user">Users</router-link>
        </li>
      </ul>
    </div>
  </nav>
</template>
<script>
export default {
  data() {
    return {
      permissions: null,
    };
  },
  mounted() {
    this.permissions = JSON.parse(localStorage.getItem("permissions"));
  },
};
</script>

<style scoped>
nav {
  background-color: #fff;
  box-shadow: 0 0 20px rgba(89, 102, 122, 0.1);
  border-bottom: 1px solid #d9d9e1;
  padding: 0 !important;
}
ul {
  list-style: none;
  display: flex;
  justify-content: space-evenly;
  margin: 0;
}
li {
  position: relative;
}
li a {
  padding: 15px 0;
  display: block;
  border-bottom: 2px solid transparent;
  color: #000;
  font-size: 13px;
}
li a:hover {
  border-bottom: 2px solid #7366ff;
  color: #7366ff;
}
.has-dropdown:hover .dropdown-nav {
  display: block;
}
.active {
  border-bottom: 2px solid #7366ff;
  color: #7366ff;
}
.dropdown-nav {
  position: absolute;
  z-index: 10;
  background: #fff;
  border: 1px solid #d9d9e1;
  border-radius: 6px;
  padding: 10px;
  display: none;
}
.dropdown-nav li a {
  display: block;
  padding-top: 10px;
  padding-bottom: 0;
  width: 200px;
}
</style>
