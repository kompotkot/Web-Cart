// Пример промиса
const bread = true;
const parent = () => {
    return new Promise( (resolve, reject) => {
        // Два исхода событий, либо да либо нет
        // Здесь описывается кокой-то код, который выполняет что-то
        if (bread) {
            resolve('Мама, вот хлеб!');
        } else {
            reject('Хлеба не было!');
        }
    });
};
// Пришел и рассказал результат
parent()
    .then(result => {
        console.log(result)
    })
    .catch(badResult => {
        console.log(badResult)
    });
