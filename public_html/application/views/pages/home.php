<div class="main_box">
<div class="main_content">

<div class="title">
<p><?php echo $this->lang->line("HOME_PAGE"); ?></p>
</div>

<div class="search_bar">
<div class="search_box">

<label for="search"><?php echo $this->lang->line("OTSING"); ?></label>
<input type="text" id="search">
</div>

<div class="search_button">
<a href="">
<div class="button">
<p><?php echo $this->lang->line("OTSI"); ?></p>
</div>
</a>
</div>
</div>




<h2><?php echo $this->lang->line("VIIM_KUULUTUS"); ?></h2>
<script defer src="<?php echo base_url(); ?>js/DataPush.js"></script> <!-- Viimase kuulutuse laadimise fail -->

<div id="viimane_kuulutus"></div>

</div>
</div>