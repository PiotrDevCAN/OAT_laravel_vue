export default {
    state: {
        accounts: []
    },
    init() {
        const baseURI = '/OAT_laravel_vue/api/account/list';
        this.$http
            .get(baseURI)
            .then((response) => {
                // additional data key in data
                this.state.accounts = response.data.data;
            });
    },
}