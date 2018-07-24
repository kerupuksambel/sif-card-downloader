<?php
    $n = array();
//    $m = array("Hanayo","Rin","Maki","Kotori","Umi","Honoka","Eli","Nico","Nozomi");
    for($x = 0; $x <= 997; $x++){
        $ch = curl_init('http://i.schoolido.lu/c/'.$x.'idolizedKotori.png');
        curl_setopt($ch, CURLOPT_NOBODY, true);
        curl_exec($ch);
        $retcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        // $retcode >= 400 -> not found, $retcode = 200, found.
        curl_close($ch);
//      if found then put it into an array
        if($retcode == 200){
            echo('http://i.schoolido.lu/c/'.$x.'idolizedKotori.png<br/>');
            $c = count($n);
            $n[$c] = $x;
        }else{
            
        }
    }

    for($y = 0; $y <= count($n)-1; $y++){
//      check if the card has the unidolized ver
        $ch = curl_init('http://i.schoolido.lu/c/'.$n[$y].'Kotori.png');
        curl_setopt($ch, CURLOPT_NOBODY, true);
        curl_exec($ch);
        $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        if($code == 200){
//      then save the pic with both ver if found
            $o = fopen("final/".$n[$y]."idolizedKotori.png", 'w');
            $con = file_get_contents('http://i.schoolido.lu/c/'.$n[$y].'idolizedKotori.png');
            fwrite($o, $con);
            $o2 = fopen("final/".$n[$y]."Kotori.png", 'w');
            $con2 = file_get_contents('http://i.schoolido.lu/c/'.$n[$y].'Kotori.png');
            fwrite($o2, $con2);
//        save only the idolized ver if not
        }else{
            $o = fopen("final/".$n[$y]."idolizedKotori.png", 'w');
            $con = file_get_contents('http://i.schoolido.lu/c/'.$n[$y].'idolizedKotori.png');
            fwrite($o, $con);
        }
    }

    print_r($n);
?>