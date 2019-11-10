const API = 'https://raw.githubusercontent.com/GeekBrainsTutorial/online-store-api/master/responses';

const app = new Vue({
    el: '#app',
    data: {
        catalogUrl: '/catalogData.json',
        products: [],
        imgCatalog: 'https://placehold.it/200x150',
        searchLine : '',    // Наш ввод строик поиска
        filtered: [],       // Отфильтрованные товары
        isVisible: false,   // Отображение видимости корзины
        inCart: [],         // Товары в корзине
        totalCartPrice: 0,  // Цена корзины
    },
    methods: {
        getJson(url){
            return fetch(url)
                .then(result => result.json())
                .catch(error => {
                    console.log(error);
                })
        },
        addProduct(product){
            let prodInCart = this.inCart.find(el => el.id_product === product.id_product);
            if (prodInCart) {
                prodInCart.quantity++;
                this.totalCartPrice += prodInCart.price;
            } else {
                let prod = Object.assign({quantity: 1}, product);   // Создаем новый объект
                this.inCart.push(prod);
                this.totalCartPrice += prod.price;
            }
        },
        removeProduct(product){
            let prodInCart = this.inCart.find(el => el.id_product === product.id_product);
            if (prodInCart.quantity > 1) {
                prodInCart.quantity--;
                this.totalCartPrice -= prodInCart.price;
            } else {
                this.inCart.splice(this.inCart.indexOf(prodInCart), 1);
                this.totalCartPrice -= prodInCart.price;
            }
        },
        filterGoods(){                                                  // Обработчик строки поиска
            const regexp = new RegExp(this.searchLine , 'i');
            this.filtered = this.products.filter(product => regexp.test(product.product_name));
        }
    },
    mounted(){
        this.getJson(`${API + this.catalogUrl}`)        // Получаем каталог
            .then(data => {
                for(let el of data){
                    this.products.push(el);     // Пришлось добавить и туда и туда, наверное костыль, но без него не получилось
                    this.filtered.push(el);     // Пришлось добавить и туда и туда, наверное костыль, но без него не получилось
                }
            });
        this.getJson(`${API}/getBasket.json`)        // Получаем корзину
            .then(data => {
                this.totalCartPrice = data.amount;
                let listOfGoods = data.contents;
                for(let el of listOfGoods){
                    this.inCart.push(el);
                }
            });
    }
});
