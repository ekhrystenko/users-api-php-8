import { createApp } from 'vue';
import MainComponent from './components/MainComponent.vue';

require('./bootstrap')

const app = createApp({
    components: {
        MainComponent,
    }
});

app.mount('#app');