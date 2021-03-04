require('./bootstrap');


import {AgGridVue} from "ag-grid-vue";
import "ag-grid-community";

import vSelect from 'vue-select'



window.Vue = require('vue');

import vueStrap from 'vue-strap';



window.axios = require('axios');

window.swal2 = require('sweetalert2');

Vue.component('ag-grid-vue', AgGridVue);
Vue.component('modal', vueStrap.modal);
Vue.component('v-select', vSelect);


//Register Components
Vue.component('home', require('./components/Home.vue').default);
Vue.component('customer-info', require('./components/CustomerInfo.vue').default);


const app = new Vue({
    el: '#appcontent',
    data: {
        vueData: null
    }
});

window.app = app;

