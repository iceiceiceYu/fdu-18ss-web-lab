<?php

function outputOrderRow($file, $title, $quantity, $price)
{
    $amount = $quantity * $price;
    $price = number_format($price, 2);
    $amount = number_format($amount, 2);

    echo "<tr>";
    echo "<td><img src='images/books/tinysquare/$file'></td>";
    echo "<td class='mdl-data-table__cell--non-numeric'>$title</td>";
    echo "<td>$quantity</td>";
    echo "<td>$$price</td>";
    echo "<td>$$amount</td>";
    echo "</tr>";
}

?>