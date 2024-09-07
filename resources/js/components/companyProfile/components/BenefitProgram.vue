<template>
  <div class="template" id="quality">
    <div class="container">
      <div class="row">
        <p class="feature text-white" data-aos="fade-down" data-aos-duration="1000">Benefits & Programs</p>
      </div>
      <div class="row">
        <div class="col-md-4 mb-4" v-for="(benefit, index) in benefits" :key="index">
          <div class="card" data-aos="fade-up" data-aos-duration="1000">
            <div class="card-img-overlay">
              <h5 class="card-title text-white">{{ benefit.title }}</h5>
              <p class="card-text text-white">{{ benefit.description }}</p>
            </div>
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
      benefits: [
        {
          title: 'Benefit 1',
          description: 'Description for Benefit 1. Lorem ipsum dolor sit amet consectetur adipisicing elit.'
        },
        {
          title: 'Benefit 2',
          description: 'Description for Benefit 2. Lorem ipsum dolor sit amet consectetur adipisicing elit.'
        },
        {
          title: 'Benefit 3',
          description: 'Description for Benefit 3. Lorem ipsum dolor sit amet consectetur adipisicing elit.'
        },
        {
          title: 'Benefit 4',
          description: 'Description for Benefit 4. Lorem ipsum dolor sit amet consectetur adipisicing elit.'
        }
      ]
    };
  }
};
</script>

<style scoped>
.template {
  position: relative; /* Membuat posisi relatif untuk konten di dalamnya */
  padding-top: 50px;
  padding-bottom: 50px;
  background-color: transparent; /* Ubah warna latar belakang menjadi transparan */
}

.template::before {
  content: "";
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-image: url('../../../../../public/images/bismillah.png'); /* Ganti dengan URL gambar latar belakang */
  background-size: cover;
  background-position: center;
  background-attachment: fixed;
  filter: grayscale(70%) blur(5px); /* Efek grayscale dan blur hanya pada latar belakang */
  z-index: -1; /* Menempatkan latar belakang di bawah konten */
}

.feature {
  font-family: "Avenir", sans-serif;
  font-style: normal;
  font-weight: 900;
  font-size: 24px;
  line-height: 33px;
  text-align: center;
}

.card {
  background-color: rgba(0, 0, 0, 0.5); /* Ubah opacity dan warna overlay sesuai kebutuhan */
  border: none;
  border-radius: 10px;
  color: #fff; /* Warna teks di card */
  height: 200px; /* Sesuaikan tinggi card */
}

.card-img-overlay {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  height: 100%;
}

.card-title {
  font-weight: bold;
}

.card-text {
  font-size: 16px; /* Ubah ukuran teks sesuai kebutuhan */
}

.customCard {
  border: none;
  box-shadow: 1px 1px 5px 2px #888888;
}
</style>
