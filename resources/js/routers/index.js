import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter);

import Example from '~/example';

export default new VueRouter({
    mode: 'history',
    scrollBehavior() { 
        return { 
            x:0, 
            y:0 
        } 
    },
    routes: 
    [
        ...Example,
    ],
});