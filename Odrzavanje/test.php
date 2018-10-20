<?php
session_start();
echo session_id();
/*
error_reporting(E_ALL);
ini_set('display_errors', 1);


for($i=36;$i<100;$i++){
    echo "insert into osoba (sifra,ime,prezime,oib,email) values
    (null,'Predavač','$i','$i','tjakopec@gmail.com');\n";
    echo "
    insert into predavac (sifra,osoba,ziroracun) values(null,$i,null)\n;
    ";
}
*/
/*
$ime="zRinKA";

if(strlen($ime)>0){
    $ime = strtoupper(substr($ime,0,1)) . strtolower(substr($ime,1));
    
}

echo $ime;

*/

$hash = password_hash("d",PASSWORD_BCRYPT,array("cost"=>12));
echo $hash;

if($hash==password_verify("d",$hash)){
    echo "OK";
}


/*

echo "insert into operater (email,lozinka,uloga) " . 
" values ('nikola.s89c@hotmail.com','" . 
password_hash("n",PASSWORD_BCRYPT,array("cost"=>12))
. "','admin')";

echo "insert into operater (email,lozinka,uloga) " . 
" values ('saricnikola27@gmail.com','" . 
password_hash("b",PASSWORD_BCRYPT,array("cost"=>12))
. "','korisnik')";


/*
$msg = "First line of text\nSecond line of text";

// use wordwrap() if lines are longer than 70 characters
$msg = wordwrap($msg,70);

// send email
mail("tjakopec@gmail.com","My subject",$msg);

*/



