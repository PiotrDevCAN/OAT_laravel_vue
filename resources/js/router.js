import Vue from 'vue'
import Router from 'vue-router'

import firstPage from './components/pages/myFirstVuePage'
import secondPage from './components/pages/mySecondVuePage'

Vue.use(Router)


const routes = [
	{
		path: '/OAT_laravel/vue',
		name: 'vue',
		component: firstPage
	},
	{
		path: '/OAT_laravel/my-new-vue-route',
		name: 'first',
		component: firstPage
	},
	{
		path: '/OAT_laravel/my-new-vue-route-2',
		name: 'second',
		component: secondPage
	}	
]

export default new Router({
	mode: 'history',
	routes
})