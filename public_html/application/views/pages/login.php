<div class="login_form">
<div class="title"><?php echo $this->lang->line("LOGIN"); ?></div>
<br />
<div class="login_form_content">
<?php

	if(isset($username) && isset($password)){
		echo validation_errors();
	}else{
	echo validation_errors();
	echo form_open('login/login_form');
	
	echo form_fieldset($this->lang->line('USERNAME'));		
        $login_username = array(
	'name'     => 'login_username',
	'id'       => 'login_username',
	'maxlength' => '100',
	'size'     => '50',
	'style'    => 'width:100%',
	);
	
	echo form_input($login_username, set_value('login_username'));
	echo form_fieldset_close();
	echo '<br />';

	echo form_fieldset($this->lang->line('PASSWORD'));	
        $login_password = array(
	'name'     => 'login_password',
	'id'       => 'login_password',
	'maxlength' => '100',
	'size'     => '50',
	'style'    => 'width:100%',
	'type'	=> 'password',
	);
	
	echo form_input($login_password);
	echo form_fieldset_close();
	echo '<br />';

	
	$url_sent_from = current_url();
	echo form_hidden('url', $url_sent_from);
	
        echo '<div class="login_button"><div class="button">';
	echo '<button type="submit">'.$this->lang->line("LOGIN_BUTTON").'</button>';
        echo '</div></div>';
	echo form_close();
	}
?>
<br />
<br />
<br />



</div>
<br />
</div>