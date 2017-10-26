<?php

if (!defined('ROOT_DIR')) {
	define('ROOT_DIR', "{$_SERVER["DOCUMENT_ROOT"]}/");
}

include_once("classes/connection.class.php");

$email = trim($_POST["email"]);

if (!empty($email))
{
	try {
		$conn = new Connection();

		$nextId = $conn->getNextId("emails_newsletter", "id");

	    $conn->db->beginTransaction();
	    $stmt = $conn->db->prepare("INSERT INTO emails_newsletter (id, email) VALUES (:id, :email)");
	    $stmt->bindParam(":id", $nextId, PDO::PARAM_INT);
	    $stmt->bindParam(":email", $email, PDO::PARAM_STR);
	    $stmt->execute();
	    $conn->db->commit();
	    print true;
	} catch (PDOException $e) {
	    $conn->db->rollBack();
	    print false;
	}
}