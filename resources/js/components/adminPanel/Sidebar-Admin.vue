<template>
  <!-- Sidebar -->
  <ul
    class="navbar-nav bg-gradient-light sidebar sidebar-dark accordion"
    id="accordionSidebar"
    :class="{ toggled: sidebarToggled }"
  >
    <!-- Sidebar - Brand -->
    <a
      class="sidebar-brand d-flex align-items-center justify-content-center"
      href="#"
    >
      <div class="sidebar-brand-icon mt-2">
        <!-- <img src="/images/KabupatenSukoharjo.png" alt="logo" width="50" /> -->
      </div>
      <div class="sidebar-brand-text mx-3 text-dark">SBLF</div>
    </a>

    <!-- Heading -->
    <div class="sidebar-heading mt-5 text-dark">Menu</div>
    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
      <router-link class="nav-link text-dark" to="/admin-dashboard">
        <i class="bi text-dark bi-speedometer2"></i>
        <span>Dashboard</span>
      </router-link>
    </li>

    <li class="nav-item">
      <router-link class="nav-link text-dark" to="/admin-about">
        <i class="bi text-dark bi-journal-text"></i>
        <span>About SBLF</span>
      </router-link>
    </li>
   
    <li class="nav-item">
      <router-link class="nav-link text-dark" to="/admin-visi-misi">
        <i class="bi text-dark bi-journal-text"></i>
        <span>Visi & Misi</span>
      </router-link>
    </li>

    <li class="nav-item">
      <router-link class="nav-link text-dark" to="/admin-surat">
        <i class="bi text-dark bi-journal-text"></i>
        <span>Benefit Program</span>
      </router-link>
    </li>

    <li class="nav-item">
      <router-link class="nav-link text-dark" to="/admin-surat">
        <i class="bi text-dark bi-journal-text"></i>
        <span>Opportunity</span>
      </router-link>
    </li>

    <li class="nav-item">
      <router-link class="nav-link text-dark" to="/admin-surat">
        <i class="bi text-dark bi-journal-text"></i>
        <span>Berita</span>
      </router-link>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider" />
  </ul>
  <!-- End of Sidebar -->
</template>
<script>
export default {
  data() {
    return {
      sidebarToggled: false,
    };
  },
  methods: {},
  created() {
    
  },
};
</script>

<style scoped>
.custom-disabled {
  /* Ganti properti CSS sesuai kebutuhan untuk menggantikan class 'disable' */
  pointer-events: none; /* contoh menggantikan 'disable' */
  cursor: not-allowed; /* contoh menggantikan 'disable' */
}
</style>