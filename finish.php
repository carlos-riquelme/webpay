<?php

session_start();

if ($_SESSION['responseCode'] == '0') {
    echo 'Gracias por su compra';
    return;
} else {
    echo 'Su compra fracasó';
}