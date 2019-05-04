<?php
$bilangan=3;
cetak($bilangan);

function cetak($jumlah){
    $bintang_t="*";
    $samadengan_t="=";
    if ($jumlah%2==0){
        echo "hanya bilangan ganjil";
        return false;
    }
	else {
        $tengah=($jumlah+1)/2;
        $akhir=$jumlah-1;
        for ($baris = 1; $baris <= $jumlah; $baris++) {
            if($baris==$tengah){
                for ($i = 0; $i < $jumlah; $i++) {
                    echo $bintang_t." ";
                }
               	echo "\n"; 
            }else{
                for ($i = 0; $i < $jumlah; $i++) {
                     if($i==0 || $i==$akhir){
                        echo $bintang_t." ";
                     }else{
                        echo $samadengan_t." ";
                     }
                }
			echo "\n";
			}
		}
		 return true;
	}	
}
?>
