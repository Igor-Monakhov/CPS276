<?php


/*SET THE VALUE OF OUTPUT TO EMPTY STRING SO NOTHING SHOWS WHEN THE PAGE FIRST LOADS*/
$output = "";


/*IF THE SUBMIT BUTTON IS CLICKED DO THE FOLLOWING. */
if(isset($_POST['submitButton'])){
$output = <<<HTML

  <p>This is the information sent to the server and displayed through the &amp;_POST superglobal.</p>
  <dl>
  <dt>First name</dt><dd>{$_POST["firstName"]}</dd>
  <dt>Last name</dt><dd>{$_POST["lastName"]}</dd>
  <dt>Password</dt><dd>{$_POST["password1"]}</dd>
  <dt>Retyped password</dt><dd>{$_POST["password2"]}</dd>
  <dt>Country</dt><dd>{$_POST["country"]}</dd>
  <dt>Favorite widget</dt><dd>{$_POST["favoriteWidget"]}</dd>
  <dt>Do you want to receive our newsletter?</dt><dd>{$_POST["newsletter"]}</dd>
  <dt>Comments</dt><dd>{$_POST["comments"]}</dd>
  </dl>

HTML;


}


?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Basic Form</title>
    <style>
      input[type="radio"]{margin: 0 10px 0 0;}
    </style>
  </head>
  <body>
    <main class="container">
      <h1>Membership Form</h1>
      <p>Thanks for choosing to join The Widget Club. To register, please fill in your details below and click Send Details.</p>
      <p>The information that will be sent to the server will be displayed after the form.</p>
      <form action="test1.php" method="post">
      <div class="form-group">
        <label for="firstName">First name</label>
        <input type="text" class="form-control" name="firstName" id="firstName" value="John">
      </div>
      
      <div class="form-group">
        <label for="lastName">Last name</label>
        <input type="text" class="form-control"  name="lastName" id="lastName" value="Doe">
      </div>
      
      <div class="form-group">
        <label for="password1">Choose a password</label>
        <input type="password" class="form-control"  name="password1" id="password1" value="password" >
      </div>
      
      <div class="form-group">
        <label for="password2">Retype password</label>
        <input type="password" class="form-control" name="password2" id="password2" value="password">
      </div>

      <div class="form-group">
        <p>Select your country</p>
        <label for="us">United States:</label>
        <input type="radio" name="country" id="us" value="United States" checked>
        
        <label for="canada">Canada:</label>
        <input type="radio" name="country" id="ca" value="Canada">

        <label for="mexico">Mexico:</label>
        <input type="radio" name="country" id="mexico" value="Mexico">
        
        <label for="other">Other:</label>
        <input type="radio" name="country" id="other" value="Other">

      </div>

      <div class="form-group">
        <label for="favoriteWidget">What’s your favorite widget?</label>
        
        <select name="favoriteWidget" class="form-control" id="favoriteWidget" size="1">
          <option value="superWidget">The SuperWidget</option>
          <option value="megaWidget" selected>The MegaWidget</option>
          <option value="wonderWidget">The WonderWidget</option>
        </select> 
      </div>

      <div class="form-group">
        <label for="newsletter">Do you want to receive our newsletter?</label>
        <input type="checkbox" name="newsletter" id="newsletter" value="yes" checked>
      </div>

      <div class="form-group">
        <label for="comments">Any comments?</label>
        <textarea name="comments" class="form-control" id="comments" rows="4" cols="50">Nothing to add at this point.</textarea>
      </div>

      <div class="form-group">
        <input type="submit" class="btn btn-success" name="submitButton" id="submitButton" value="Send Details" />
      </div>
      </form>

      <?php echo $output; ?>
    </main>
  </body>
</html>
