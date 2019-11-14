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
                    console.log(error);
                })
        },
    },
    mounted() {
        console.log(this);
    }
});
