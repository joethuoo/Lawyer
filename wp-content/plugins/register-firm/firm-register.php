<?php
/*Plugin Name: Custom Firm Registration Form
  Plugin URI: http://usalamabiz.com
  Description: Simple WordPress Firm registration form plugin that just work
  Version: 1.0
  Author: @joethuoo
  Author URI: https://facebook.com/joe.thuo.9
  */
 class FirmInsert{
    private $firm_name;
    private $landline;
    private $mobile;
    private $linkedin;
    private $facebook;
    private $twitter;
    private $email;
    private $practice;
    private $website;
    private $associations;
    private $education;
    private $experience;
    private $partner;
    private $bio;
    private $password;

    function __construct(){
    	add_shortcode('fm_registration_form', array($this,'shortcode'));
    }

  function register_firm_form()
  {
  	?>
  	 <section class="home-content" style="margin-top:120px;">
                <div class="row">
                    <h3>Add Firm Records</h3>
                   <form action="<?php echo esc_url($_SERVER['REQUEST_URI']); ?>" method="post" ectype="multipart/form-data">
                    <div class="row">
                        <div class="large-4 small-5 columns">
                          <label><i class="fa fa-photo"></i> Photo</label>
                          <input type="file" placeholder="photo" name="photo" class="input-content">
                        </div>

                        <div class="large-6 small-5 columns">
                          <label><i class="fa fa-user-secret" for="firm_name"></i> Firm Name</label>
                          <input type="text" placeholder="Firm name" name="firm_name" class="input-content"
                          value="<?php echo(isset($_POST['firm_name']) ? $_POST['firm_name'] : null); ?>">
                        </div>
                     </div>                    
                        

                      <div class="row">
                        <div class="large-5 small-5 columns">
                         <label><i class="fa fa-phone" for="landline"></i>Landline Number</label>
                         <input type="text" placeholder="Landline" name="landline"
                         value="<?php echo(isset($_POST['landline']) ? $_POST['landline'] : null); ?>">
                       </div>

                       <div class="large-5 small-5 columns">
                          <label for="mobile">Mobile Number</label>
                          <input type="text" placeholder="mobile" name="mobile"
                          value="<?php echo(isset($_POST['mobile']) ? $_POST['mobile'] : null); ?>">
                       </div>
                      </div> 

                         <div class="row">
                        <div class="large-5 small-5 columns">
                         <label><i class="fa fa-phone"for="facebook"></i>facebook page</label>
                         <input type="text" placeholder="facebook" name="facebook"
                         value="<?php echo(isset($_POST['facebook']) ? $_POST['facebook'] : null); ?>">
                       </div>

                       <div class="large-5 small-5 columns">
                          <label for="linkedin">LinkedIn </label>
                          <input type="text" placeholder="LinkedIn" name="linkedIn"
                          value="<?php echo(isset($_POST['linkedin']) ? $_POST['linkedin'] : null); ?>">
                       </div>
                      </div> 

                      <div class="row">
                        <div class="large-5 small-5 columns">
                         <label><i class="fa fa-phone" for="email"></i>Email</label>
                         <input type="text" placeholder="email" name="mail"
                         value="<?php echo(isset($_POST['email']) ? $_POST['email'] : null); ?>">
                       </div>

                       <div class="large-5 small-5 columns">
                          <label for="twitter">Twitter</label>
                          <input type="text" placeholder="twitter" name="twitter"
                          value="<?php echo(isset($_POST['twitter']) ? $_POST['twitter'] : null); ?>">
                       </div>
                      </div> 
          

                       <div class="row">
                        <div class="large-5 small-6 columns">
                         <label><i class="fa fa-phone" for="practice"></i>Practice</label>
                         <input type="text" placeholder="practice" name="practice" id="practice"
                         value="<?php echo(isset($_POST['practice']) ? $_POST['practice'] : null); ?>">
                       </div>

                       <div class="large-5 small-6 columns">
                          <label for="website">Website</label>
                          <input type="text" placeholder="website" name="website" id="website"
                          value="<?php echo(isset($_POST['website']) ? $_POST['website'] : null); ?>">
                       </div>
                      </div>

                        <div class="row">
                          <div class="large-12  small-12 medium-10 columns">
                             <label for="bio">Bios</label>
                              <textarea placeholder="Bio Content" name="bio" class="input-content" id="bio"
                              value="<?php echo(isset($_POST['bio']) ? $_POST['bio'] : null); ?>"></textarea>
                         </div>     
                      </div>

                       <div class="row">
                          <div class="large-12  small-12 medium-10 columns">
                             <label for="associations">Professional Associations.</label>
                              <textarea placeholder=" Professional Associations" name="associations" class="association" id="associations"
                              value="<?php echo(isset($_POST['associations']) ? $_POST['associations'] : null); ?>"></textarea>
                         </div>     
                      </div>

                        <div class="row">
                        <div class="large-5 small-6 columns">
                         <label><i class="fa fa-phone" for="password"></i>Password</label>
                         <input type="text" placeholder="password" name="password" id="password"
                         value="<?php echo(isset($_POST['password']) ? $_POST['password'] : null); ?>">
                       </div>

                       <div class="large-5 small-6 columns">
                          <label for="confirm_password">Confirm Password</label>
                          <input type="text" placeholder="comfirm password" name="confirm_password" id="confirm_password"
                          value="<?php echo(isset($_POST['confirm_password']) ? $_POST['confirm_password'] : null); ?>">
                       </div>
                      </div>

                    
                   </form>
                   <div class="large-4 small-3 columns">
                                   <a href="#" class="default button expand">Submit</a>
                               </div>
             </div>
    </section>
    <?php
  }

  function validation()
  {
  	   if (empty($this->first_name) || empty($this->middle_name) || empty($this->last_name) ||
    			empty($this->landline) || empty($this->mobile) || empty($this->linkedin) || empty($this->facebook)
    			|| empty($this->twitter) || empty($this->practice) || empty($this->website) || empty($this->practice)
    			|| empty($this->associations) || empty($this->education) || empty($this->experience) 
    			|| empty($this->partner) || empty($this->bio) || empty($this->password))
  	     {


    			return new WP_Error('field', 'Required form field is missing');
    		}elseif (strlen($this->first_name) < 4) {
    			 	return new WP_Error('username_length', 'First Name too short. At least 4 characters is required');
    		}elseif (strlen($this->password) < 5) {
    			 return new WP_Error('password', 'Password length must be greater than 5');
    		}elseif (!is_email($this->email)) {
    			 return new WP_Error('email_invalid', 'Email is not valid');
    		}elseif (email_exists($this->email)) {
    			return new WP_Error('email', 'Email Already in use');
    		}elseif (!empty($website)) {
    			if (!filter_var($this->website, FILTER_VALIDATE_URL)) {
                return new WP_Error('website', 'Website is not a valid URL');
                  }
    		}

    		$form_details = array(
                  'first_name'  => $this->first_name,
                  'middle_name' =>$this->middle_name,
                  'last_name'   => $this->last_name,
                  'bio'         => $this->bio
    			);

    		foreach ($form_details as $field => $detail) {
    			     if (!validate_username($detail)) {
    			     	 return new WP_Error('name is invalid', 'Sorry, the "'.$field.'" you entered is invalid');
    			     }
    		}
    }	

           function registration()
    {

        $userdata = array(
            'user_login' => esc_attr($this->username),
            'user_email' => esc_attr($this->email),
            'user_pass' => esc_attr($this->password),
            'user_url' => esc_attr($this->website),
            'first_name' => esc_attr($this->first_name),
            'last_name' => esc_attr($this->last_name),
            'nickname' => esc_attr($this->nickname),
            'description' => esc_attr($this->bio),
            'role' => 'Subscriber'
        );

        if (is_wp_error($this->validation())) {
            echo '<div style="margin-bottom: 6px" class="btn btn-block btn-lg btn-danger">';
            echo '<strong>' . $this->validation()->get_error_message() . '</strong>';
            echo '</div>';
        } else {

            $register_user = wp_insert_user($userdata);
           /* $register_user = INSERT INTO addlawyer(ID,first_name,last_name,middle_name,landline,
                mobile_number,facebook,linkedin,twitter,googleplus,website,professional_association,
                education,experience,partner,bio,password,email) VALUES($this->user_id,esc_attr($this->first_name),
                esc_attr($this->last_name),esc_attr($this->middle_name),esc_attr($this->landline),
                esc_attr($this->education),esc_attr($this->experience),esc_attr($this->partner),esc_attr($this->bio),
                esc_attr($this->password),esc_attr($this->email));
              */
            if (!is_wp_error($register_user)) {

                echo '<div style="margin-bottom: 6px" class="btn btn-block btn-lg btn-danger">';
                echo '<strong>Registration complete. Goto <a href="' . wp_login_url() . '">login page</a></strong>';
                echo '</div>';
            } else {
                echo '<div style="margin-bottom: 6px" class="btn btn-block btn-lg btn-danger">';
                echo '<strong>' . $register_user->get_error_message() . '</strong>';
                echo '</div>';
            }
        }

    }

            function shortcode()
    {

        ob_start();
        if (isset($_POST['reg_submit']))  {
            $this->username = $_POST['reg_name'];
            $this->email = $_POST['reg_email'];
            $this->password = $_POST['reg_password'];
            $this->website = $_POST['reg_website'];
            $this->first_name = $_POST['reg_fname'];
            $this->last_name = $_POST['reg_lname'];
            $this->nickname = $_POST['reg_nickname'];
            $this->bio = $_POST['reg_bio'];

            $this->validation();
            $this->registration();
        }

        $this->register_firm_form();
        return ob_get_clean();
    }
  

}	

new FirmInsert;
?>