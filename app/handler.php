<?php

include_once "db.php";
include_once "classes/CProducts.php";

$productsObj = new CProducts($pdo);

$id = $_POST['id'];

switch ($_POST['action']) {
    case 'hide':
        $productsObj->hideProduct($id);
        break;
    case 'addcount':
        $productsObj->increaseQuantity($id);
        break;
    case 'minuscount':
        $productsObj->decreaseQuantity($id);
        break;
    default:
        throw new Exception("Unknown action: " . $_POST['action']);
}

?>