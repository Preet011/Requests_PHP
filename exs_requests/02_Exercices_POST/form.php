

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Submission form</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <h1>Submission Form</h1>
    <div class="form-container">

    <form action="traitement.php" method="POST">
   <!-- Exercice 2  -->
    <label for="firstname">First name:</label>
    <input type="text" name="firstname" id="firstname" value="<?php echo isset($_POST['firstname']) ?  htmlspecialchars($_POST['firstname']) : '';?>" >

    <label for="lastname">Last name:</label>
    <input type="text" name="lastname" id="lastname" value="<?php echo isset($_POST['lastname']) ?  htmlspecialchars($_POST['lastname']) : '';?>"  >

    <label for="email">Email:</label>
    <input type="email" name="email" id="email"  value="<?php echo isset($_POST['email']) ?  htmlspecialchars($_POST['email']) : '';?>" >

    <label for="password">Password:</label>
    <input type="password" name="password" id="password"  value="<?php echo isset($_POST['password']) ?  htmlspecialchars($_POST['password']) : '';?>" >

    <label for="city">City:</label>
    <input type="text" name="city" id="city" maxlength="20" placeholder="full address" value="<?php echo isset($_POST['city']) ?  htmlspecialchars($_POST['city']) : '';?>"  >

    <label for="country">Country:</label>
    <input type="text" name="country" id="country" value="<?php echo isset($_POST['country']) ?  htmlspecialchars($_POST['country']) : '';?>"  >

    <input type="submit" value="Send">

</div>
</form>
</body>

</html>
