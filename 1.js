function cekPalindrom (input) {
    let x = String(input).split("").reverse().join('');
    if (x==input) {
        console.log( input + " merupakan bilangan palindrom");
    } else {
        console.log( input + " bukan bilangan palindrom");
    }
    return x;
}

console.log(cekPalindrom(1001));