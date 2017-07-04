 <?php
        global $wpdb;

        $error = '';
        $success = '';

        // check if we're in reset form
        if( isset( $_POST['action'] ) && 'reset' == $_POST['action'] )
        {
            $email = $wpdb->escape(trim($_POST['email']));

            if( empty( $email ) ) {
                $error = 'Enter a username or e-mail address..';
            } else if( ! is_email( $email )) {
                $error = 'Invalid username or e-mail address.';
            } else if( ! email_exists( $email ) ) {
                $error = 'There is no user registered with that email address.';
            } else {

                $random_password = wp_generate_password( 12, false );
                $user = get_user_by( 'email', $email );

                $update_user = wp_update_user( array (
                        'ID' => $user->ID,
                        'user_pass' => $random_password
                    )
                );

                // if  update user return true then lets send user an email containing the new password
                if( $update_user ) {
                    $to = $email;
                    $subject = 'Your new password';
                    $sender = get_option('name');

                    $message = 'Your new password is: '.$random_password;

                    $headers[] = 'MIME-Version: 1.0' . "\r\n";
                    $headers[] = 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
                    $headers[] = "X-Mailer: PHP \r\n";
                    $headers[] = 'From: '.$sender.' <'.$email.'>' . "\r\n";

                    $mail = wp_mail( $to, $subject, $message, $headers );
                    if( $mail )
                    $success = 'Check your email address for your new password.';

?>
<script>
//change the url to the page in your site you want to see after password reset is done:
document.location="<?php echo bloginfo('url');?>";
</script>
<?php

                } else {
                    $error = 'Oops something went wrong updating your account.';
                }

            }

        }
    ?>

		<form method="post">
	        <fieldset>
	            <p>Please enter your email address. You will receive a temporary password via email.</p>
	            <p><label for="user_login">E-mail:</label>
	                <input type="text" name="email" id="user_login"  value="" />
	                <input type="hidden" name="action" value="reset" />
	                <input type="submit" value="Get New Password" class="button" id="submit" />
	            </p>
	        </fieldset>
	    </form>
