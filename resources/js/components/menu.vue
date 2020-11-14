<template>
  <div>
    <nav class="navbar is-dark is-bold is-fixed-top" role="navigation">
      <div class="navbar-brand">
        <a class="navbar-item" href="/">
          <em class="fas fa-home"></em>
        </a>
        <a
          role="button"
          class="navbar-burger"
          :class="{ 'is-active': isMenuShown }"
          aria-label="menu"
          :aria-expanded="{ isMenuShown }"
          v-on:click="toggleMenu"
        >
          <span aria-hidden="true"></span>
          <span aria-hidden="true"></span>
          <span aria-hidden="true"></span>
        </a>
      </div>
      <div class="navbar-menu" :class="{ 'is-active': isMenuShown }">
        <div class="navbar-start">
          <a class="navbar-item" href="/medicaments" v-if="isAuth">Medicaments</a>
          <a class="navbar-item" href="/pharmacies" v-if="isAuth">Pharmacies</a>
          <a class="navbar-item" href="/employees" v-if="isAuth">Employees</a>
          <a class="navbar-item" href="/positions" v-if="isAuth">Positions</a>
        </div>
        <div class="navbar-end">
          <a class="navbar-item" href="/register" v-if="!isAuth">Signup</a>
          <a class="navbar-item" href="/login" v-if="!isAuth">Login</a>
          <a class="navbar-item" v-if="isAuth" v-on:click="logout">Logout</a>
        </div>
      </div>
    </nav>
  </div>
</template>

<script>
export default {
  props: {
    isAuth: Boolean,
  },

  methods: {
    toggleMenu: function (event) {
      this.isMenuShown = !this.isMenuShown;
    },
    logout() {
      axios.post('/logout').then(response => {
        window.location = "/"
      }).catch(error => {
        console.log(error);
      });
    }
  },

  data: function () {
    return {
      isMenuShown: false,
    };
  },
};
</script>
