<template>
  <div class="template" id="opportunity">
    <div class="container">
      <div class="row pt-5">
        <div class="col-sm-12">
          <h2 class="portfolio mb-3" data-aos="fade-down" data-aos-duration="1000">Opportunity</h2>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4 mb-4" v-for="(item, index) in items" :key="index">
          <div class="cardopportunity" data-aos="fade-up" data-aos-duration="1000">
            <div class="overlay"></div>
            <div class="box">
              <img src="your-image-url.jpg" alt="Image" />
              <div class="nama">John Doe</div>
              <div class="profesi">Marketing Manager</div>
            </div>
            <div class="txt">
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit, eius.
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
      items: [
        { name: 'John Doe', profession: 'Marketing Manager', text: 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit, eius.' },
        { name: 'Jane Doe', profession: 'Sales Manager', text: 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit, eius.' },
        { name: 'Alice Smith', profession: 'Business Analyst', text: 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit, eius.' },
      ]
    };
  },
};
</script>

<style scoped>
.template {
  padding-top: 50px;
  padding-bottom: 50px;
  background-color: #000064;
}

.portfolio {
  font-family: "Avenir", sans-serif;
  font-style: normal;
  font-weight: 900;
  font-size: 24px;
  line-height: 33px;
  text-align: center;
  color: #ffffff;
}

.cardopportunity {
  width: 280px;
  height: 320px;
  margin: auto;
  background: #ffffff;
  border-radius: 18px;
  overflow: hidden;
  position: relative;
  box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
}

.overlay {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.5);
  z-index: 1;
  border-radius: 18px;
}

.box {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  text-align: center;
  z-index: 2;
  color: #fff;
}

img {
  width: 80px;
  height: 80px;
  border-radius: 50%;
  margin-bottom: 10px;
}

.nama {
  font-family: "Nunito";
  font-weight: 700;
  font-size: 15px;
  margin-bottom: 5px;
}

.profesi {
  font-family: "Nunito";
  font-size: 14px;
  margin-bottom: 20px;
}

.txt {
  font-family: "Nunito";
  font-size: 15px;
  color: #fff;
  padding: 10px;
  height: 100px;
  overflow: hidden;
  text-overflow: ellipsis;
}

@media only screen and (max-width: 600px) {
  .cardopportunity {
    width: 90%;
  }
}
</style>
