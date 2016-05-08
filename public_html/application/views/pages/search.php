<div class="main_box">
<div class="main_content">

<div class="title">
<p><?php echo $this->lang->line("SEARCH_ADS"); ?></p>
</div>
<div class="search_bar">
<div class="search_box">

<label for="search"><?php echo $this->lang->line("OTSING"); ?></label>
<input type="text" id="search">
</div>

<div class="search_button">
<a href="viga.html">
<div class="button">
<?php echo $this->lang->line("OTSI"); ?>
</div>
</a>
</div>
</div>



<div class="search_bar"><div class="sorting">
<p>Sorteeri kuulutusi</p>
<form enctype="multipart/form-data" action="/index.php/item/change_sorting/<?php if(is_numeric(end((explode('/', current_url()))))){echo explode('/', current_url())[(count(explode('/', current_url())))-2];}else{echo end((explode('/', current_url())));}; ?>" method="post"> 
  <fieldset>
  <label for="titleaz">Pealkiri: A-Z</label>
  <input id="titleaz" type="radio" name="sort" value="titleaz" checked />

  <label for="titleza">Pealkiri: Z-A</label>
  <input id="titleza" type="radio" name="sort" value="titleza" />

  <label for="priceasc">Hind: Tõusev</label>
  <input id="priceasc" type="radio" name="sort" value="priceasc" />

  <label for="pricedesc">Hind: Langev</label>
  <input id="pricedesc" type="radio" name="sort" value="pricedesc" />
  <div class="cancel_button"><div class="button"><button type="submit">Järjesta</button></div></div>
  </fieldset>
</form>
</div></div><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />



<div class="pages_top"><div class="pagination"><?php echo $this->pagination->create_links()?></div></div><br /><br /><br />






<!-- Siia luuakse kuulutused ajaxiga -->
<div class="advert"><div id="ajax_table"></div></div>
<script defer src="<?php echo base_url(); ?>js/jquery.min.js"></script> <!-- Jquery -->
<script defer src="<?php echo base_url(); ?>js/LoadMore.js"></script> <!-- Kuulutuste juurde laadimise script -->



<!--

<noscript> <!- - Kui javascript on keelatud laeme ikka tavaliselt php-ga 30 kuulutust kohe 채ra - ->
<?php foreach ($adverts_segment as $adverts_item): ?>
<div class="advert">
<table class="table">
  <tr>
    <th rowspan="3"><img <?php echo ' src="'.$adverts_item['pic1'].'"'; ?>  onerror="this.src='http://ostunurk.cs.ut.ee/images/piltPuudub.png'" alt="kuulutuse_pilt"></th>
    <td><?php echo $this->lang->line("TITLE"); ?>: <a href="/index.php/adverts/view_advert/<?php echo $adverts_item['ID']; ?>"><?php echo $adverts_item['title']; ?></a></td>
    <td><?php echo $this->lang->line("SELLER"); ?>: <?php echo $adverts_item['seller']; ?></td>
  </tr>
  <tr>
    <td><?php echo $this->lang->line("AD_TYPE"); ?>: <?php echo $adverts_item['type']; ?></td>
    <td></td>
  </tr>
  <tr>
    <td><?php echo $this->lang->line("PRICE"); ?>: <?php echo $adverts_item['price']; ?></td>
    <td><a href="viga."><?php echo $this->lang->line("WATCHLIST_ADD"); ?></a></td>
  </tr>
</table>
</div>
<br>
<?php endforeach; ?>
</noscript>

-->

<!-- Nupp kuulutuste laadimiseks -->
<div class="lmb"></div><br /><br />

<div class="pages_bottom"><div class="pagination"><?php echo $this->pagination->create_links()?></div></div>





</div>
</div>
        