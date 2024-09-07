import Vue from 'vue';
import VueRouter from 'vue-router';
import { routes } from './routes';
import VueSweetalert2 from 'vue-sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';
import Swal from 'sweetalert2';



Vue.use(VueRouter);
const router = new VueRouter({
    mode: 'history',
    routes
});

Vue.use(VueSweetalert2);
// Vue.use(Swal);

require('./bootstrap');

window.Vue = require('vue').default;


Vue.component('company-profile-component', require('./components/companyProfile/CompanyProfilePage.vue').default);
Vue.component('navbar-component', require('./components/companyProfile/components/NavbarComponent.vue').default);
Vue.component('jumbotron-component', require('./components/companyProfile/components/JumbotrolComponent.vue').default);
Vue.component('about-component', require('./components/companyProfile/components/About.vue').default);
Vue.component('visi-misi-component', require('./components/companyProfile/components/VisiMisi.vue').default);
Vue.component('benefit-program-component', require('./components/companyProfile/components/BenefitProgram.vue').default);
Vue.component('opportunity-component', require('./components/companyProfile/components/Opportunity.vue').default);
Vue.component('berita-component', require('./components/companyProfile/components/BeritaComponent.vue').default);
Vue.component('tech-component', require('./components/companyProfile/components/TechnologiComponent.vue').default);
Vue.component('project-component', require('./components/companyProfile/components/ProjectComponent.vue').default);
Vue.component('footer-component', require('./components/companyProfile/components/FooterComponent.vue').default);
Vue.component('chat-component', require('./components/companyProfile/components/ChatComponent.vue').default);


// admin panel
Vue.component('navbar', require('./components/adminPanel/NavbarComponent.vue').default);
Vue.component('sidebar-admin', require('./components/adminPanel/Sidebar-Admin.vue').default);
Vue.component('footer', require('./components/adminPanel/FooterComponent.vue').default);



const app = new Vue({
    el: '#app',
    router
});
