<?php
    include "config.php";
function generateSlug($text)
{
    $text = strtolower(trim($text));
    $text = preg_replace('/\s+/', '_', $text);
    return $text;
}

$stmt = $pdo->query("SELECT id, title FROM room_cateo");
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($rows as $row) {
    $slug = generateSlug($row['title']);
    $id = $row['id'];

    $updateStmt = $pdo->prepare("UPDATE your_table SET slug = :slug WHERE id = :id");
    $updateStmt->bindParam(':slug', $slug, PDO::PARAM_STR);
    $updateStmt->bindParam(':id', $id, PDO::PARAM_INT);
    $updateStmt->execute();
}
?>