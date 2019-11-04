const API = 'https://raw.githubusercontent.com/GeekBrainsTutorial/online-store-api/master/responses';

let getRequest = (url, cb) => {
    let xhr = new XMLHttpRequest();
    xhr.open('GET', url, true);
    xhr.onreadystatechange = () => {
        if (xhr.readyState === 4){
            if (xhr.status !== 200){
                console.log('Error');
            } else {
                cb(xhr.responseText);
            }
        }
    };
    xhr.send();
};

// XMLHttpRequest with Promise
let getRequestPromise = (url, cb) => {
    let xhr = new XMLHttpRequest();
    return new Promise((resolve, reject) => {
        xhr.onreadystatechange = () => {
            if (xhr.readyState === 4) {
                if (xhr.status === 200) {
                    resolve(xhr);
                } else {
                    reject(xhr.status);
                }
            }
        };
        xhr.open('GET', url, true);
        xhr.send();
    });
};

class ProductItem {
    constructor(product, img='https://placehold.it/200x150') {
        this.product_name = product.product_name;
        this.price = product.price;
        this.id_product = product.id_product;
        this.img = img;
    }

    // Метод отвечающий за рендер нашей разметки
    render() {
        return `<div class="product-item" data-id="${this.id_product}">
                    <img src="${this.img}" alt="">
                    <h3>${this.product_name}</h3>
                    <p>${this.price} ₽</p>
                    <button class="by-btn">Добавить</button>
                </div>`;
    }
}

class ProductList {
    constructor(container = '.products') {      // В конструктор добавляем контейнер, хранящий селектор по которому будем делать выборку
        this.container = container;
        this.goods = [];                // Массив товаров, который придет с сервера
        this.allProducts = [];         // Массив, который будет уже хранить всю разметку, с уже сгенерироваными товарами
        this._getProducts()
            .then(data => {
                this.goods = [...data];
                this._render();
            });
        // this._fetchProducts();
    }

    // _fetchProducts() {
    //     getRequest(`${API}/catalogData.json`, (data) => {
    //         this.goods = JSON.parse(data);
    //         console.log(this.goods);
    //         this._render();
    //     });
    // }

    _getProducts() {
        return fetch(`${API}/catalogData.json`)
            .then(result => result.json())
            .catch(error => {
                console.log('Error: ', error);
            });
    }

    _render() {
        const block = document.querySelector(this.container);     // Получим блок для рендера, куда будем помещать товары

        for (let product of this.goods) {
            const productObject = new ProductItem(product);
            this.allProducts.push(productObject);
            block.insertAdjacentHTML('beforeend', productObject.render());
        }
    }
}

// Cart
class Cart{
    constructor(product, img = 'https://placehold.it/50x100'){
        this.goods = [];
        //this.data = [];
        this._getCartProducts()
            .then(data => {
                //this.data = data;
                this.amount = data.amount;
                this.countGoods = data.countGoods;
                this.goods = [...data.contents];
                this._render();
            });

    }

    // Get Basket list
    _getCartProducts() {
        return fetch(`${API}/getBasket.json`)
            .then(result => result.json())
            .catch(error => {
                console.log('Error: ', error);
            });
    }

    _render() {
         // return `<div class="cart-item">
         //
         //         </div>`
        console.log(this.goods);
    }
}

const cart = new Cart();
const list = new ProductList();