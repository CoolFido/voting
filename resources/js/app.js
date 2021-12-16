require('./bootstrap');

import Vue from 'vue';
import Project from './components/Project.vue';

new Vue({
    el: '#app',
    components: { 
        Project
    }
});

