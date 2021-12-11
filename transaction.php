<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction History</title>
    <link rel="stylesheet" href="transaction.css">
    <link href="https://fonts.googleapis.com/css2?family=Teko:wght@600&display=swap" rel="stylesheet">
</head>
<body>
    <div class="heading">
        <h1>Transaction History</h1>
        <img src="transaction icon.png" alt="#" id="image" style="height: 70px; width: 70px; margin-top: -30pt; margin-right: 25px;">
    </div>
    <br><br><br><br>
    <div class="container">    
        <table>
            <thead>
                <tr>
                    <th class="text-center">S.No.</th>
                    <th class="text-center">Sender</th>
                    <th class="text-center">Recipient</th>
                    <th class="text-center">Amount</th>
                    <th class="text-center">Date & Time</th>
                </tr>
            </thead>
            <tbody>
            <?php

                include 'config.php';

                $sql ="select * from transaction";

                $query =mysqli_query($conn, $sql);

                while($rows = mysqli_fetch_assoc($query))
                {
            ?>

                <tr>
                <td class="py-2"><?php echo $rows['S.No.']; ?></td>
                <td class="py-2"><?php echo $rows['Sender']; ?></td>
                <td class="py-2"><?php echo $rows['Recipient']; ?></td>
                <td class="py-2"><?php echo $rows['Amount']; ?> </td>
                <td class="py-2"><?php echo $rows['Transaction Time']; ?></td>   
                
            <?php
                }

            ?>
            </tbody>
        </table>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>