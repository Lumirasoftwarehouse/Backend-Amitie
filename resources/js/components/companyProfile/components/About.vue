<template>
  <div class="container" id="service">
    <div class="row justify-content-center align-items-center">
      <div class="col-sm-6">
        <p class="ourservice" data-aos="fade-down" data-aos-duration="1000">
          About SBLF
        </p>
        <p data-aos="fade-right" data-aos-duration="1000">
          SBLF (Strategic Business Leader Forum) adalah sebuah forum bisnis
          interaktif yang dirancang khusus untuk membawa para pemimpin bisnis,
          pengusaha, dan profesional industri untuk bersama dalam sebuah
          networking efektif untuk mengatasi tantangan global, regional, dan
          nasional. Bersama mengedepankan isu isu penting, menyertakan strategi
          breakthrough yang penting dalam resiliensi bisnis melalui catalytic
          collaboration, leadership and corporate energy, strategic game changer
          business.
        </p>
      </div>
      <div class="col-sm-6">
        <!-- Ganti URL iframe dengan URL video YouTube yang benar -->
        <iframe
          width="70%"
          height="200"
          src="https://www.youtube.com/embed/DzSb6365vbk"
          frameborder="0"
          allowfullscreen
        ></iframe>
      </div>
    </div>
  </div>
</template>

<script>
export default {};
</script>

<style scoped>
@media only screen and (max-width: 600px) {
  h2 {
    font-size: 35px !important;
  }
}
.customCard {
  border: none;
  box-shadow: 1px 1px 5px 2px #888888;
}

.customRow {
  padding: 10px 50px 10px 50px;
}

.ourservice {
  margin-top: 50px;

  font-family: "Avenir", sans-serif;
  font-style: normal;
  font-weight: 900;
  font-size: 24px;
  line-height: 33px;
  /* identical to box height */

  color: #000064;
}
</style>
