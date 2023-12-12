<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Footer </title>

    <style>
    .footer-content{
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
    text-align: center;
    background-color: teal;
    }

    .footer-content p{
    font-size: 20px;
    font-weight: 400;
    text-transform: capitalize;
    line-height: 3rem;
    color: #fff;
    font-family: sans-serif;
    
   }

   @media (max-width: 600px) {
    .footer-content p{
        font-size: 15px;
        font-weight: 300px;
        line-height: 2rem;
    }
   }
    </style>
</head>

<body>
   <footer>
    <div class="footer-content">
    <p>Design by Mohammad Azri bin Abd Azih (B20210125) & <br>
    Nur Afiqah binti Haji Azhar (B20210132)</p>
    </div>
   </footer>
    
</body>
</html>