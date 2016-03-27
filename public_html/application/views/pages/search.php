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
<p>Otsi kuulutusi</p>
</div>

<div class="search_bar">
<!--Kuulutuse lisamise vorm -->


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

<?php foreach ($adverts as $adverts_item): ?>

<div class="advert">
<table>
  <tr>
    <td rowspan="3" width="102px"><img id="advert_picture" src="<?php if($adverts_item['pilt1'] != '' && $adverts_item['pilt1'] != null){echo $adverts_item['pilt1'];}else{ echo 'http://ostunurk.cs.ut.ee/images/Ostunurk.png'; }?>" alt="kuulutuse_pilt"></th>
    <td width="50%">Pealkiri: <a href="/index.php/adverts/view_advert/<?php echo $adverts_item['ID']; ?>"><?php echo $adverts_item['pealkiri']; ?></a></th>
    <td>Müüja: <?php echo $adverts_item['myyja']; ?></th>
  </tr>
  <tr>
    <td>Kuulutuse tüüp: <?php echo $adverts_item['kuulutuse_tyyp']; ?></td>
    <td></td>
  </tr>
  <tr>
    <td>Hind: <?php echo $adverts_item['hind']; ?></td>
    <td><a href="viga.">Jälgi kuulutust</a></td>
  </tr>
</table>
</div>
<br>
<?php endforeach; ?>

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