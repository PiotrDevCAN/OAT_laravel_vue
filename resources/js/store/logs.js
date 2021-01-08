export default {
    state: {
        logs: []
    },
    init() {
        const baseURI = '/OAT_laravel_vue/api/log/list';
        this.$http
            .get(baseURI)
            .then((response) => {
                // additional data key in data
                this.state.logs = response.data.data;
            });
    },
}