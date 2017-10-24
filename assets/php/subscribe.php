<?php

include_once("classes/connection.class.php");

$db = new Connection();

$email = trim($_POST["email"]);

$nextId = $db->getNextId($db, "emails_newsletter", "id");

try {
    $db->beginTransaction();
    $stmt = $db->prepare("INSERT INTO emails_newsletter (id, email) VALUES (:id, :email)");
    $stmt->bindParam(":id", $nextId, PDO::PARAM_INT);
    $stmt->bindParam(":email", $email, PDO::PARAM_STR);
    $stmt->execute();
    $db->commit();
    print true;
} catch (PDOException $e) {
    $db->rollBack();
    print false;
}
