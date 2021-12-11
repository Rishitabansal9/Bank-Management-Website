<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="tsfbank.css">
</head>
<body>
     <div class="heading">
        <img src="https://img.icons8.com/emoji/96/000000/bank-emoji.png" alt="#" id="image" style="height: 70px; width: 70px; margin-top: 19pt; margin-right: 25px;">
        <h1 style="font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif; color:#ececec ;">Welcome to TSF Bank</h1>
     </div>
     <div class="container right-panel-active">  
          <!-- Sign Up -->  
          <div class="container__form container--signup">  
               <form action="user.php" method="post" class="form">  
                    <img src="people.png" alt="#" height="280px" width="200px"> 
                    <button class="btn">View Users & Transfer</button>  
               </form>  
          </div>  
          <!-- Sign In -->  
          <div class="container__form container--signin">  
               <form action="transaction.php" method="post" class="form">  
                    <img src="money.png" alt="#" height="280px" width="200px">   
                    <button class="btn">Transaction History</button>  
               </form>  
          </div>  
          <!-- Overlay -->  
          <div class="container__overlay">  
               <div class="overlay">  
                    <div class="overlay__panel overlay--left">  
                         <button class="btn" id="signIn">Transaction History</button>  
                    </div>  
                    <div class="overlay__panel overlay--right">  
                         <button class="btn" id="signUp">Users & Transfer</button>  
                    </div>  
               </div>  
          </div>  
     </div>
     <script>
          const signInBtn = document.getElementById("signIn");  
          const signUpBtn = document.getElementById("signUp");   
          const container = document.querySelector(".container");  
          signInBtn.addEventListener("click", () => {  
               container.classList.remove("right-panel-active");  
          });  
          signUpBtn.addEventListener("click", () => {  
               container.classList.add("right-panel-active");  
          });  
          fistForm.addEventListener("submit", (e) => e.preventDefault());  
          secondForm.addEventListener("submit", (e) => e.preventDefault());  
     </script> 
</body>
</html>
