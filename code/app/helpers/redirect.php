<?php

function redirect($file){
    header("location:" .URLROOT . $file);
}