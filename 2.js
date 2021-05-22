var data = [
    ['T','S','Q','P','R'],
    ['W','U','V']
];

var datalain = [
    ['M','L','O','N'],
    ['T','S','Q','P','R'],
    ['W','U','V']
];

function sort_array(x) {
    firstSort = [];
    for (i=0; i<x.length;i++) {
        firstSort.push(x[i].sort());
    }

    secondSort = firstSort.sort((a,b) => { return a.length-b.length;
    });
    return secondSort;
}

console.log(sort_array(data));
console.log(sort_array(datalain));