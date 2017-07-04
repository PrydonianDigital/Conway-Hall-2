		<?php
			if(is_user_logged_in()) {
				global $user_login;
				$current_user = new WP_User(wp_get_current_user()->ID);
				$user_roles = $current_user->roles;
				foreach ($user_roles as $role) {
					if  ($role == 'trustee' || $role == 'member' || $role == 'nonukmember'|| $role == 'nonukinstitution' || $role == 'editor' || $role == 'administrator' ) {
						global $current_user;
						if ( isset($current_user) ) {
							echo '<p><strong>Welcome, ' . $current_user->user_firstname . ', to the Members\' Area of Conway Hall Ethical Society!</strong></p>';
						}
				?>
				<p><br /><a href="<?php echo wp_logout_url(get_permalink()); ?>" title="Logout"><i class="icon-lock-open"></i>Logout</a></p>
				<?php
					} else {
				?>
					<h4>Please enter your details in order to access this part of the site:</h4>
				<?php
						wp_login_form( $args );
				?>
				<p><a href="/password-recovery/">Lost password?</a></p>
				<?php
					}
				}
			} else {
		?>
				<h4>Please enter your details in order to access this part of the site:</h4>
		<?php
				wp_login_form( $args );
			}
		?>
		<p><a href="/password-recovery/">Lost password?</a></p>