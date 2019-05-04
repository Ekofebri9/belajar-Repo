<?php
class sekolah{
	var $SMK;
	var $kuliah;
	function dimana(){
		return $SMK;
		return $kuliah;
	}
}

class kemampuan{
	var $skill;
	function pro(){
		return $skill;
	}
}

 function mengembalikan_biodata(){
    $sekolah= new sekolah();
    $sekolah->kuliah="STMIK Amikom Purwokerto";
    $sekolah->SMK="SMK NB Semarang";

	$kemampuan1= new kemampuan();
    $kemampuan1->skill="PHP";
    $kemampuan2= new kemampuan();
    $kemampuan2->skill="HTML";
    $kemampuan=array($kemampuan1,$kemampuan2); 
	
	$biodata=array( 'nama'=> "EKO F",
	                'address'=> "Jl. Soeparto No. 05",
	                'hobbies'=> array("jogging","bela diri","ngoding"),
	                'is_married'=> False,
	                'school'=> $sekolah,
	                'skills'=> $kemampuan);
	
	echo json_encode($biodata);
}
mengembalikan_biodata();
?>