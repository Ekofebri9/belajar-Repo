<?php
function acak($ulang){
    $karakter= 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz123456789';
    $acak=array();
    for ($i = 0; $i < $ulang; $i++) {
        $string = '';
        for ($ii = 0; $ii < 32; $ii++) {
            $pos = rand(0, strlen($karakter)-1);
            $string .= $karakter{$pos};
        }
        $acak[$i]=$string."\n";
    }
	//untuk pengecekan nilai string dalam array tidak sama.
    return array_unique($acak);
	//========================
}

$random=acak(10);
foreach ($random as $acak) {
    echo $acak;
}
?>