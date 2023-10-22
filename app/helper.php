<?php

function asset($path){
    if(!is_null($path)){
        echo "public/".$path;
    }
    else{
        echo "";
    }
}


function route($path) {
    if (!is_null($path)){
        echo "route.php?{$path}";
    }

}
