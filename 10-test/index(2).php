<?php
//* Validation with javascript

// When validating with javascript, you still want to include the php validation.
// This example validates the phone with both js and php.
//
// You may ask, 'Why have both php and js validation?'
// The js validations prevents bad data being sent to the server.
// Remember, you only have 1 server and potentally many users, so we
// don't want to bog down the server with requests that will simply be rejected.
// However, the js is executed client side, and the end user can change its original intention.
// In this example here, I could set a breakpoint on the js 'var isValid=' line, and change its
// value to true regardless of what my phone number is, which causes it to be sent to the server.
// Your php code is secure, and its functionality cannot be changed like js.

$phone = $message = '';
if (!empty($_REQUEST['button'])) {
    $phone = empty($_REQUEST['phone']) ? '' : $_REQUEST['phone'];
    $phonePattern = '/^(\(?\d{3}\)?)?\s*\d{3}(\s|\-)?\d{4}$/';
    if (preg_match($phonePattern,$phone) === 1) {
        $message = "The phone number is valid and has been submitted. (php message)";
    } else {
        $message = "Invalid phone number. (php message)";
    }
}
?>
<html>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script>
        function validatePhone() {
            var myElement =  $("#phone");
            var phonePattern = /^(\(?\d{3}\)?)?\s*\d{3}(\s|\-)?\d{4}$/;
            phone = myElement.val(); 
            var isValid = phonePattern.test(phone);
            if (isValid) {
                return true;
            }
            var myElement =  $("#messageDiv");
            myElement.html('Invalid phone number. (js message)');
            return false;
        }
    </script>
    <form method="post">
        <input type="text" placeholder="Enter valid phone" size=40 name="phone" id="phone" value="<?=$phone?>">
        <br><br>
        <input onclick="return validatePhone();" type="submit" name="button" value="Submit">
        <br><br>
        <div id="messageDiv"><?=$message?></div>
    </form>

</html>


