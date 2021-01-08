export default {
    state: {
        competencies: []
    },
    init() {
        const baseURI = '/OAT_laravel_vue/api/competency/list';
        this.$http
            .get(baseURI)
            .then((response) => {
                // additional data key in data
                this.state.competencies = response.data.data;
            });
    },
}