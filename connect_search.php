<?php
ob_start();
try {
    $conn = new PDO("mysql:host=localhost;dbname=123;charset=utf8", "root", "");
} catch (PDOException $e) {
    echo $e->getMessage();
}
function selectAll($sql)
{
    $result = $GLOBALS['conn']->query($sql);
    return $result;
}
function exSQL($sql)
{
    $result =  $GLOBALS['conn']->prepare($sql);
    return $result->execute();
}
function editCate($sql)
{
    $result = $GLOBALS['conn']->query($sql);
    return $result->fetchAll();
}

?>