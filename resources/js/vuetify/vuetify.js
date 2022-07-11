import 'vuetify/styles' // Global CSS has to be imported

import { createVuetify } from 'vuetify'
import * as components from 'vuetify/components'

const vuetify = createVuetify({
    components,
    theme: {
        defaultTheme: 'dark'
    }
})

export default vuetify
