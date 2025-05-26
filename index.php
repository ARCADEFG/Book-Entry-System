<!DOCTYPE html>
<html>
<head>
    <title>Bookstore Input Form - Stylish</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap');

        /* Reset */
        * {
            box-sizing: border-box;
        }

        body {
            font-family: 'Roboto', sans-serif;
            background: linear-gradient(135deg, #74ebd5 0%, #ACB6E5 100%);
            margin: 0;
            padding: 40px;
            color: #333;
        }

        h2 {
            color: white;
            font-weight: 1000;
            font-size: 30px;
            margin-bottom: 20px;
            text-align: center;
            text-shadow: 0 1px 3px rgba(0,0,0,0.1);
        }

        form {
            max-width: 900px;
            margin: 0 auto 40px;
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            padding: 25px 30px;
            transition: box-shadow 0.3s ease;
        }

        form:hover {
            box-shadow: 0 15px 40px rgba(0,0,0,0.15);
        }

        table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0 12px;
        }

        thead th {
            background-color: #1E90FF;
            color: white;
            padding: 12px 10px;
            font-weight: 700;
            border-radius: 8px 8px 0 0;
            text-align: center;
            box-shadow: 0 2px 5px rgba(30, 144, 255, 0.4);
        }

        tbody tr {
            background: #f9faff;
            box-shadow: 0 2px 8px rgba(30, 144, 255, 0.1);
            border-radius: 10px;
            transition: background-color 0.25s ease;
        }

        tbody tr:hover {
            background: #e6f0ff;
        }

        tbody td {
            padding: 10px;
            text-align: center;
            vertical-align: middle;
            position: relative;
        }

        input[type="text"], input[type="number"] {
            width: 90%;
            padding: 8px 12px;
            border: 2px solid #ccc;
            border-radius: 8px;
            font-size: 15px;
            transition: border-color 0.3s ease;
            outline-offset: 2px;
        }

        input[type="text"]:focus,
        input[type="number"]:focus {
            border-color: #1E90FF;
            box-shadow: 0 0 8px rgba(30, 144, 255, 0.3);
            outline: none;
        }

        .btn {
            background-color: #1E90FF;
            border: none;
            color: white;
            padding: 8px 14px;
            border-radius: 8px;
            font-weight: 600;
            font-size: 14px;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.15s ease;
            box-shadow: 0 4px 10px rgba(30, 144, 255, 0.3);
            user-select: none;
        }

        .btn.remove {
            background-color: #FF4C61;
            box-shadow: 0 4px 10px rgba(255, 76, 97, 0.3);
        }

        .btn:hover {
            background-color: #0d6efd;
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(13, 110, 253, 0.4);
        }

        .btn.remove:hover {
            background-color: #e03144;
            box-shadow: 0 8px 20px rgba(224, 49, 68, 0.5);
        }

        #summaryTable {
            max-width: 900px;
            margin: 0 auto;
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 12px 40px rgba(0,0,0,0.1);
            border-collapse: separate;
            border-spacing: 0 10px;
            overflow: hidden;
        }

        #summaryTable thead th {
            background-color: #343a40;
            color: white;
            padding: 15px 10px;
            font-weight: 700;
            border-radius: 12px 12px 0 0;
            text-align: center;
            letter-spacing: 0.03em;
            text-transform: uppercase;
            font-size: 14px;
        }

        #summaryTable tbody tr {
            background: #f8f9fa;
            border-radius: 10px;
            box-shadow: 0 1px 6px rgba(0,0,0,0.05);
            transition: background-color 0.25s ease;
        }

        #summaryTable tbody tr:hover {
            background: #e9ecef;
        }

        #summaryTable tbody td {
            padding: 14px 10px;
            text-align: center;
            font-size: 15px;
            font-weight: 500;
            color: #212529;
        }

        #summaryTable tfoot tr {
            background: #dee2e6;
            font-weight: 700;
            font-size: 16px;
            color: #212529;
        }

        #summaryTable tfoot td {
            padding: 14px 10px;
            text-align: right;
        }

        #summaryTable tfoot tr td:first-child {
            text-align: right;
            padding-right: 30px;
        }

        /* Responsive */
        @media (max-width: 650px) {
            body {
                padding: 20px 15px;
            }

            form, #summaryTable {
                width: 100%;
            }

            input[type="text"], input[type="number"] {
                width: 100%;
            }

            .btn {
                font-size: 13px;
                padding: 6px 12px;
            }

            thead th, #summaryTable thead th {
                font-size: 12px;
                padding: 10px 5px;
            }

            tbody td, #summaryTable tbody td {
                font-size: 13px;
                padding: 8px 5px;
            }

            #summaryTable tfoot td {
                font-size: 14px;
                padding: 10px 5px;
            }
        }
    </style>
