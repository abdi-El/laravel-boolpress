import Vue from 'vue'; // va direttamente a puntare nella cartella node-modules.
import App from './views/App'; // prende il componente App.vue nella cartella views
import router from './routes.js'

 // init vue
 const root = new Vue({
     el: '#root',
     router,
     render: h=>h(App),
 })