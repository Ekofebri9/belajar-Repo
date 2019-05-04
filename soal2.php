<?php
function validasi(){
	$username="ekofebri";
	$password="eKof1234";
	$uppercase = preg_match('@[A-Z]@', $password);
    $lowercase = preg_match('@[a-z]@', $password);
    $number    = preg_match('@[0-9]@', $password);
		if(preg_match("/^[a-z]*$/",$username)&& strlen($username)==8) {
		   if( !$number|| !$lowercase || !$uppercase &&
		    strlen($password)<=8){
		        return false;
		    }else{
                return true;
		    }
		return true;
		}else{
		return false;
		}
}
if(validasi()){
    echo "benar";
}else{
    echo "salah";
}
?>
