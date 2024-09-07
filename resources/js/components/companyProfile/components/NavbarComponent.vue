<template>
  <nav class="navbar navbar-expand-lg bg-body-tertiary navbar-dark navbarCustom fixed-top">
    <div class="container">
      <a class="navbar-brand" href="#">SBLF</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation" @click="toggleNavbar">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div :class="navbarClass" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link" href="#">About SBLF</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Visi Misi</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Benefits & Programs</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Opportunity</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Contact Us</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link" href="#" id="menuDropdown" role="button" aria-haspopup="true"
              aria-expanded="false" @mouseover="toggleDropdown('menuDropdown')">
              Bahasa
            </a>
            <div class="dropdown-menu" aria-labelledby="menuDropdown" v-show="isDropdownOpen('menuDropdown')">
              <a class="dropdown-item" href="#">Indonesia</a>
              <a class="dropdown-item" href="#">Ingris</a>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</template>

<script>
export default {
  data() {
    return {
      activeLink: null,
      openDropdowns: []
    };
  },
  computed: {
    navbarClass() {
      return {
        'collapse': !this.isNavbarOpen,
        'navbar-collapse': true
      };
    }
  },
  methods: {
    toggleNavbar() {
      this.isNavbarOpen = !this.isNavbarOpen;
    },
    toggleDropdown(dropdownId) {
      const index = this.openDropdowns.indexOf(dropdownId);
      if (index === -1) {
        this.openDropdowns.push(dropdownId);
      } else {
        this.openDropdowns.splice(index, 1);
      }
    },
    isDropdownOpen(dropdownId) {
      return this.openDropdowns.includes(dropdownId);
    }
  }
};
</script>

<style scoped>
.nav-link {
  padding-right: 1rem !important;
}

.navbarCustom {
  background-color: #000064;
}

.navbar-nav .nav-item .dropdown-menu {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  z-index: 1;
}

.navbar-nav .nav-item:hover .dropdown-menu {
  display: block;
}

.dropdown-menu .dropdown-item {
  color: #212529;
  padding: 0.5rem 1rem;
  clear: both;
  font-weight: 400;
  text-decoration: none;
  display: block;
  width: 100%;
  text-align: inherit;
  white-space: nowrap;
  background-color: transparent;
  border: 0;
}

.dropdown-menu .dropdown-item:hover {
  background-color: #f8f9fa;
}

.activeLink > .nav-link {
  font-weight: bold;
  color: white !important;
  border-bottom: 2px solid white;
}
</style>
