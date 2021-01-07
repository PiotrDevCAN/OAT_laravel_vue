import Vue from 'vue'
import Router from 'vue-router'

import home from './components/pages/home'

// request
import requestCreate from './components/pages/request/create'
import requestList from './components/pages/request/list'
import requestApproved from './components/pages/request/approved'

// account
import accountCreate from './components/pages/account/create'
import accountList from './components/pages/account/list'

// competency
import competencyCreate from './components/pages/competency/create'
import competencyList from './components/pages/competency/list'

// delegate
import delegateCreate from './components/pages/delegate/create'
import delegateList from './components/pages/delegate/list'

// log
import logList from './components/pages/log/list'

// location
import locationCreate from './components/pages/location/create'
import locationList from './components/pages/location/list'

import access from './components/pages/access'
import login from './components/pages/login'
import logout from './components/pages/logout'

Vue.use(Router)

const routes = [
	{
		path: '/OAT_laravel_vue/',
		name: 'home',
		component: home
	},
	{
		path: '/OAT_laravel_vue/request/create',
		name: 'request-create',
		component: requestCreate
	},
	{
		path: '/OAT_laravel_vue/request/list',
		name: 'request-list',
		component: requestList
	},
	{
		path: '/OAT_laravel_vue/request/approved',
		name: 'request-approved',
		component: requestApproved
	},
	{
		path: '/OAT_laravel_vue/account/create',
		name: 'account-create',
		component: accountCreate
	},
	{
		path: '/OAT_laravel_vue/account/list',
		name: 'account-list',
		component: accountList
	},
	{
		path: '/OAT_laravel_vue/competency/create',
		name: 'competency-create',
		component: competencyCreate
	},
	{
		path: '/OAT_laravel_vue/competency/list',
		name: 'competency-list',
		component: competencyList
	},
	{
		path: '/OAT_laravel_vue/delegate/create',
		name: 'delegate-create',
		component: delegateCreate
	},
	{
		path: '/OAT_laravel_vue/delegate/list',
		name: 'delegate-list',
		component: delegateList
	},
	{
		path: '/OAT_laravel_vue/logs/list',
		name: 'logs-list',
		component: logList
	},
	{
		path: '/OAT_laravel_vue/location/create',
		name: 'location-create',
		component: locationCreate
	},
	{
		path: '/OAT_laravel_vue/location/list',
		name: 'location-list',
		component: locationList
	},
	{
		path: '/OAT_laravel_vue/delegate/my/create',
		name: 'delegate-my-create',
		component: delegateCreate
	},
	{
		path: '/OAT_laravel_vue/delegate/my/list',
		name: 'rdelegate-my-list',
		component: delegateList
	},
	{
		path: '/OAT_laravel_vue/access/my',
		name: 'access-my',
		component: access
	},
	{
		path: '/OAT_laravel_vue/login',
		name: 'login',
		component: login
	},
	{
		path: '/OAT_laravel_vue/logout',
		name: 'logout',
		component: logout
	}
]

export default new Router({
	mode: 'history',
	routes
})