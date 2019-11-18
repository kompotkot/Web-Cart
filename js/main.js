const API = 'https://raw.githubusercontent.com/GeekBrainsTutorial/online-store-api/master/responses';

const app = new Vue({
    el: '#app',
    // data: {
        // userSearch: '',      // Вынесено в отдельный компонент
    // },

    methods: {
        getJson(url){
            return fetch(url)
                .then(result => result.json())
                .catch(error => {
                    this.$root.$refs.error.errorMsg = error;
                    this.$root.$refs.error.showError = true;
                    console.log(this.errorMsg);
                })
        },
    },
    mounted() {
        console.log(this);
    }
});
