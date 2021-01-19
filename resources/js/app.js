import vSelect from 'vue-select'
import VuePictureSwipe from 'vue-picture-swipe';
import KProgress from 'k-progress';
import VueClipboard from 'vue-clipboard2'

Vue.use(VueClipboard);

Vue.component('vue-picture-swipe', VuePictureSwipe);

require('./bootstrap');

window.Vue = require('vue');
Vue.prototype.$files = [];
Vue.removedFiles = [];

Vue.component('v-select', vSelect);
Vue.component('k-progress', KProgress);


Date.prototype.yyyySmmSdd = function() {
    var mm = this.getMonth() + 1;
    var dd = this.getDate();

    return [this.getFullYear(),
        (mm>9 ? '' : '0') + mm,
        (dd>9 ? '' : '0') + dd
    ].join('-');
};


import router from './routes/routes'
const app = new Vue({
    el: '#app',
    router,
});
