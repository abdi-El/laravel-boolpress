import Vue from 'vue'; // va direttamente a puntare nella cartella node-modules.
import App from './views/App'; // prende il componente App.vue nella cartella views
 // init vue
 const root = new Vue({
     el: '#root',
     render: h=>h(App),
 })