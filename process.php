<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titles = $_POST['title'] ?? [];
    $qtys   = $_POST['qty'] ?? [];
    $prices = $_POST['price'] ?? [];

    $grandSubtotal = 0;
    $output = "<table>
        <tr><th>Book</th><th>Quantity</th><th>Unit Price</th><th>Subtotal</th></tr>";

    for ($i = 0; $i < count($titles); $i++) {
        $title = htmlspecialchars($titles[$i]);
        $qty   = (int)$qtys[$i];
        $price = (float)$prices[$i];

        if ($qty > 0) {
            $subtotal = $price * $qty;
            $grandSubtotal += $subtotal;

            $output .= "<tr>
                <td>{$title}</td>
                <td>{$qty}</td>
                <td>RM " . number_format($price, 2) . "</td>
                <td>RM " . number_format($subtotal, 2) . "</td>
            </tr>";
        }
    }

    $tax = $grandSubtotal * 0.06;
    $total = $grandSubtotal + $tax;

    $output .= "<tr><td colspan='3' align='right'><strong>Subtotal:</strong></td><td>RM " . number_format($grandSubtotal, 2) . "</td></tr>";
    $output .= "<tr><td colspan='3' align='right'><strong>Tax (6%):</strong></td><td>RM " . number_format($tax, 2) . "</td></tr>";
    $output .= "<tr><td colspan='3' align='right'><strong>Total:</strong></td><td>RM " . number_format($total, 2) . "</td></tr>";
    $output .= "</table>";

    echo $output;
}
?>
