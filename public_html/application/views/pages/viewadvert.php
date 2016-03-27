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
<div class="main_box">
<div class="main_content">
<div class="search_bar">


<div class="search_box">

<label for="search">Otsing:</label>
<input type="text" id="search">
</div>

<div class="search_button">
<a href="viga.html">
<div class="button">
Otsi!
</div>
</a>
</div>
</div>

<div class="advert_pictures">
<?php foreach ($adverts as $adverts_item): ?>
<a href="<?php if($adverts_item['pilt1'] != ''){echo $adverts_item['pilt1'];}?>"><img id="advert_pic1" src="<?php if($adverts_item['pilt1'] != ''){echo $adverts_item['pilt1'];}else{ echo 'http://ostunurk.cs.ut.ee/images/Ostunurk.png'; }?>" alt="Pilt1"></a>
<a href="<?php if($adverts_item['pilt2'] != ''){echo $adverts_item['pilt2'];}?>"><img id="advert_pic2" src="<?php if($adverts_item['pilt2'] != ''){echo $adverts_item['pilt2'];}else{ echo 'http://ostunurk.cs.ut.ee/images/Ostunurk.png'; }?>" alt="Pilt2"></a>
<a href="<?php if($adverts_item['pilt3'] != ''){echo $adverts_item['pilt3'];}?>"><img id="advert_pic3" src="<?php if($adverts_item['pilt3'] != ''){echo $adverts_item['pilt3'];}else{ echo 'http://ostunurk.cs.ut.ee/images/Ostunurk.png'; }?>" alt="Pilt3"></a>
<a href="<?php if($adverts_item['pilt4'] != ''){echo $adverts_item['pilt4'];}?>"><img id="advert_pic4" src="<?php if($adverts_item['pilt4'] != ''){echo $adverts_item['pilt4'];}else{ echo 'http://ostunurk.cs.ut.ee/images/Ostunurk.png'; }?>" alt="Pilt4"></a>
<?php endforeach; ?>
</div>

<div class="advert_info">
<table>
  <tr>
    <td> Hind:  <?php  echo $adverts_item['hind'];?> </td>

  </tr>
  <tr>
    <td>Müüja: <?php  echo $adverts_item['myyja'];?></td>
</tr>
<tr>
    <td>E-mail: </td>
</tr>
<tr>
    <td>Tel nr: </td>
</tr>
<tr>
    <td>Kirjeldus: <?php  echo $adverts_item['kirjeldus'];?></td>
</tr>
</table>
<br/>
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

<a href="/index.php/form">
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

