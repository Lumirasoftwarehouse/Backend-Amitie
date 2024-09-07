<template>
  <div class="template" id="portfolio">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <h2 class="portfolio text-center text-white" data-aos="fade-down" data-aos-duration="1000">
            Visi & Misi
          </h2>
        </div>
      </div>
      <!-- Visi -->
      <div class="row mt-5">
        <div class="col-md-12">
          <div class="card p-3 shadow mb-3" data-aos="fade-up" data-aos-duration="1000">
            <h5 class="card-title text-primary">Visi</h5>
            <p class="card-text">Deskripsi visi Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae, veritatis.</p>
          </div>
        </div>
      </div>
      <!-- Misi -->
      <div class="row">
        <div class="col-md-6" v-for="(mission, index) in missions" :key="index">
          <div class="card p-3 shadow mb-2" data-aos="fade-up" data-aos-duration="1000">
            <h5 class="card-title text-primary">{{ mission.title }}</h5>
            <p class="card-text">{{ mission.description }}</p>
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
      missions: [
        {
          title: 'Misi 1',
          description: 'Deskripsi misi 1 Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae, veritatis.'
        },
        {
          title: 'Misi 2',
          description: 'Deskripsi misi 2 Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae, veritatis.'
        },
        {
          title: 'Misi 3',
          description: 'Deskripsi misi 3 Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae, veritatis.'
        },
        {
          title: 'Misi 4',
          description: 'Deskripsi misi 4 Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae, veritatis.'
        },
        {
          title: 'Misi 5',
          description: 'Deskripsi misi 5 Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae, veritatis.'
        }
      ]
    };
  }
};
</script>

<style scoped>
.template {
  padding-top: 80px;
  background-image: linear-gradient(296.53deg, #000064 -32.62%, #060674 84.15%);
  padding-bottom: 80px;
}

.portfolio {
  font-family: "Avenir", sans-serif;
  font-style: normal;
  font-weight: 900;
  font-size: 28px;
  line-height: 38px;
  color: #333;
}

.card {
  border: none;
  transition: transform 0.3s ease;
}

.card:hover {
  transform: translateY(-5px);
}

.card-title {
  font-weight: bold;
}
</style>
