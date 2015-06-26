<?php
/*Theme Name: Designmodo form registration 
Theme URI: http://usalama.biz
Version: 1.0
Description: custom forms register.
Author: @joethuoo*/
    
    class Designmodo_registration_form
    {
    	/*form properties*/
    	private $username,$email,$password,$website,$first_name,$last_name,$nickname,$bio;

    	__construct(){
    		add_shortcode('dm_registration_form', array($this,'shortcode'));
    		add_action('wp_enqueue_scripts', array($this,'flat_ui_kit'));
    	}

    	public function registration_form()
    	{
    		?>

    		<form method="post" action="<?php echo esc_url($_SERVER['REQUEST_URI']);?>">
                 <div class="login-form">
                       <div class="form-group">
                            <input name="reg_name" type="text" class="form-control login-field" 
                            value="<?php echo(isset($_POST['reg_name']) ? $_POST['reg_name'] : null); ?>" placeholder="Username"
                            id="reg_name" required />

                            <label class="login-field-icon fui-user" for="reg_name"></label>
                       </div>

                       <div class="form-group">
                            <input name="reg_email" type="email" class="form-control login-field" 
                            value="<?php echo(isset($_POST['reg_email']) ? $_POST['reg_email'] : null); ?>" placeholder="Email"
                            id="reg_email" required />

                            <label class="login-field-icon fui-mail" for="reg_email"></label>
                       </div>

                       <div class="form-group">
                            <input name="reg_password" type="password" class="form-control login-field" 
                            value="<?php echo(isset($_POST['reg_password']) ? $_POST['reg_password'] : null); ?>" placeholder="Password"
                            id="reg_pass" required />

                            <label class="login-field-icon fui-lock" for="reg_pass"></label>
                       </div>

                       <div class="form-group">
                            <input name="reg_website" type="text" class="form-control login-field" 
                            value="<?php echo(isset($_POST['reg_website']) ? $_POST['reg_website'] : null); ?>" placeholder="Website"
                            id="reg_website" required />

                            <label class="login-field-icon fui-user" for="reg_name"></label>
                       </div>

                       <div class="form-group">
                            <input name="reg_fname" type="text" class="form-control login-field" 
                            value="<?php echo(isset($_POST['reg_fname']) ? $_POST['reg_fname'] : null); ?>" placeholder="First Name"
                            id="reg_fname" required />

                            <label class="login-field-icon fui-user" for="reg_fname"></label>
                       </div>

                       <div class="form-group">
                            <input name="reg_lname" type="text" class="form-control login-field" 
                            value="<?php echo(isset($_POST['reg_lname']) ? $_POST['reg_lname'] : null); ?>" placeholder="Last Name"
                            id="reg_lname" required />

                            <label class="login-field-icon fui-user" for="reg_lname"></label>
                       </div>

                       <div class="form-group">
                            <input name="reg_bio" type="text" class="form-control login-field" 
                            value="<?php echo(isset($_POST['reg_bio']) ? $_POST['reg_bio'] : null); ?>" placeholder="About/Bio"
                            id="reg_bio" required />

                            <label class="login-field-icon fui-user" for="reg_bio"></label>
                       </div>

                       <input> class="btn btn-primary btn-lg btn--block" type="submit" name="re_submit" value="Register" />
                 </div>
    		</form>
    		<?php
    	}

    	      function validation()
    	      {
                          if (empty($this->username) || empty($this->password) || empty($this->email)) {
                          	    return new WP_Error('field', 'Required form field id missing');
                          }
                          if (strlen($this->username) < 4) {
                          	    return new WP_Error('username_length','Username too short. At least 4 characters is required');
                          }
                          if (strlen($this->password) < 5) {
                          	    return new WP_Error('email_invalid', 'Email is not valid');
                          }
                          if (email_exists($this->email)) {
                          	   return new WP_Error('email', 'Email Already in use');
                          }
                          if (!empty($website)) {
                          	  if (!filter_var($this->website, FILTER_VALIDATE_URL)) {
                          	  	   return new WP_Error('website', 'Website is not vaid URL');
                          	  }
                          }

                          $details = array(
                          	'Username' => $this->username,
                          	'First Name' => $this->first_name,
                          	'last_name' => $this->last_name,
                          	'Nickname' => $this->nickname,
                          	'bio' => $this->bio
                          	);

                          foreach ($details as $field => $detail) {
                          	   if (!validate_username($detail)) {
                          	   	     return new WP_Error('name_invalid', 'Sorry, the "'. $field.'" you entered is not valid');
                          	   }
                          }
    	      }

    	      function registration()
    	      {
    	      	$userdata = array(
                  'user_login' =>esc_attr($this->username),
                  'user_email' =>esc_attr($this->email),
                  'user_pass' =>esc_attr($this->password),
                  'user_url' => esc_attr($this->website),
                  'first_name' => esc_attr($this->first_name),
                  'last_name' => esc_attr($this->last_name),
                  'nickname' => esc_attr($attr->nickname),
                  'description' => esc_attr($attr->bio),
                  'role' => get_option('Subscriber');
    	      		);

    	      	if (is_wp_error($this->validation())) {
    	      		  echo '<div style="margin-bottom: 6px" class="btn btn-block btn-lg btn-danger"';
    	      		  echo '<strong> Registration complete. Goto <a href="'.wp_login_url().'">Login page</a></strong>';
    	      		  echo '</div>';
    	      	}
    	      }

    	      function shortcode()
    	      {
    	      	ob_start();
    	      	  if ($_POST['reg_submit']) {
    	      	  	$this->username = $_POST['reg_name'];
    	      	  	$this->email =$_POST['reg_email'];
    	      	  	$this->password= $_POST['reg_password'];
    	      	  	$this->website = $_POST['reg_website'];
    	      	  	$this->first_name = $_POST['reg_fname'];
    	      	  	$this->last_name = $_POST['reg_lname'];
    	      	  	$this->nickname = $_POST['reg_nickname'];
    	      	  	$this->bio =$_POST['bio'];

    	      	  	$this->validation();
    	      	  	$this->registration();
    	      	  }
    	      	  $this->registration_form();
    	      	  return ob_get_clean();
    	      }

    	      function flat_ui_kit()
    	      {
    	      	wp_enqueue_style('bootstrap-css', plugins_url('bootstrap/css/bootstrap.css',__FILE__));
    	      	wp_enqueue_style('flat-ui-kit', plugins_url('css/flat-ui.css',__FILE__));
    	      }
    }

?>