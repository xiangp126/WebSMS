<?php
// pagination show output of mysql query - the tail part

// Calc previous and next number
$prevPage = ($pageNum - 1) < 1 ? 1 : ($pageNum - 1);
$nextPage = ($pageNum + 1) > $pageTotal ? $pageTotal : ($pageNum + 1);

echo "<div id='page' style='padding:5px 0 0 0; text-align:center;'>";

// For salary.php page only, pass id/year/month
if ($getId != "" && $getYear != "" && $getMonth != "") {
    echo "<a href='$url?page=$prevPage&id=$getId&year=$getYear&month=$getMonth'>".'|<'."</a> ";
    for ($i = 1; $i <= $pageTotal; $i++) {
        echo "<a href='$url?page=".$i."&id=$getId&year=$getYear&month=$getMonth'>".$i."</a> ";
    };
    echo "<a href='$url?page=$nextPage&id=$getId&year=$getYear&month=$getMonth'>".'>|'."</a> ";
} else {
    // If it's from a query page, pass id
    if ($getId != "") {
        echo "<a href='$url?page=$prevPage&id=$getId'>".'|<'."</a> ";
        for ($i = 1; $i <= $pageTotal; $i++) {
            echo "<a href='$url?page=".$i."&id=$getId'>".$i."</a> ";
        };
        echo "<a href='$url?page=$nextPage&id=$getId'>".'>|'."</a> ";
    } else {
        // The first page
        echo "<a href='$url?page=$prevPage'>".'|<'."</a> ";
        for ($i = 1; $i <= $pageTotal; $i++) {
            echo "<a href='$url?page=".$i."'>".$i."</a> ";
        };
        // The last page
        echo "<a href='$url?page=$nextPage'>".'>|'."</a> ";
    }
}
echo "</div>";
?>
