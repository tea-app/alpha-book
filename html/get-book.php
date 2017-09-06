<?php

require_once(__DIR__.'/api/search-book.php');




if($data == false){
    echo "Error";
}else{
    echo('<pre>');
    var_dump($data);
    echo('</pre>');

    echo "===============================<br>";

    echo('<pre>');
    var_dump($histories);
    echo('</pre>');
}