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
          <h1 class="h3 mb-0 text-gray-800 mb-5 text-center">Visi dan Misi</h1>

          <!-- Tambah Visi Modal -->
          <div
            class="modal"
            id="tambahVisiModal"
            tabindex="-1"
            role="dialog"
            aria-labelledby="tambahVisiModalLabel"
            aria-hidden="true"
          >
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="tambahVisiModalLabel">
                    Tambah Visi
                  </h5>
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
                  <!-- Form untuk menambahkan visi -->
                  <textarea
                    class="form-control"
                    v-model="newVisi"
                    placeholder="Masukkan Visi"
                  ></textarea>
                </div>
                <div class="modal-footer">
                  <button
                    type="button"
                    class="btn btn-primary"
                    @click="tambahVisi"
                  >
                    Simpan
                  </button>
                </div>
              </div>
            </div>
          </div>

          <!-- Tambah Misi Modal -->
          <div
            class="modal"
            id="tambahMisiModal"
            tabindex="-1"
            role="dialog"
            aria-labelledby="tambahMisiModalLabel"
            aria-hidden="true"
          >
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="tambahMisiModalLabel">
                    Tambah Misi
                  </h5>
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
                  <!-- Form untuk menambahkan misi -->
                  <textarea
                    class="form-control"
                    v-model="newMisi"
                    placeholder="Masukkan Misi"
                  ></textarea>
                </div>
                <div class="modal-footer">
                  <button
                    type="button"
                    class="btn btn-primary"
                    @click="tambahMisi"
                  >
                    Simpan
                  </button>
                </div>
              </div>
            </div>
          </div>

          <div
            class="btn-group"
            role="group"
            aria-label="Basic mixed styles example"
          >
            <button 
              type="button" 
              class="btn btn-warning"
              data-toggle="modal"
              data-target="#tambahVisiModal">
              Buat Visi
            </button>
            <button 
              type="button" 
              class="btn btn-primary"
              data-toggle="modal"
              data-target="#tambahMisiModal">
              Tambah Misi
            </button>
          </div>

          <!-- Tabel Visi -->
          <div class="table-responsive mt-3 mb-3">
            <table class="display table table-striped">
              <thead>
                <tr>
                  <th scope="col" style="width: 50px">No</th>
                  <th scope="col">Visi</th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="(item, index) in visiList" :key="item.id">
                  <td>{{ index + 1 }}</td>
                  <td>{{ item.visi }}</td>
                </tr>
              </tbody>
            </table>
          </div>

          <!-- Tabel Misi -->
          <div class="table-responsive">
            <table class="display table table-striped">
              <thead>
                <tr>
                  <th scope="col" style="width: 50px">No</th>
                  <th scope="col">Aksi</th>
                  <th scope="col">Misi</th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="(item, index) in misiList" :key="item.id">
                  <td>{{ index + 1 }}</td>
                  <td><button class="btn btn-warning">Update</button></td>
                  <td>{{ item.misi }}</td>
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
  </div>
  <!-- End of Page Wrapper -->
</template>

<script>
import axios from "axios";
import Swal from 'sweetalert2';

export default {
  data() {
    return {
      user_id: "",
      newVisi: "",
      newMisi: "",
      visiList: [],
      misiList: [],
    };
  },
  methods: {
    async tambahVisi() {
      try {
        const response = await axios.post(
          "http://127.0.0.1:8000/api/auth/create-visi",
          {
            visi: this.newVisi
          },
          {
            headers: {
              Authorization: `Bearer ${sessionStorage.getItem("token")}`
            }
          }
        );
        console.log(response.data); // Handle response from server
        this.newVisi = ""; // Clear input field after successful submission
        this.fetchVisi(); // Reload the visi data after adding a new one
        await Swal.fire({
          icon: 'success',
          title: 'Visi berhasil ditambahkan',
          showConfirmButton: false,
          timer: 1500
        });
      } catch (error) {
        console.error(error); // Handle error if any
        await Swal.fire({
          icon: 'error',
          title: 'Oops...',
          text: 'Terjadi kesalahan saat menambahkan visi'
        });
      }
    },
    async tambahMisi() {
      try {
        const response = await axios.post(
          "http://127.0.0.1:8000/api/auth/create-misi",
          {
            misi: this.newMisi
          },
          {
            headers: {
              Authorization: `Bearer ${sessionStorage.getItem("token")}`
            }
          }
        );
        console.log(response.data); // Handle response from server
        this.newMisi = ""; // Clear input field after successful submission
        this.fetchMisi(); // Reload the misi data after adding a new one
        await Swal.fire({
          icon: 'success',
          title: 'Misi berhasil ditambahkan',
          showConfirmButton: false,
          timer: 1500
        });
      } catch (error) {
        console.error(error); // Handle error if any
        await Swal.fire({
          icon: 'error',
          title: 'Oops...',
          text: 'Terjadi kesalahan saat menambahkan misi'
        });
      }
    },
    async fetchVisi() {
      try {
        const response = await axios.get(
          "http://127.0.0.1:8000/api/auth/get-visi",
          {
            headers: {
              Authorization: `Bearer ${sessionStorage.getItem("token")}`
            }
          }
        );
        this.visiList = response.data.data; // Update the visiList with data from the server
      } catch (error) {
        console.error(error); // Handle error if any
      }
    },
    async fetchMisi() {
      try {
        const response = await axios.get(
          "http://127.0.0.1:8000/api/auth/get-misi",
          {
            headers: {
              Authorization: `Bearer ${sessionStorage.getItem("token")}`
            }
          }
        );
        this.misiList = response.data.data; // Update the misiList with data from the server
      } catch (error) {
        console.error(error); // Handle error if any
      }
    }
  },
  created() {
    this.fetchVisi(); // Fetch visi data when the component is created
    this.fetchMisi(); // Fetch misi data when the component is created

    // Check token and perform authentication logic here
  }
};
</script>
