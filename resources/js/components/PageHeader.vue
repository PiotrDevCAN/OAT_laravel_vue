<template>
  <cv-header aria-label="OAT application header">

    <cv-header-menu-button aria-label="Header menu" aria-controls="side-nav" />

    <cv-skip-to-content href="#main-content">
        Skip to content
    </cv-skip-to-content>

    <cv-header-name to="/OAT_laravel_vue" prefix="IBM" v-text="appName"></cv-header-name>

    <cv-header-nav aria-label="OAT application nav">
        <cv-header-menu-item to="/OAT_laravel_vue">Home</cv-header-menu-item>
        <cv-header-menu aria-label="Request" title="Request">
            <cv-header-menu-item to="/OAT_laravel_vue/request/create">
                Create
            </cv-header-menu-item>
            <cv-header-menu-item to="/OAT_laravel_vue/request/list">
                List
            </cv-header-menu-item>
            <cv-header-menu-item to="/OAT_laravel_vue/request/approved">
                Approved
            </cv-header-menu-item>
        </cv-header-menu>
        <cv-header-menu aria-label="Accounts" title="Accounts">
            <cv-header-menu-item to="/OAT_laravel_vue/account/create">
                Create
            </cv-header-menu-item>
            <cv-header-menu-item to="/OAT_laravel_vue/account/list">
                List
            </cv-header-menu-item>
        </cv-header-menu>
        <cv-header-menu aria-label="Service Lines" title="Service Lines">
            <cv-header-menu-item to="/OAT_laravel_vue/competency/create">
                Create
            </cv-header-menu-item>
            <cv-header-menu-item to="/OAT_laravel_vue/competency/list">
                List
            </cv-header-menu-item>
        </cv-header-menu>
        <cv-header-menu aria-label="Delegates" title="Delegates">
            <cv-header-menu-item to="/OAT_laravel_vue/delegate/create">
                Create
            </cv-header-menu-item>
            <cv-header-menu-item to="/OAT_laravel_vue/delegate/list">
                List
            </cv-header-menu-item>
        </cv-header-menu>
        <cv-header-menu aria-label="Locations" title="Locations">
            <cv-header-menu-item to="/OAT_laravel_vue/location/create">
                Create
            </cv-header-menu-item>
            <cv-header-menu-item to="/OAT_laravel_vue/location/list">
                List
            </cv-header-menu-item>
        </cv-header-menu>
        <cv-header-menu-item to="/OAT_laravel_vue/logs/list">
            Logs
        </cv-header-menu-item>
        <cv-header-menu aria-label="My Delegates" title="My Delegates">
            <cv-header-menu-item to="/OAT_laravel_vue/delegate/my/create">
                Create
            </cv-header-menu-item>
            <cv-header-menu-item to="/OAT_laravel_vue/delegate/my/list">
                List
            </cv-header-menu-item>
        </cv-header-menu>
        <cv-header-menu-item to="/OAT_laravel_vue/access/my">My Access</cv-header-menu-item>
        <cv-header-menu-item to="/OAT_laravel_vue/login">Log on</cv-header-menu-item>
    </cv-header-nav>

    <template slot="header-global">
        <cv-header-global-action aria-label="Notifications" aria-controls="notifications-panel" @click="actionNotifications" >
            <Notification20 />
        </cv-header-global-action>
        <cv-header-global-action aria-label="User avatar" aria-controls="user-panel" @click="actionUserAvatar" >
            <UserAvatar20 />
        </cv-header-global-action>
        <cv-header-global-action aria-label="App switcher" aria-controls="switcher-panel" @click="actionAppSwitcher">
            <AppSwitcher20 />
        </cv-header-global-action>
    </template>

    <template slot="left-panels" v-if="areLeftPanels">
        <cv-side-nav id="side-nav" rail>
            <cv-side-nav-items>
                
                <cv-header-side-nav-items v-if="header_nav_contents" divider>
                    <cv-header-menu-item href="javascript:void(0)">
                        Link 1 div
                    </cv-header-menu-item>
                    <cv-header-menu-item href="javascript:void(0)">
                        Link 2 div
                    </cv-header-menu-item>
                    <cv-header-menu-item href="javascript:void(0)">
                        Link 3 div
                    </cv-header-menu-item>
                    <cv-header-menu aria-label="Link 4" title="Link 4" :hover-toggle="false">
                        <cv-header-menu-item href="javascript:void(0)">
                            Submenu Link 1 div
                        </cv-header-menu-item>
                        <cv-header-menu-item href="javascript:void(0)">
                            Submenu Link 2 div
                        </cv-header-menu-item>
                        <cv-header-menu-item href="javascript:void(0)">
                            Submenu Link 3 div
                        </cv-header-menu-item>
                    </cv-header-menu>
                </cv-header-side-nav-items>

                <cv-side-nav-link to="/OAT_laravel_vue">
                    <template v-slot:nav-icon><Home16 /></template>
                    Home
                </cv-side-nav-link>
                <cv-side-nav-menu title="Request">
                    <template v-slot:nav-icon><RequestQuote16 /></template>
                    <cv-side-nav-menu-item to="/OAT_laravel_vue/request/create">
                        Create
                    </cv-side-nav-menu-item>
                    <cv-side-nav-menu-item to="/OAT_laravel_vue/request/list">
                        List
                    </cv-side-nav-menu-item>
                    <cv-side-nav-menu-item to="/OAT_laravel_vue/request/approved">
                        Approved
                    </cv-side-nav-menu-item>
                </cv-side-nav-menu>
                <cv-side-nav-menu title="Accounts">
                    <template v-slot:nav-icon><Account16 /></template>
                    <cv-side-nav-menu-item to="/OAT_laravel_vue/account/create">
                        Create
                    </cv-side-nav-menu-item>
                    <cv-side-nav-menu-item to="/OAT_laravel_vue/account/list">
                        List
                    </cv-side-nav-menu-item>
                </cv-side-nav-menu>
                <cv-side-nav-menu title="Service Lines">
                    <template v-slot:nav-icon><Branch16 /></template>
                    <cv-side-nav-menu-item to="/OAT_laravel_vue/competency/create">
                        Create
                    </cv-side-nav-menu-item>
                    <cv-side-nav-menu-item to="j/OAT_laravel_vue/competency/list">
                        List
                    </cv-side-nav-menu-item>
                </cv-side-nav-menu>
                <cv-side-nav-menu title="Delegates">
                    <template v-slot:nav-icon><Stamp16 /></template>
                    <cv-side-nav-menu-item to="/OAT_laravel_vue/delegate/create">
                        Create
                    </cv-side-nav-menu-item>
                    <cv-side-nav-menu-item to="/OAT_laravel_vue/delegate/list">
                        List
                    </cv-side-nav-menu-item>
                </cv-side-nav-menu>
                <cv-side-nav-menu title="Locations">
                    <template v-slot:nav-icon><Location16 /></template>
                    <cv-side-nav-menu-item to="/OAT_laravel_vue/location/create">
                        Create
                    </cv-side-nav-menu-item>
                    <cv-side-nav-menu-item to="/OAT_laravel_vue/location/list">
                        List
                    </cv-side-nav-menu-item>
                </cv-side-nav-menu>
                <cv-side-nav-link to="/OAT_laravel_vue/log/list">
                    <template v-slot:nav-icon><Archive16 /></template>
                    Logs
                </cv-side-nav-link>
                <cv-side-nav-menu title="My Delegates">
                    <template v-slot:nav-icon><Stamp16 /></template>
                    <cv-side-nav-menu-item to="/OAT_laravel_vue/delegate/my/create">
                        Create
                    </cv-side-nav-menu-item>
                    <cv-side-nav-menu-item to="/OAT_laravel_vue/delegate/my/list">
                        List
                    </cv-side-nav-menu-item>
                </cv-side-nav-menu>
                <cv-side-nav-link to="/OAT_laravel_vue/access/my">
                    <template v-slot:nav-icon><User16 /></template>
                    My Access
                </cv-side-nav-link>
                <cv-side-nav-link to="/OAT_laravel_vue/login">
                    <template v-slot:nav-icon><Fade16 /></template>
                    Log on
                </cv-side-nav-link>           
            </cv-side-nav-items>
        </cv-side-nav>
    </template>

    <template slot="right-panels" v-if="areRightPanels">
        <cv-header-panel  id="notifications-panel">
            Put here all awaiting actions for logged user
        </cv-header-panel>

        <cv-header-panel  id="user-panel">
            Put here some interesting information regarding logged user
        </cv-header-panel>

        <cv-header-panel id="switcher-panel">
            <cv-switcher>
                <cv-switcher-item>
                    <cv-switcher-item-link href="javascript:void(0)" selected>
                        Selected app
                    </cv-switcher-item-link>
                </cv-switcher-item>
                <cv-switcher-item>
                    <cv-switcher-item-link href="javascript:void(0)">
                        Other app
                    </cv-switcher-item-link>
                </cv-switcher-item>
                <cv-switcher-item>
                    <cv-switcher-item-link href="javascript:void(0)">
                        Other app
                    </cv-switcher-item-link>
                </cv-switcher-item>
                <cv-switcher-item>
                    <cv-switcher-item-link href="javascript:void(0)">
                        Other app
                    </cv-switcher-item-link>
                </cv-switcher-item>
                <cv-switcher-item>
                    <cv-switcher-item-link href="javascript:void(0)">
                        Other app
                    </cv-switcher-item-link>
                </cv-switcher-item>
                <cv-switcher-item>
                    <cv-switcher-item-link href="javascript:void(0)">
                        Other app
                    </cv-switcher-item-link>
                </cv-switcher-item>
            </cv-switcher>
        </cv-header-panel>
    </template>

  </cv-header>
