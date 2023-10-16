<template>
  <div class="container-fluid mt-3">
    <div class="row">
      <div class="col-md-4">
        <div class="card">
          <div class="card-body">
            <form @submit.prevent="submit">
              <div class="form-group mb-2">
                <label>Name</label>
                <input
                  type="text"
                  v-model="name"
                  class="form-control form-control-sm"
                  required
                />
              </div>
              <div class="form-group mb-2">
                <label>Email</label>
                <input
                  type="email"
                  v-model="email"
                  class="form-control form-control-sm"
                  required
                />
                <span class="text-danger" v-if="errors">{{
                  errors.email[0]
                }}</span>
              </div>
              <div class="form-group mb-2">
                <label>Password</label>
                <input
                  type="password"
                  v-model="password"
                  class="form-control form-control-sm"
                  required
                />
              </div>
              <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <button type="submit" class="btn btn-sm btn-primary">
                  Save
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
      <div class="col-md-8">
        <div class="card">
          <div class="card-body">
            <EasyDataTable
              :headers="headers"
              :items="users"
              show-index
            />
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  data() {
    return {
      users: [],
      headers: [
        { text: "Name", value: "name", sortable: true },
        { text: "Email", value: "email" },
      ],
      name: null,
      email: null,
      password: null,
      errors: null,
    };
  },
  mounted() {
    this.fetch();
  },
  methods: {
    fetch() {
      this.$store.dispatch("user/fetch").then((response) => {
        this.users = response.message;
      });
    },
    submit() {
      const data = {
        type: "visitor",
        name: this.name,
        email: this.email,
        password: this.password,
        permissions: "[]",
      };
      this.$store.dispatch("user/store", { data }).then((response) => {
        if (response.status == "error") {
          this.errors = response.message;
        }
        if (response.status == "success") {
          this.name = null;
          this.email = null;
          this.password = null;
          this.fetch();
        }
      });
    },
  },
};
</script>
