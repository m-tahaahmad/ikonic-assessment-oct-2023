<template>
  <div id="app">
    <div id="signup">
      <div id="description">
        <h1>Register</h1>
        <p>
          By logging in you agree to the ridiculously long terms that you didn't
          bother to read.
        </p>
      </div>
      <div id="form">
        <form @submit.prevent="submit">
          <div class="form-group">
            <label for="email">Name</label>
            <input
              type="text"
              v-model="name"
              placeholder="Full name"
              autocomplete="off"
              required
            />
          </div>
          <div class="form-group">
            <label for="email">Email</label>
            <input
              type="email"
              id="email"
              v-model="email"
              placeholder="elon@musk.io"
              autocomplete="off"
              required
            />
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input
              type="password"
              id="password"
              required
              v-model="password"
              placeholder="**********"
            />
          </div>
          <button type="submit">Sign up</button>
        </form>
        <router-link to="/">Login</router-link>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "SignUp",
  components: {},
  data() {
    return {
      name: null,
      email: null,
      password: null,
    };
  },
  methods: {
    submit() {
      const name = this.name;
      const email = this.email;
      const password = this.password;
      this.$store
        .dispatch("auth/signup", { name, email, password })
        .then((response) => {
          console.log(response);
        })
        .catch((e) => {
          console.log(e);
        });
    },
  },
};
</script>
<style scoped>
* {
  box-sizing: border-box;
  font-family: Verdana, sans-serif;
}

html,
body {
  height: 100%;
  margin: 0;
  padding: 0;
  width: 100%;
}

div#app {
  width: 100%;
  height: 100vh;
}

div#app div#signup {
  align-items: center;
  background-color: #e2e2e5;
  display: flex;
  justify-content: center;
  width: 100%;
  height: 100%;
}

div#app div#signup div#description {
  background-color: #ffffff;
  width: 280px;
  padding: 35px;
}

div#app div#signup div#description h1,
div#app div#signup div#description p {
  margin: 0;
}

div#app div#signup div#description p {
  font-size: 0.8em;
  color: #95a5a6;
  margin-top: 10px;
}

div#app div#signup div#form {
  background-color: #34495e;
  border-radius: 5px;
  box-shadow: 0px 0px 30px 0px #666;
  color: #ecf0f1;
  width: 260px;
  padding: 35px;
}

div#app div#signup div#form label,
div#app div#signup div#form input {
  outline: none;
  width: 100%;
}

div#app div#signup div#form label {
  color: #95a5a6;
  font-size: 0.8em;
}

div#app div#signup div#form input {
  background-color: transparent;
  border: none;
  color: #ecf0f1;
  font-size: 1em;
  margin-bottom: 20px;
}

div#app div#signup div#form ::placeholder {
  color: #ecf0f1;
  opacity: 1;
}

div#app div#signup div#form button {
  background-color: #ffffff;
  cursor: pointer;
  border: none;
  padding: 10px;
  transition: background-color 0.2s ease-in-out;
  width: 100%;
}

div#app div#signup div#form button:hover {
  background-color: #eeeeee;
}

@media screen and (max-width: 600px) {
  div#app div#signup {
    align-items: unset;
    background-color: unset;
    display: unset;
    justify-content: unset;
  }

  div#app div#signup div#description {
    margin: 0 auto;
    max-width: 350px;
    width: 100%;
  }

  div#app div#signup div#form {
    border-radius: unset;
    box-shadow: unset;
    width: 100%;
  }

  div#app div#signup div#form form {
    margin: 0 auto;
    max-width: 280px;
    width: 100%;
  }
}
</style>
