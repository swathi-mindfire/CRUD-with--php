<?php function randomString($n){
    $chrs = '123456789abcdefghijklmnABCDEFGHIJKLMN';

    $str = '';

    for($i=0;$i< $n; $i++){
        $index = rand(0,strlen($chrs)-1);
        $str.= $chrs[$index];
    }
    return $str;

}
?>