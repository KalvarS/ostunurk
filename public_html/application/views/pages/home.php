<div class="main_box">
<div class="main_content">
<div class="search_bar">


<div class="search_box">

<label for="search"><?php echo $this->lang->line("OTSING"); ?></label>
<input type="text" id="search">
</div>

<div class="search_button">
<a href="viga.html">
<div class="button">
<p><?php echo $this->lang->line("OTSI"); ?></p>
</div>
</a>
</div>
</div>


<img id="main_page_picture" src="http://ostunurk.cs.ut.ee/images/Ostunurk.png" alt="" longdesc="decorative_image_on_the_first_page">

<h2><?php echo $this->lang->line("VIIM_KUULUTUS"); ?></h2>
<script src="<?php echo base_url(); ?>js/DataPush.js"></script> <!-- Viimase kuulutuse laadimise fail -->

<p id="viimane_kuulutus"></p>

</div>
</div>