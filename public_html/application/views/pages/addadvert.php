<div class="wrapper">
<div class="wrapper_main">
<div class="left_menu">
<div class="menu_content">
<div class="title">
<p>Kategooriad</p>
</div>	
<div class="categories">
<ul class="list">
<li><a href="/index.php/adverts/autod">Autod</a></li>
<li><a href="/index.php/adverts/aiandus">Aiandus</a></li>
<li><a href="/index.php/adverts/arvutid">Arvutid</a></li>
<li><a href="/index.php/adverts/jalgrattad">Jalgrattad</a></li>
<li><a href="/index.php/adverts/muusika">Muusika</a></li>
<li><a href="/index.php/adverts/sport">Sport</a></li>
<li><a href="/index.php/adverts/hobid">Hobid</a></li>
<li><a href="viga.html">--------</a></li>
<li><a href="viga.html">--------</a></li>
<li><a href="viga.html">--------</a></li>
<li><a href="viga.html">--------</a></li>
</ul>
</div>
</div>
</div>


<div class="content">
<div class="main_box">
<div class="main_content">

<div class="title">
<p>Lisa kuulutus</p>
</div>






<!--Kuulutuse lisamise vorm -->
<?php
	if(isset($adverttitle) && isset($adverttype) && isset($price) && isset($description)){
		echo validation_errors();
	}else{
	echo validation_errors();
	echo form_open();
	echo form_fieldset('Pealkiri');	
	$adverttitle = array(
	'name'     => 'adverttitle',
	'id'       => 'adverttitle',
	'maxlength' => '100',
	'size'     => '50',
	'style'    => 'width:50%',
	);
	
	echo form_input($adverttitle, set_value('adverttitle'));
	echo form_fieldset_close();
	echo '<br>';


	echo form_fieldset('Kuulutuse tüüp');
	$kuulutuse_tyyp = array(
	'fikseeritud'     => 'Fikseeritud hinnaga',
	'avatud'       => 'Avatud hinnaga',
	);
	
	echo form_dropdown('adverttype',$kuulutuse_tyyp);
	echo form_fieldset_close();
	echo '<br>';
	
	echo form_fieldset('Hind');
	$hind = array(
	'name'     => 'price',
	'id'       => 'price',
	'maxlength' => '30',
	'size'     => '50',
	'style'    => 'width:50%',
	);
	
	echo form_input($hind);
	echo form_fieldset_close();
	echo '<br>';
	
	echo form_fieldset('Kategooria');
	$kategooria = array(
	'autod'     => 'Autod',
	'aiandus'       => 'Aiandus',
	'arvutid'       => 'Arvutid',
	'hobid'       => 'Hobid',
	'sport'       => 'Sport',
	'plaplapla'       => 'plaplapla',
	);
	
	echo form_dropdown('categories',$kategooria);
	echo form_fieldset_close();
	echo '<br>';
	
	
	echo form_fieldset('Kirjeldus');	
	$kirjeldus = array(
	'name'     => 'description',
	'id'       => 'description',
	'maxlength' => '500',
	'cols'     => '50',
	'rows'    => '8',
	);
	
	echo form_textarea($kirjeldus);
	echo form_fieldset_close();
	echo '<br>';
	
	echo '<p>Piltide lisamiseks sisesta järgnevatesse kastidesse piltide aadressid. Igasse kasti üks aadress. Kokku saab ühele kuulutusele lisada 4 pilti. Kui sa ei soovi pilte lisada, jäta kastid tühjaks.</p><br>';
	
	echo form_fieldset('Pilt1');	
	$pilt1 = array(
	'name'     => 'pic1',
	'id'       => 'pic1',
	'maxlength' => '300',
	'size'     => '50',
	'style'    => 'width:50%',
	);
	
	echo form_input($pilt1);
	echo form_fieldset_close();
	echo '<br>';
	

	echo form_fieldset('Pilt2');	
	$pilt2 = array(
	'name'     => 'pic2',
	'id'       => 'pic2',
	'maxlength' => '300',
	'size'     => '50',
	'style'    => 'width:50%',
	);
	
	echo form_input($pilt2);
	echo form_fieldset_close();
	echo '<br>';
	
	
	echo form_fieldset('Pilt3');	
	$pilt3 = array(
	'name'     => 'pic3',
	'id'       => 'pic3',
	'maxlength' => '300',
	'size'     => '50',
	'style'    => 'width:50%',
	);
	
	echo form_input($pilt3);
	echo form_fieldset_close();
	echo '<br>';
	
	
	echo form_fieldset('Pilt4');	
	$pilt4 = array(
	'name'     => 'pic4',
	'id'       => 'pic4',
	'maxlength' => '300',
	'size'     => '50',
	'style'    => 'width:50%',
	);
	
	echo form_input($pilt4);
	echo form_fieldset_close();
	echo '<br>';
	
	$url_sent_from = current_url();
	echo form_hidden('url', $url_sent_from);
	
	echo '<button type="submit"><div class="save_button"><a type="submin"href="/index.php/addadvert"><div class="button">Salvesta!</div></a></div></button>';
	echo '<div class="cancel_button"><a href="/index.php/home"><div class="button">Tühista!</div></a></div><br><br>';
	
	echo form_close();
	}
?>




</div>
</div>
</div>



<div class="right_menu">
<div class="menu_content">
<div class="title">
<p>Minu konto</p>
</div>
<br />

<label for="username">Kasutaja:</label>
<input type="text" id="username"><br><br>
<label for="password">Parool:</label>
<input type="password" id="password"><br><br>

<a href="/index.php/addadvert">
<div class="button">
Logi sisse!
</div>
</a>
<br>

<a href="/index.php/register">
<div class="button">
Registreeru!
</div>
</a>
<br />

<ul class="list">
</ul>
</div>
</div>



</div>
</div>