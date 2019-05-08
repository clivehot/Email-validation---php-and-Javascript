        <?php
        if( isset($_POST['submit']) ) {
        
            $name = htmlspecialchars($_POST['CustomerName']);
            $buyers_email = htmlspecialchars($_POST['CustomerEmail']);
            $message = htmlspecialchars($_POST['CustomerMessage']);
            
            
            // 1)Check for blank input fields
            if ($name == "" || $buyers_email == "" || $message == "") {
                $error = "*required";
            }
            
            // 2)Prevent Links and Spam
            if ( stripos($name, 'http') == true || stripos($name, 'https') == true || stripos($name, 'www') == true || stripos($name, 'ftp') == true || stripos($name, 'casino') == true || stripos($name, 'weapon') == true || stripos($name, 'cash') == true || stripos($name, 'earn') == true || stripos($name, '$') == true || stripos($name, 'claim') == true ||stripos($name, 'inheritance') == true || stripos($name, 'inheritance') == true || stripos($name, 'congratulations') == true || stripos($name, 'firearm') == true || stripos($name, 'affiliate') == true || stripos($name, 'click') == true || stripos($name, 'bitcoin') == true || stripos($name, 'profit') == true || stripos($name, 'try') == true || stripos($name, 'trial') == true) {
                echo 'Your message was not sent, no links allowed. The following words are not allowed in order to prevent Spam: casino,weapon,cash,earn,$,claim,inheritance,congratulations,firearm,affiliate,click,bitcoin,profit,try and trial';
                return false;
            }
            
            if(preg_match_all("/\b(?:(?:https?|ftp|http):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/im",$name)){
                    // prevent form from saving code goes here
                    return false; 
            }
            // 3)Only accept if numbers and letters
            if(!preg_match("/^[a-zA-Z0-9]*$/",$name)) {
                 $error = "Name must only contain alphabet and numbers!";
                 return false;
            }
            
            
            
            if ( stripos($buyers_email, 'http') == true || stripos($buyers_email, 'https') == true || stripos($buyers_email, 'www') == true || stripos($buyers_email, 'ftp') == true || stripos($buyers_email, 'casino') == true || stripos($buyers_email, 'weapon') == true || stripos($buyers_email, 'cash') == true || stripos($buyers_email, 'earn') == true || stripos($buyers_email, '$') == true || stripos($buyers_email, 'claim') == true ||stripos($buyers_email, 'inheritance') == true || stripos($buyers_email, 'inheritance') == true || stripos($buyers_email, 'congratulations') == true || stripos($buyers_email, 'firearm') == true || stripos($buyers_email, 'affiliate') == true || stripos($buyers_email, 'click') == true || stripos($buyers_email, 'bitcoin') == true || stripos($buyers_email, 'profit') == true || stripos($buyers_email, 'try') == true || stripos($buyers_email, 'trial') == true) {
                echo 'Your message was not sent, no links allowed. The following words are not allowed in order to prevent Spam: casino,weapon,cash,earn,$,claim,inheritance,congratulations,firearm,affiliate,click,bitcoin,profit,try and trial';
                return false;
            }
            
            if(preg_match_all("/\b(?:(?:https?|ftp|http):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/im",$buyers_email)){
                // prevent form from saving code goes here
                return false; 
            }
            
            if (filter_var($buyers_email, FILTER_VALIDATE_EMAIL)) {
            } else {
                         $error = "$buyers_email is not a valid email address";
            }
            
            
            if ( stripos($message, 'http') == true || stripos($message, 'https') == true || stripos($message, 'www') == true || stripos($message, 'ftp') == true || stripos($message, 'casino') == true || stripos($message, 'weapon') == true || stripos($message, 'cash') == true || stripos($message, 'earn') == true || stripos($message, '$') == true || stripos($message, 'claim') == true ||stripos($message, 'inheritance') == true || stripos($message, 'inheritance') == true || stripos($message, 'congratulations') == true || stripos($message, 'firearm') == true || stripos($message, 'affiliate') == true || stripos($message, 'click') == true || stripos($message, 'bitcoin') == true || stripos($message, 'profit') == true || stripos($message, 'try') == true || stripos($message, 'trial') == true) {
                echo 'Your message was not sent, no links allowed. The following words are not allowed in order to prevent Spam: casino,weapon,cash,earn,$,claim,inheritance,congratulations,firearm,affiliate,click,bitcoin,profit,try and trial';
                return false;
            }
            if(preg_match_all("/\b(?:(?:https?|ftp|http):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/im",$message)){}
                    // prevent form from saving code goes here
                    return false; 
            }
            
        
            // $to will be the sellers email
            $to = $sellers_email;
            $email_subject = "Customer from your Classidy Ad";
            $buyers_message = "From: ".$name."\n\nMessage: ".$message."\n\nReply to: ".  $buyers_email;
            $headers = "From: Classidy\n";
            $headers .= "Note! Do not reply to this email address,reply to the one below.";
                
            if(mail($to,$email_subject,$buyers_message,$headers)) {
                 // echo "Your message was sent successfully";
            } else {
                     echo "Message was not sent";
            }
        
             } 
            
        

        /* Start of form */
        ?> 
        <div id='contact-seller' >
          <h3>Send a message:</h3>
          <form action='' method='POST' name="ContactForm" onsubmit = "return(validate())" >
          Your Name: <input id="name-input" type='text' name='CustomerName' /><p style='display:inline-block;color:red' ><?php echo $error; ?></p>
          <br>
          <br>
          Your Email: <input id="email-input" type='text' name='CustomerEmail' /><p style='display:inline-block;color:red' ><?php echo $error; ?></p>
          <br>
          <br>
          Message: 
          <br>
          <br>
          <textarea id="test-input" rows='18' cols='80' name='CustomerMessage' required></textarea><p style='display:inline-block;color:red' ><?php echo $error; ?></p>
          <br>
          <br>
          <input id='submit-btn' type='submit' name='submit' value='submit' >
          </form>
        </div>
        
  <script>
      function validate() {
         //Reg Expression for links
         var linkRegExp = /\b(?:(?:https?|ftp|http):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/g;
         
         var name_input = document.ContactForm.CustomerName.value;
         if( name_input == "" ) {
            alert( "Please provide your name!" );
            document.ContactForm.CustomerName.focus() ;
            return false;
         }
         var nameRegExp = /^[a-zA-Z0-9]*$/
         if( nameRegExp.test(name_input) == false) {
             alert("Name must only contain alphabet and numbers!");
             return false;
         }
         if(  linkRegExp.test(name_input) == true) {
            alert( "No links allowed!" );
            return false;
         }
         
         
         var email_input = document.ContactForm.CustomerEmail.value;
         if( email_input == "" ) {
            alert( "Please provide your Email!" );
            document.ConatctForm.CustomerEmail.focus() ;
            return false;
         }
         var emailRegExp = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
         if( emailRegExp.test(email_input) == false) {
             alert("Invalid email address!");
             return false;
         }
         if(  linkRegExp.test(email_input) == true) {
            alert( "No links allowed!" );
            return false;
         }
         var x = document.forms["ContactForm"]["CustomerEmail"].value;
         var at_symbol = x.indexOf("@");
         var dot = x.indexOf(".");
         if ( at_symbol == -1 || dot == -1 ) {
             alert("Invalid email address");
             return false;
         }

         
         var contact_message = document.ContactForm.CustomerMessage.value;
         if(  contact_message == "" ) {
            alert( "Please provide your message!" );
            return false;
         }
         
         if(  linkRegExp.test(contact_message) == true ) {
            alert( "No links allowed!" );
            return false;
         }
         
         return( true );
      }

</script>
