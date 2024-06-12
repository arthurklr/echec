<?php
require_once '../classes/Pawn.php';
require_once '../classes/Rook.php';
require_once '../classes/Knight.php';
require_once '../classes/Bishop.php';
require_once '../classes/Queen.php';
require_once '../classes/King.php';

// Exemple de traitement d'une requête de mouvement
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $from = $_POST['from'];
    $to = $_POST['to'];

    // Valider et traiter le mouvement ici
    // ...

    // Répondre à la requête AJAX
    echo json_encode(['success' => true]);
}
?>
