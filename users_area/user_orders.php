<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My orders</title>
</head>

<body>
    <?php
    $username = $_SESSION['username'];
    $get_user = "select * from user_table where username='$username'";
    $result = mysqli_query($con, $get_user);
    $row_fetch = mysqli_fetch_assoc($result);
    $user_id = $row_fetch['user_id'];

    ?>
    <h3 class="text-center text-warning">My orders</h3>
    <table class="table table-bordered mt-5">
        <thead class="bg-primary">

            <?php
            $get_order_details = "select * from user_orders where user_id=$user_id";
            $result_orders = mysqli_query($con, $get_order_details);
            $row_count = mysqli_num_rows($result_orders);

            if ($row_count == 0) {
                echo "<h2 class='text-center bg-warning text-danger text-center mt-5'>No orders yet</h2>";
            } else {
                echo " <tr>
                <th>SN.</th>
               <th>Order Id</th>
                <th>Product Id</th>
                
                <th>Amount Due</th>
                <th>Total products</th>
                <th>Invoice Number</th>
                <th>Date</th>
                <th>Complete/Incomplete</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody class='bg-secondary text-light'>";


                $number = 1;
                while ($row_orders = mysqli_fetch_assoc($result_orders)) {
                    $product_id = $row_orders['product_id'];
                    $order_id = $row_orders['order_id'];
                    $amount_due = $row_orders['amount_due'];
                    $total_products = $row_orders['total_products'];
                    $invoice_number = $row_orders['invoice_number'];
                    $order_status = $row_orders['order_status'];

                    if ($order_status == 'pending') {
                        $order_status = 'Incomplete';
                    } else {
                        $order_status = 'Complete';
                    }
                    $order_date = $row_orders['order_date'];
                    echo "<tr>
                <td> $number</td>
            <td> $order_id </td>
                <td> $product_id </td>
                <td>$amount_due</td>
                <td> $total_products</td>
                <td> $invoice_number</td>
                <td>   $order_date</td>
                <td>$order_status</td>";
            ?>
            <?php
                    if ($order_status == 'Complete') {
                        echo "<td> COD</td>";
                    } else {
                        echo "<td> <a href='confirm_payment.php?order_id=$order_id' class='text-light'>Confirm</a></td>
                      </tr>";
                    }



                    $number++;
                }
            }
            ?>


            </tbody>
    </table>
</body>

</html>