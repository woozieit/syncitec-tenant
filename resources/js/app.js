require('./bootstrap');

import Vue from 'vue'
import VueMeta from 'vue-meta'
import Vuelidate from 'vuelidate'
import PortalVue from 'portal-vue'
import BootstrapVue from 'bootstrap-vue'
import { App, plugin } from '@inertiajs/inertia-vue'
import { InertiaProgress } from '@inertiajs/progress'

Vue.config.productionTip = false
Vue.mixin({ methods: { route: window.route } })
Vue.use(plugin)
Vue.use(PortalVue)
Vue.use(VueMeta)
Vue.use(BootstrapVue)
Vue.use(Vuelidate)

/**
  * SweetAlert2 - pop-up library
  */
import Swal from 'sweetalert2'
window.Swal = Swal;

InertiaProgress.init();

const el = document.getElementById('app')

new Vue({
    metaInfo: {
        titleTemplate: title => (title ? `${title} - AngelCRIS` : 'AngelCRIS'),
    },
    render: h =>
        h(App, {
            props: {
                initialPage: JSON.parse(el.dataset.page),
                resolveComponent: name => require(`@/Pages/${name}`).default,
            },
        }),
    }).$mount(el)