</head>
<body>

<h2>ENTER BOOK DETAILS</h2>

<form id="bookForm" onsubmit="return false;">
    <table id="bookTable">
        <thead>
        <tr>
            <th>Book Title</th>
            <th>Quantity</th> <!-- swapped -->
            <th>Price (RM)</th> <!-- swapped -->
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td><input type="text" name="title[]" required></td>
            <td><input type="number" name="qty[]" min="0" required></td> <!-- swapped -->
            <td><input type="number" name="price[]" step="0.01" min="0" required></td> <!-- swapped -->
            <td>
                <button type="button" class="btn" onclick="addRow(this)">Add</button>
                <button type="button" class="btn remove" onclick="removeRow(this)">Remove</button>
            </td>
        </tr>
        </tbody>
    </table>

    <button type="button" class="btn" style="width: 150px; display: block; margin: 20px auto 0;" onclick="updateSummary()">Show Summary</button>
</form>

<h2>SUMMARY</h2>
<table id="summaryTable" class="summary-table">
    <thead>
    <tr>
        <th>Book</th>
        <th>Quantity</th>
        <th>Unit Price</th>
        <th>Subtotal</th>
    </tr>
    </thead>
    <tbody>
    <!-- Summary rows dynamically inserted here -->
    </tbody>
    <tfoot>
    <tr class="totals-row">
        <td colspan="3">Subtotal:</td>
        <td id="subtotal">RM 0.00</td>
    </tr>
    <tr class="totals-row">
        <td colspan="3">Tax (6%):</td>
        <td id="tax">RM 0.00</td>
    </tr>
    <tr class="totals-row">
        <td colspan="3">Total:</td>
        <td id="total">RM 0.00</td>
    </tr>
    </tfoot>
</table>

<script>
    function addRow(button) {
        const row = button.closest('tr');
        const tbody = row.parentNode;
        const newRow = row.cloneNode(true);

        newRow.querySelectorAll('input').forEach(input => input.value = '');
        tbody.insertBefore(newRow, row.nextSibling);
        attachInputListeners(newRow);
        updateSummary();
    }

    function removeRow(button) {
        const row = button.closest('tr');
        const tbody = row.parentNode;
        if (tbody.rows.length > 1) {
            tbody.removeChild(row);
            updateSummary();
        } else {
            alert('At least one row is required.');
        }
    }

    function formatCurrency(amount) {
        return 'RM ' + amount.toFixed(2);
    }

    function updateSummary() {
        const tbody = document.querySelector('#bookTable tbody');
        const summaryBody = document.querySelector('#summaryTable tbody');

        summaryBody.innerHTML = '';

        let grandSubtotal = 0;

        Array.from(tbody.rows).forEach(row => {
            const title = row.querySelector('input[name="title[]"]').value.trim();
            const qty = parseInt(row.querySelector('input[name="qty[]"]').value);
            const price = parseFloat(row.querySelector('input[name="price[]"]').value);

            if (title !== '' && !isNaN(price) && price >= 0 && !isNaN(qty) && qty > 0) {
                const subtotal = price * qty;
                grandSubtotal += subtotal;

                const tr = document.createElement('tr');
                tr.innerHTML = `
                    <td>${escapeHtml(title)}</td>
                    <td>${qty}</td>
                    <td>${formatCurrency(price)}</td>
                    <td>${formatCurrency(subtotal)}</td>
                `;
                summaryBody.appendChild(tr);
            }
        });

        const tax = grandSubtotal * 0.06;
        const total = grandSubtotal + tax;

        document.getElementById('subtotal').textContent = formatCurrency(grandSubtotal);
        document.getElementById('tax').textContent = formatCurrency(tax);
        document.getElementById('total').textContent = formatCurrency(total);
    }

    function escapeHtml(text) {
        return text.replace(/[&<>"']/g, function(m) {
            return {'&':'&amp;', '<':'&lt;', '>':'&gt;', '"':'&quot;', "'":'&#39;'}[m];
        });
    }

    function attachInputListeners(row) {
        row.querySelectorAll('input').forEach(input => {
            input.addEventListener('input', updateSummary);
        });
    }

    document.querySelectorAll('#bookTable tbody tr').forEach(attachInputListeners);

    updateSummary();
</script>

</body>
</html>
