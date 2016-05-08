<div class="content">
<div class="main_box">
<div class="main_content">

<!--Kuulutuse lisamise vorm -->

<?php 
	if(isset($advert)){foreach ($advert as $item) {}};//kui on ette antud see massiiv andmetega
    	if($item['ID'] == null){echo '<div class="title"><p>'.$this->lang->line("ADD_AD").'</p></div>';}else{echo '<div class="title"><p>'.$this->lang->line("EDIT_AD").'</p></div>';}; 

	
	if(isset($adverttitle) && isset($adverttype) && isset($price) && isset($description)){
		echo validation_errors();
	}else{

	
	echo '<div class="errors">'.validation_errors().'</div>';
	echo form_open();
	echo form_fieldset($this->lang->line('TITLE'));	
	$adverttitle = array(
	'name'     => 'adverttitle',
	'id'       => 'adverttitle',
	'maxlength' => '100',
	'size'     => '50',
	'style'    => 'width:50%',
	);
	
	if($item['ID'] == null){
		echo form_input($adverttitle, set_value('adverttitle'));
	}else{
		echo form_input($adverttitle, $item['title']);
	};
	echo form_fieldset_close();
	echo '<br />';


	echo form_fieldset($this->lang->line('AD_TYPE'));
	$kuulutuse_tyyp = array(
	'fikseeritud'     => $this->lang->line('FIXED'),
	'avatud'       => $this->lang->line('OPEN'),
	);
	
	
	if($item['ID'] == null){
		echo form_dropdown('adverttype',$kuulutuse_tyyp, set_value('adverttype'));
	}else{
		echo form_dropdown('adverttype', $kuulutuse_tyyp, $item['type']);
	};
	
	echo form_fieldset_close();
	echo '<br />';
	
	echo form_fieldset($this->lang->line('PRICE'));
	$hind = array(
	'name'     => 'price',
	'id'       => 'price',
	'maxlength' => '30',
	'size'     => '50',
	'style'    => 'width:50%',
	);
	
	if($item['ID'] == null){
		echo form_input($hind, set_value('price'));
	}else{
		echo form_input($hind, $item['price']);
	};
	echo form_fieldset_close();
	echo '<br />';
	
	echo form_fieldset($this->lang->line('CATEGORY'));
	$kategooria = array(
	'Autod'     => $this->lang->line('CARS'),
	'Aiandus'       => $this->lang->line('GARDENING'),
	'Arvutid'       => $this->lang->line('COMPUTERS'),
	'Hobid'       => $this->lang->line('HOBBIES'),
	'Sport'       => $this->lang->line('SPORTS'),
	'Plaplapla'       => 'plaplapla',
	);
	
	if($item['ID'] == null){
		echo form_dropdown('categories',$kategooria, set_value('categories'));
	}else{
		echo form_dropdown('categories',$kategooria, $item['category']);
	};
	echo form_fieldset_close();
	echo '<br />';
	
	
	echo form_fieldset($this->lang->line('DESCRIPTION'));	
	$kirjeldus = array(
	'name'     => 'description',
	'id'       => 'description',
	'maxlength' => '500',
	'cols'     => '50',
	'rows'    => '8',
	);
	
	if($item['ID'] == null){
		echo form_textarea($kirjeldus, set_value('description'));
	}else{
		echo form_textarea($kirjeldus, $item['description']);
	};
	echo form_fieldset_close();
	echo '<br />';
	
	echo '<p>'.$this->lang->line("ADD_PIC_INFO").'</p>';
	echo '<br />';
	
	echo form_fieldset($this->lang->line('PIC1'));	
	$pilt1 = array(
	'name'     => 'pic1',
	'id'       => 'pic1',
	'maxlength' => '300',
	'size'     => '50',
	'style'    => 'width:50%',
	);
	
	if($item['ID'] == null){
		echo form_input($pilt1, set_value('pic1'));
	}else{
		echo form_input($pilt1, $item['pic1']);
	};
	echo form_fieldset_close();
	echo '<br />';
	

	echo form_fieldset($this->lang->line('PIC2'));	
	$pilt2 = array(
	'name'     => 'pic2',
	'id'       => 'pic2',
	'maxlength' => '300',
	'size'     => '50',
	'style'    => 'width:50%',
	);
	
	if($item['ID'] == null){
		echo form_input($pilt2, set_value('pic2'));
	}else{
		echo form_input($pilt2, $item['pic2']);
	};	echo form_fieldset_close();
	echo '<br />';
	
	
	echo form_fieldset($this->lang->line('PIC3'));	
	$pilt3 = array(
	'name'     => 'pic3',
	'id'       => 'pic3',
	'maxlength' => '300',
	'size'     => '50',
	'style'    => 'width:50%',
	);
	
	if($item['ID'] == null){
		echo form_input($pilt3, set_value('pic3'));
	}else{
		echo form_input($pilt3, $item['pic3']);
	};	
	echo form_fieldset_close();
	echo '<br />';
	
	
	echo form_fieldset($this->lang->line('PIC4'));	
	$pilt4 = array(
	'name'     => 'pic4',
	'id'       => 'pic4',
	'maxlength' => '300',
	'size'     => '50',
	'style'    => 'width:50%',
	);
	
	if($item['ID'] == null){
		echo form_input($pilt4, set_value('pic4'));
	}else{
		echo form_input($pilt4, $item['pic4']);
	};	echo form_fieldset_close();
	echo '<br />';
	
	$url_sent_from = current_url();
	echo form_hidden('url', $url_sent_from);
	
	$user = $this->session->userdata('username');
	echo form_hidden('username', $user);

	
        echo '<div class="save_button"><div class="button">';
	echo $this->lang->line('SUBMIT');
	echo '</div></div>';
	echo $this->lang->line('CANCEL');

	echo form_close();
	}
	
?>




</div>
</div>
</div>