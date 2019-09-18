import VueRouter from 'vue-router';
import VueProgressBar from 'vue-progressbar';
import Loading from 'vue-loading-overlay';
import 'vue-loading-overlay/dist/vue-loading.css';
import surveyRoutes from '../../Modules/Survey/Resources/assets/js/router';
import homePageComponent from '../../Modules/Homepage/Resources/assets/js/router';

window.Vue = require('vue');
window.axios = require('axios');
Vue.use(VueRouter);


let allRoutes = []
const baseRoutes = [
	{
		path: '/', 
		component: require('./components/Homepage.vue').default
	},
	{
		path: '/admin/developer', 
		component: require('./components/Developer.vue').default
	},
]

allRoutes = allRoutes.concat(baseRoutes, surveyRoutes);
const routes = allRoutes;

const router = new VueRouter({
	mode: 'history',
  routes // short for `routes: routes`
})

homePageComponent();

Vue.use(VueProgressBar, {
	color: 'rgb(143, 255, 199)',
	failedColor: 'red',
	height: '5px'
});

Vue.use(Loading, {
    // props
    color: 'orange',
    loader: 'dots',
  },{
    // slots
  });

window.Fire = new Vue;
Vue.component('example-component', require('./components/ExampleComponent.vue').default);

Vue.component('pagination', require('laravel-vue-pagination'));

Vue.component(
	'passport-clients',
	require('./components/passport/Clients.vue').default
);

Vue.component(
	'passport-authorized-clients',
	require('./components/passport/AuthorizedClients.vue').default
);

Vue.component(
	'passport-personal-access-tokens',
	require('./components/passport/PersonalAccessTokens.vue').default
);

const app = new Vue({
	el: '#app',
	router
});

