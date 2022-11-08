import './bootstrap';

import { createApp } from 'vue'

import App from './app.vue'

// Vuetify
import 'vuetify/styles'
import '@mdi/font/css/materialdesignicons.css'
import { createVuetify } from 'vuetify'
import * as components from 'vuetify/components'
import * as directives from 'vuetify/directives'

const vuetify = createVuetify({
    icons: {
        defaultSet: 'mdi',
    },
    components,
    directives,
})

createApp(App).use(vuetify).mount("#app")
