<template>
  <div class="container">
    <div class="row">
      <p class="berita-title">Berita</p>
      <h2 class="some-berita-title">Some Of Our Berita</h2>
    </div>
    <div class="row">
      <div class="col-md-3" v-for="(item, index) in berita" :key="index">
        <div class="card">
          <img :src="item.image" class="card-img-top" alt="Card image cap">
          <div class="card-body">
            <h5 class="card-title">{{ item.title }}</h5>
            <p class="card-text">{{ item.description }}</p>
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
      berita: [
        { title: 'Berita 1', description: 'Deskripsi Berita 1', image: 'https://via.placeholder.com/300x200' },
        { title: 'Berita 2', description: 'Deskripsi Berita 2', image: 'https://via.placeholder.com/300x200' },
        { title: 'Berita 3', description: 'Deskripsi Berita 3', image: 'https://via.placeholder.com/300x200' },
        { title: 'Berita 4', description: 'Deskripsi Berita 4', image: 'https://via.placeholder.com/300x200' }
      ]
    };
  }
};
</script>

<style scoped>
.berita-title {
  font-size: 24px;
  font-weight: bold;
}

.some-berita-title {
  font-size: 36px;
  font-weight: bold;
  margin-top: 20px;
}

.card {
  margin-bottom: 20px;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.card-img-top {
  width: 100%;
  height: 200px;
  object-fit: cover;
}

.card-title {
  font-size: 20px;
  font-weight: bold;
}

.card-text {
  color: #666;
}
</style>
