class ProductList {
    constructor(container = '.products') {      // В конструктор добавляем контейнер, хранящий селектор по которому будем делать выборку
        this.container = container;
        this.goods = [];                // Массив товаров, который придет с сервера
        this.allProducts = [];         // Массив, который будет уже хранить всю разметку, с уже сгенерироваными товарами
        this._fetchProducts();
        this._render();
    }

    _fetchProducts() {                  // Инкапсулирвоаный метод
        this.goods = [
            {id: 1, title: 'Notebook', price: 10000},
            {id: 2, title: 'Mouse', price: 100},
            {id: 3, title: 'Keyboard', price: 250},
            {id: 4, title: 'Gamepad', price: 150, img: ''}
        ];
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


class ProductItem {
    constructor(product, img='https://placehold.it/200x150') {
        this.title = product.title;
        this.price = product.price;
        this.id = product.id;
        this.img = img;
    }

    // Метод отвечающий за рендер нашей разметки
    render() {
        return `<div class="product-item">
                    <h3>${this.title}</h3>
                    <img src="${this.img}" alt="">
                    <p>${this.price} ₽</p>
                    <button class="by-btn">Добавить</button>
                </div>`;
    }
}

const list = new ProductList();

// Cart and Cart elements

class Cart {
    constructor(product){
        this.product = product;
        this.items = [];
        this.totalPrice = 0;            // Отображает суммарную стоимость товаров
    }
    addProduct(product){
    }
    removeItem(item){
    }
    totalCalc(){                        // Добавляем в TotalPrice стоимость
        for(let item of this.items) {
            this.totalPrice += ProductItem(item).price;
        }
    }
    mounted(){          // Показывать или скрывать корзину
    }

}