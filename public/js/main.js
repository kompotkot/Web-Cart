const API = 'http://localhost:3000';

const app = new Vue({
    el: '#app',
    methods: {
        getJson(url){
            return fetch(url)
                .then(result => result.json())
                .catch(error => {
                    this.$refs.error.setError(error);
                })
        },
        postJson(url, payload){     // Добавляем метод для обработки post, put, del запросов
            return fetch(url, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json;charset=utf-8'
                },
                body: payload,
            })
                .then(result => {
                    result.json();
                    console.log(result);
                })
                .catch(error => {
                    this.$refs.error.setError(error);
                })
        },
    },
    mounted() {
        console.log(this);
    }
});

