<template>
  <header>
    <div class="row">
      <div class="col-md-2">
        <h5>Product Feedback Tool</h5>
      </div>
      <div class="col-md-8"></div>
      <div class="col-md-2">
        <nav>
          <ul>
            <li>
              <button type="button" class="btn btn-sm text-light" @click="logout">
                Logout
              </button>
            </li>
          </ul>
        </nav>
      </div>
    </div>
  </header>
</template>
<script>
import router from "@/router";

export default {
  methods: {
    logout() {
      localStorage.clear();
      router.push("/");
    },
  },
};
</script>
<style scoped>
header {
  background-color: #34495e;
  padding: 10px 20px;
  color: #eee;
}
header ul {
  list-style: none;
  float: right;
}
nav {
  padding: 0 !important;
}
.profile-name {
  cursor: pointer;
}
.profile-name span {
  font-size: 14px;
}
.profile-name p {
  font-size: 11px;
  margin: 0;
}
.dropdown-nav {
  position: absolute;
  background: #fff;
  width: auto;
  right: 10px;
  padding: 10px;
  border-radius: 5px;
  border: 1px solid #eee;
  display: none;
}
.dropdown-nav li a {
  text-transform: uppercase;
  display: block;
  padding: 5px;
  font-size: 14px;
  color: #000 !important;
}
.dropdown-nav li a:hover {
  color: var(--theme-deafult) !important;
}
.dropdown-nav li a i {
  vertical-align: sub;
  margin-right: 5px;
}
.has-dropdown:hover .dropdown-nav {
  display: block;
}
</style>
