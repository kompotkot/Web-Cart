const products = [
    {id: 1, title: 'Notebook', price: 10000},
    {id: 2, title: 'Mouse', price: 100},
    {id: 3, title: 'Keyboard', price: 250},
    {id: 4, title: 'Gamepad', price: 150}
];


const renderProduct = (title="Товар", price="1997") => {    //Создает карточку товара, добавлены значения переменным по умолчанию
    return `<div class="product-item">
                <h3>${title}</h3>
                <p>${price}</p>
                <button class="by-btn">Добавить</button>
            </div>`;
};

const renderProducts = lst => {
    const productList = lst.map(item => renderProduct(item.title, item.price)).join('');    //.join('') объединяет строку разделеную пробелами
    document.querySelector('.products').innerHTML = productList;
};

renderProducts(products);