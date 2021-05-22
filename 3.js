var s ='';
function cetak_gambar(angka) {
    for (i=0; i<angka; i++){
        for (j=0; j<angka; j++) {
            if (i==angka-2 && j!=angka-1 && j!==0|| i==angka-(angka-1) && j!=angka-1 && j!==0) {
                s += '= '
            } else {
               s += '* ' 
            }
        }
        s += '\n'
    }
    return s;
}

console.log(cetak_gambar(5))