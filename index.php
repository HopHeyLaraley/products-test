<?php

$config = include_once "config.php";

include_once "app/db.php";
include_once "app/classes/CProducts.php";

$productsObj = new CProducts($pdo);
$products = $productsObj->select($config['limit']);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        td, th{
            text-align: center;
            padding: 10px;
            border: 1px solid black;
        }
    </style>
    <script src="public/jquery-3.7.1.min.js"></script>
</head>
<body>
    <table>
        <tr>
            <th>ID Товара</th>
            <th>Название</th>
            <th>Цена</th>
            <th>Артикль</th>
            <th>Количество</th>
            <th>Дата</th>
        </tr>
        <?php foreach($products as $product) { if($product['visible']) { ?>
            <tr data-product-id="<?=$product['id'];?>">
                <td><?=$product['product_id'];?></td>
                <td><?=$product['product_name'];?></td>
                <td><?=$product['product_price'];?></td>
                <td><?=$product['product_article'];?></td>
                <td><button class="add_count">+</button><span data-product-id="<?=$product['id'];?>"><?=$product['product_quantity'];?></span><button class="minus_count">-</button></td>
                <td><?=$product['date_create'];?></td>
                <td><button class="hide-btn">Скрыть</button></td>
            </tr>
        <?php }} ?>
    </table>

    <script>
        $(document).ready(function() {
            $('.hide-btn').click(function() {
                var productId = $(this).closest('tr').data('product-id');

                $.ajax({
                    url: 'http://products/app/handler.php',
                    type: 'POST',
                    data: {
                        id: productId,
                        action: "hide"
                    },
                    success: function(response) {
                        $('tr[data-product-id="' + productId + '"]').remove();
                    },
                    error: function(e) {
                        console.log(e);
                    }
                });
            });

            $('.add_count').click(function(){
                var productId = $(this).closest('tr').data('product-id');
                $.ajax({
                    url: 'http://products/app/handler.php',
                    type: 'POST',
                    data: {
                        id: productId,
                        action: "addcount"
                    },
                    success: function(response) {
                        count = Number($('span[data-product-id="' + productId + '"]').text());
                        count += 1;
                        $('span[data-product-id="' + productId + '"]').html(count);
                    }
                });
            });

            $('.minus_count').click(function(){
                var productId = $(this).closest('tr').data('product-id');
                $.ajax({
                    url: 'http://products/app/handler.php',
                    type: 'POST',
                    data: {
                        id: productId,
                        action: "minuscount"
                    },
                    success: function(response) {
                        count = Number($('span[data-product-id="' + productId + '"]').text());
                        count -= 1;
                        $('span[data-product-id="' + productId + '"]').html(count);
                    }
                });
            });
        });

    </script>
</body>
</html>