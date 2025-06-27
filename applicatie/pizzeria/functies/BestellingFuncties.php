<?php
function haalAlleBestellingenOp($db) {
    $sql = "
        SELECT 
            order_id, 
            client_username, 
            client_name, 
            personnel_username, 
            datetime, 
            status
        FROM pizza_order
        ORDER BY datetime DESC
    ";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function berekenTotaalPrijs($db, $order_id) {
    $stmt = $db->prepare("
        SELECT 
        SUM(p.price * pop.quantity) AS totaal
        FROM pizza_order_product pop
        JOIN product p ON pop.product_name = p.[name]
        WHERE pop.order_id = :order_id
    ");
    $stmt->execute(['order_id' => $order_id]);
    $resultaat = $stmt->fetch(PDO::FETCH_ASSOC);
    return $resultaat['totaal'] ?? 0;
}

//voor in winkelmandje.php:
function voegBestellingToe($db, $klant_gebruikernaam, $address) {
    $stmt = $db->prepare("
        INSERT INTO Pizza_Order (client_username, client_name, personnel_username, datetime, status, address)
        SELECT 
            u.username,
            u.first_name + ' ' + u.last_name AS client_name,
            'Maryam' AS personnel_username,
            CURRENT_TIMESTAMP,
            1,
            :address
        FROM [user] u
        WHERE u.username = :client_username
    ");

    $stmt->execute([
        ':client_username' => $klant_gebruikernaam,
        ':address' => $address
    ]);

    return $db->lastInsertId();
}
?>