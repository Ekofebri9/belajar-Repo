<?php
$data=array(array('a','c','b','e','d'),array('g','e','f'));
$datalain=array(array('g','h','i','j'),array('a','c','b','e','d'),array('g','e','f'));
function sort_array($array){
    $jml_isi=count($array);
    for ($i = 0; $i < $jml_isi; $i++) {
        for ($ii = $i; $ii < $jml_isi; $ii++) {
            if(count($array[$ii]) < count($array[$i])){
                $tmp=$array[$ii];
                $array[$ii]=$array[$i];
                $array[$i]=$tmp;
            }
        }
        $jml_isi_dalam=count($array[$i]);
        for ($a = 0; $a < $jml_isi_dalam; $a++) {
            for ($aa = $a; $aa < $jml_isi_dalam; $aa++) {
                if($array[$i][$aa] < $array[$i][$a]){
                    $tmp=$array[$i][$aa];
                    $array[$i][$aa]=$array[$i][$a];
                    $array[$i][$a]=$tmp;
                }
            }
        }    
    }
    print_r($array);
}
print_r($datalain);
echo "=========\n menjadi \n=========\n";
sort_array($datalain);
?>
