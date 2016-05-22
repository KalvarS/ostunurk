<div class="wrapper">
<div class="wrapper_main">
<div class="register_box">
<div class="content_register">
<div class="title"><?php echo $this->lang->line("REGISTRATION"); ?></div>
<div class="form_validation_errors"> <?php echo validation_errors(); ?> </div>

<!-- <?php echo form_open('/form/register'); ?> -->

<form method="post" accept-charset="utf-8" action="/index.php/form/register">

<div class="form_account_info">
<h2><?php echo $this->lang->line("ACCOUNT_INFO"); ?>:</h2>
<table>
<tr>
<td> 
<label for="new_username"><?php echo $this->lang->line("USERNAME"); ?>:</label>
<input type="text" id="new_username" name="new_username" value="<?php echo set_value('new_username'); ?>" />
</td>
</tr>

<tr>
<td>
<label for="new_password"><?php echo $this->lang->line("PASSWORD"); ?>:</label>
<input type="password" id="new_password" name="new_password" />
</td>
</tr>

<tr>
<td>
<label for="new_password_again"><?php echo $this->lang->line("PASSWORD_AGAIN"); ?>:</label>
<input type="password" id="new_password_again" name="new_password_again" />
</td>
</tr>


<tr>
<td>
<label for="new_email">E-mail:</label>
<input type="text" id="new_email" name="new_email" value="<?php echo set_value('new_email'); ?>" />
</td>
</tr>
</table>


</div>
<div class="form_personal_info">
<h2><?php echo $this->lang->line("PERSONAL_INFO"); ?>:</h2>

<table>
<tr>
<td>
<label for="new_firstname"><?php echo $this->lang->line("FIRST_N"); ?>:</label>
<input type="text" id="new_firstname" name="new_firstname" value="<?php echo set_value('new_firstname'); ?>" />
</td>
</tr>

<tr>
<td>
<label for="new_lastname"><?php echo $this->lang->line("LAST_N"); ?>:</label>
<input type="text" id="new_lastname" name="new_lastname" value="<?php echo set_value('new_lastname'); ?>" />
</td>
</tr>

<tr>
<td>
<label for="new_phone"><?php echo $this->lang->line("PHONE_NR"); ?>:</label>
<input type="text" id="new_phone" name="new_phone" value="<?php echo set_value('new_phone'); ?>" />
</td>
</tr>

<tr>
<td>
<label for="new_personal_id"><?php echo $this->lang->line("ID"); ?>:</label>
<input type="text" id="new_personal_id" name="new_personal_id" value="<?php echo set_value('new_personal_id'); ?>" />
</td>
</tr>
</table>
</div>

<div class="user_agreement">
<label for="user_agreement_text"><?php echo $this->lang->line("TERMS_CONDITIONS"); ?>:</label>
<textarea rows="4" cols="50" readonly="readonly" id="user_agreement_text">
1.
.............................
2.
.............................
3.
.............................
4.
.............................
5.
.............................
6.
.............................
7.
.............................
8.
.............................
9.
.............................
</textarea>
<p><?php echo $this->lang->line("ID_AUD_INFO"); ?>.</p>
<p><?php echo $this->lang->line("TERMS_CONFIRM"); ?>. </p>
<br />
</div>

<div class="register_button"><div class="button"><button type="submit"><?php echo $this->lang->line("REGISTER"); ?></button></div></div>

<div class="cancel_button"><div class="button"> <?php echo $this->lang->line("CANCEL"); ?> <a href="<?php echo base_url(); ?>"></a></div></div>

</form>

</div>
</div>
</div>
</div>  