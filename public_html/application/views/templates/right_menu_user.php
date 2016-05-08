<div class="right_menu">
<div class="menu_content">
<div class="title">
<p><?php echo $this->lang->line("ACCOUNT"); ?></p>
</div>
<br />


<p><?php echo $this->lang->line("USERNAME"); ?>: <?php echo $this->session->userdata('username');?></p>
<br/>
<a href="/index.php/pages/logout">
<div class="button">
<?php echo $this->lang->line("LOGOUT"); ?>
</div>
</a>
<br />
<a href="/index.php/form/add_advert"><?php echo $this->lang->line("ADD_AD"); ?></a>
<br />
<br />
<a href="/index.php/item/watchlist"><?php echo $this->lang->line("WATCHLIST"); ?></a>
<br />
<br />
<a href="/index.php/item/myitems"><?php echo $this->lang->line("MY_ADVERTS"); ?></a>
<ul class="list">
</ul>
</div>
</div>



</div>
</div>
