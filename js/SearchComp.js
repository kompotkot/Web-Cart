Vue.component('search', {
    data() {
        return {
            filtered: [],
            userSearch: '',
        }
    },
    methods: {
        filter() {
            let regexp = new RegExp(this.userSearch, 'i');
            this.filtered = this.$root.$refs.products.products.filter(el => regexp.test(el.product_name));
        }
    },
    mounted(){
        this.$parent.getJson(`${API + this.$root.$refs.products.catalogUrl}`)
            .then(data => {
                for(let el of data){
                    this.filtered.push(el);
                }
            });
    },
    template: `
        <form action="#" class="search-form" @submit.prevent="filter">
            <input type="text" class="search-field" v-model="userSearch">
            <button class="btn-search" type="submit">
                <i class="fas fa-search"></i>
            </button>
        </form>
    `
});
