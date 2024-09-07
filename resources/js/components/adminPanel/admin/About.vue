<template>
  <div id="wrapper">
    <sidebar-admin />

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
      <!-- Main Content -->
      <div id="content">
        <navbar />

        <!-- Begin Page Content -->
        <div class="container-fluid">
          <!-- Page Heading -->
          <h1 class="h3 mb-0 text-gray-800 text-center mb-5">About SBLF</h1>

          <button
            class="btn btn-warning"
            data-toggle="modal"
            data-target="#tambahAboutModal"
          >
            Buat About
          </button>
          <div class="table-responsive mt-3">
            <table class="display table table-striped">
              <thead>
                <tr>
                  <th scope="col" style="width: 50px">No</th>
                  <th scope="col">About</th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="(item, index) in aboutList" :key="item.id">
                  <td>{{ index + 1 }}</td>
                  <td>{{ item.about }}</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <!-- /.container-fluid -->
      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer />
      <!-- End of Footer -->
    </div>
    <!-- End of Content Wrapper -->
    <!-- modal tambah about -->
    <div
      class="modal"
      id="tambahAboutModal"
      tabindex="-1"
      role="dialog"
      aria-labelledby="tambahAboutModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="tambahAboutModalLabel">About</h5>
            <button
              type="button"
              class="close"
              data-dismiss="modal"
              aria-label="Close"
            >
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <textarea
              class="form-control"
              v-model="newAbout"
              placeholder="Masukkan about"
            ></textarea>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" @click="tambahAbout">
              Simpan
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- End of Page Wrapper -->
</template>

<script>
import axios from "axios";
import Swal from "sweetalert2";

export default {
  data() {
    return {
      user_id: "",
      newAbout: "",
      aboutList: []
    };
  },
  methods: {
    async tambahAbout() {
      try {
        const response = await axios.post(
          "http://127.0.0.1:8000/api/auth/create-about",
          {
            about: this.newAbout
          },
          {
            headers: {
              Authorization: `Bearer ${sessionStorage.getItem("token")}`
            }
          }
        );
        console.log(response.data); // Handle response from server
        this.newAbout = ""; // Clear input field after successful submission
        this.fetchAbout(); // Reload the about data after adding a new one
        this.showAlert('Berhasil!','Data about berhasil ditambahkan.','success');
        
      } catch (error) {
        console.error(error); // Handle error if any
                this.showAlert('Opps...','Terjadi kesalahan saat menambahkan data about.','error');
      }
    },
    async fetchAbout() {
      try {
        const response = await axios.get(
          "http://127.0.0.1:8000/api/auth/get-about",
          {
            headers: {
              Authorization: `Bearer ${sessionStorage.getItem("token")}`
            }
          }
        );
        this.aboutList = response.data.data; // Update the aboutList with data from the server
      } catch (error) {
        console.error(error); // Handle error if any
        this.showAlert('Opps...','Terjadi kesalahan saat mengambil data about.','error');
      }
    },
    showAlert(title, text, icon) {
      this.$swal({
        title: "Request Success",
        text: "Data Berhasil Dikirim!",
        icon: "success", // Atau gunakan icon lain sesuai kebutuhan
      }).then(() => {
        $("#tambahAboutModal").modal("hide");
      });
    },
  },
  created() {
    this.fetchAbout(); // Fetch about data when the component is created
    // Other authentication logic here
  }
};
</script>
