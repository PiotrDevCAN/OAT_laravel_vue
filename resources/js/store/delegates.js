export default {
    state: {
        delegates: []
    },
    init() {
        const baseURI = 'http://localhost/OAT_laravel_vue/api/delegate/list';
        this.$http
            .get(baseURI)
            .then((response) => {
                // additional data key in data
                this.state.delegates = response.data.data;
            });
    },
}