</template>

<script>
    import Notification20 from '@carbon/icons-vue/es/notification/20';
    import UserAvatar20 from '@carbon/icons-vue/es/user--avatar/20';
    import AppSwitcher20 from '@carbon/icons-vue/es/app-switcher/20';
    import Fade16 from '@carbon/icons-vue/es/fade/16';
    import Home16 from '@carbon/icons-vue/es/home/16';
    import RequestQuote16 from '@carbon/icons-vue/es/request-quote/16';
    import Account16 from '@carbon/icons-vue/es/account/16';
    import Stamp16 from '@carbon/icons-vue/es/stamp/16';
    import Branch16 from '@carbon/icons-vue/es/branch/16';
    import Archive16 from '@carbon/icons-vue/es/archive/16';
    import Location16 from '@carbon/icons-vue/es/location/16';

    export default {
        name: 'PageHeader',
        components: {
            Notification20, 
            UserAvatar20, 
            AppSwitcher20,
            Fade16,
            Home16,
            RequestQuote16,
            Account16,
            Stamp16,
            Branch16,
            Archive16,
            Location16
        },
        props: {
            appName: String
        },
        data() {
            return {
                areLeftPanels: true,
                areRightPanels: true,
                header_nav_contents: true
            }
        },
        methods: {
            actionNotifications() {

            },
            actionUserAvatar() {

            },
            actionAppSwitcher() {

            }
        },
        mounted () {
            /*
            // console.log('PageHeader '+this.title)
            // state example
            console.log(this.$store.state.user.username)
            // getter example
            console.log(this.$store.getters.firstName)
            // in our component
            console.log(this.$store.getters.lastName)
            // in our component
            console.log(this.$store.getters.prefixedName("Mr."))

            // commit example 1
            this.$store.commit("changeNameByValue", "New Name")
            // value changed
            console.log(this.$store.state.user.fullName)

            // commit example 2
            this.$store.commit("changeName", {
                newName: "New Name 1",
            })
            // value changed
            console.log(this.$store.state.user.fullName)
            
            // commit example 3
            this.$store.commit({
                type: "changeName",
                newName: "New Name 2"
            })
            // value changed
            console.log(this.$store.state.user.fullName)

            // action dispach example
            this.$store.dispatch("changeName", {
                newName: "New Name from Action"
            })
            // value changed
            console.log(this.$store.state.user.fullName)
            */
        }
    };
</script>

<style lang="scss"></style>
