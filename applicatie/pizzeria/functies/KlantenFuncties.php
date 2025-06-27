<?php
function geefKlantBestellingOverzicht(array $data): string {
    if (empty($data)) {
        return "<p>Geen bestellingen gevonden.</p>";
    }

    $html = "";
    $huidigeOrderId = null;
    $totaalPrijs = 0;

    foreach ($data as $rij) {
        // Nieuwe bestelling:
        if ($rij['order_id'] !== $huidigeOrderId) {
            if ($huidigeOrderId !== null) {
                $html .= "<tr style='font-weight: bold;'><td colspan='4'>Totaal</td><td>€" . number_format($totaalPrijs, 2, ',', '.') . "</td></tr>";
                $html .= "</table><br>";
                $totaalPrijs = 0; 
            }

            $huidigeOrderId = $rij['order_id'];
            $datum = date("d/m/Y", strtotime($rij['datetime']));
            $html .= "<h3>Bestelling #{$huidigeOrderId} - {$datum}</h3>";
            $html .= "<p>Status: <strong>{$rij['status']}</strong> | Adres: {$rij['address']}</p>";
            $html .= "<table>
                        <tr>
                            <th>Product</th>
                            <th>Aantal</th>
                            <th>Prijs p/stuk</th>
                            <th>Subtotaal</th>
                        </tr>";
        }

        $subtotaal = $rij['price'] * $rij['quantity'];
        $totaalPrijs += $subtotaal;

        $html .= "<tr>
                    <td>{$rij['product_name']}</td>
                    <td>{$rij['quantity']}</td>
                    <td>€" . number_format($rij['price'], 2, ',', '.') . "</td>
                    <td>€" . number_format($subtotaal, 2, ',', '.') . "</td>
                </tr>";
    }

    if ($huidigeOrderId !== null) {
        $html .= "<tr style='font-weight: bold;'><td colspan='4'>Totaal</td><td>€" . number_format($totaalPrijs, 2, ',', '.') . "</td></tr>";
        $html .= "</table>";
    }

    return $html;
}
?>