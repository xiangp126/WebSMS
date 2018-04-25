<?php
// pagination show output of mysql query - the head part

if ($itemLimit == "") {
    $itemLimit = 15;
}
// 获取地址栏中page的值，不存在则设为1
$pageNum   = @isset($_GET['page']) ? $_GET['page'] : 1;
$pageTotal = ceil($rowTotal / $itemLimit);

// Limit number of items to show
if($pageNum < 1 ) {
    $pageNum = 1;
} else if($pageNum > $pageTotal) {
    $pageNum = $pageTotal;
}
$offset = ($pageNum - 1) * $itemLimit;

?>
