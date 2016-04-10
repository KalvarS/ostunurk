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

<div class="pages_top"><div class="pagination"><?php echo $this->pagination->create_links()?></div></div><br /><br /><br />






<!-- Siia luuakse kuulutused ajaxiga -->
<div class="advert"><div id="ajax_table"></div></div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>js/LoadMore.js"></script> <!-- Kuulutuste juurde laadimise fail -->

<noscript> <!-- Kui javascript on keelatud laeme ikka tavaliselt php-ga 30 kuulutust kohe ära -->
<?php foreach ($adverts_segment as $adverts_item): ?>
<div class="advert">
<table class="table">
  <tr>
    <th rowspan="3"><img src="<?php if($adverts_item['pic1'] != '' && $adverts_item['pic1'] != null){echo $adverts_item['pic1'];}else{ echo 'http://ostunurk.cs.ut.ee/images/Ostunurk.png'; }?>" alt="kuulutuse_pilt"></th>
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

<!-- Nupp kuulutuste laadimiseks -->
<div class="lmb"></div><br /><br />

<div class="pages_bottom"><div class="pagination"><?php echo $this->pagination->create_links()?></div></div>





</div>
</div>
        