<?php
include 'config.php';

if(isset($_POST['submit']))
{
    $from = $_GET['id'];
    $to = $_POST['to'];
    $amount = $_POST['amount'];

    $sql = "SELECT * from users where id=$from";
    $query = mysqli_query($conn,$sql);
    $sql1 = mysqli_fetch_array($query); // returns array or output of user from which the amount is to be transferred.

    $sql = "SELECT * from users where id=$to";
    $query = mysqli_query($conn,$sql);
    $sql2 = mysqli_fetch_array($query);



    // constraint to check input of negative value by user
    if (($amount)<0)
   {
        echo '<script type="text/javascript">';
        echo ' alert("Oops! Negative values cannot be transferred")';  // showing an alert box.
        echo '</script>';
    }


  
    // constraint to check insufficient balance.
    elseif($amount > $sql1['Balance']) 
    {
        
        echo '<script type="text/javascript">';
        echo ' alert("Bad Luck! Insufficient Balance")';  // showing an alert box.
        echo '</script>';
    }
    


    // constraint to check zero values
    elseif($amount == 0)
    {
        echo "<script type='text/javascript'>";
        echo "alert('Oops! Zero value cannot be transferred')";
        echo "</script>";
    }


    else {
        // deducting amount from sender's account
        $newbalance = $sql1['Balance'] - $amount;
        $sql = "UPDATE users set Balance=$newbalance where id=$from";
        mysqli_query($conn,$sql);
        // adding amount to reciever's account
        $newbalance = $sql2['Balance'] + $amount;
        $sql = "UPDATE users set Balance=$newbalance where id=$to";
        mysqli_query($conn,$sql);
        $sender = $sql1['User'];
        $receiver = $sql2['User'];
        $sql = "INSERT INTO transaction(`Sender`, `Recipient`, `Amount`) VALUES ('$sender','$receiver','$amount')";
        $query=mysqli_query($conn,$sql);
        if($query){
            echo "<script> alert('Transaction Successful');
                     window.location='tsfbank.php';
                  </script>";
        }
        $newbalance=0;
        $amount=0;
    }
    
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="transfermoney.css">
    <link href="https://fonts.googleapis.com/css2?family=Prompt&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Acme&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Genos:wght@500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Russo+One&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="icing">
            <h2>Users Information</h2>
            <?php
                include 'config.php';
                $sid=$_GET['id'];
                $sql = "SELECT * FROM users WHERE id=$sid";
                $result = mysqli_query($conn,$sql);
                if(!$result)
                {
                    echo "Error : ".$sql."<br>".mysqli_error($conn);
                }
                $rows=mysqli_fetch_assoc($result);
            ?>
            <ul class="order">
                <li>Id:<?php echo $rows['id'] ?></td></li>
                <li>User Name:<?php echo $rows['User'] ?></td></li>
                <li>E-Mail:<?php echo $rows['email'] ?></td></li>
            </ul>
            <div class="total">Balance:<br><?php echo $rows['Balance'] ?></div>
        </div>
        <div class="dough">
            <h2>Transaction</h2>
            <form method="post" name="tcredit" class="form"><br>
                    <div class="row">
                    <div class="column recipient-group">
                        <?php
                        include 'config.php';
                        $sid=$_GET['id'];
                        $sql = "SELECT * FROM users where id!=$sid";
                        $result = mysqli_query($conn,$sql);
                        ?>
                        <label class="label">Recipient</label>
                            <select name="to" id="text-input" class="form-control" required>
                            <?php
                            while($rows = $result->fetch_assoc())
                            {
                                $id = $rows['id'];
                                $user = $rows['User'];
                                echo "<option value=$id>$id l $user</option>";
                            }
                            ?>
                            </select>
                    </div>
                    <div class="column amount-group">
                        <label class="label">Amount</label>
                        <input type="number" id="text-input" class="form-control" name="amount" required/>
                    </div>
                </div>
                <div class="buttons">
                    <button id="myBtn" name="submit" type="submit" class="transfer-button">Transfer</button>
                </div>
            </form>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script> 
</body>
</html>

