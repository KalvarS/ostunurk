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
<?php echo $this->lang->line("OTSI"); ?>
</div>
</a>
</div>
</div>



<div class="advert_pictures">   
<?php foreach ($adverts as $adverts_item): ?>
<img src="<?php if($adverts_item['pic1'] != ''){echo $adverts_item['pic1'].'" class="masterTooltip" title="Click to enlarge';}else{ echo 'http://ostunurk.cs.ut.ee/images/piltPuudub.png'; } ?>"  alt="Pilt1" onclick="displayImg(this.src, '<?php echo $adverts_item['pic1']; ?>')">

<img src="<?php if($adverts_item['pic2'] != ''){echo $adverts_item['pic2'].'" class="masterTooltip" title="Click to enlarge';}else{ echo 'http://ostunurk.cs.ut.ee/images/piltPuudub.png'; } ?>"  alt="Pilt2" onclick="displayImg(this.src, '<?php echo $adverts_item['pic2']; ?>')">

<img src="<?php if($adverts_item['pic3'] != ''){echo $adverts_item['pic3'].'" class="masterTooltip" title="Click to enlarge';}else{ echo 'http://ostunurk.cs.ut.ee/images/piltPuudub.png'; } ?>"  alt="Pilt3" onclick="displayImg(this.src, '<?php echo $adverts_item['pic3']; ?>')">

<img src="<?php if($adverts_item['pic4'] != ''){echo $adverts_item['pic4'].'" class="masterTooltip" title="Click to enlarge';}else{ echo 'http://ostunurk.cs.ut.ee/images/piltPuudub.png'; } ?>"  alt="Pilt4" onclick="displayImg(this.src, '<?php echo $adverts_item['pic4']; ?>')">
<?php endforeach; ?>
</div>


<div id="largeImgPanel" onclick="this.style.display='none'">
<img id="largeImg" src="ostunurk.cs.ut.ee" alt="large image" /> <!-- see src on lisatud ainult sellepärast, et html validaator ei hakkaks errorit viskama, tegelt ei ole seda src vajagi sinna. -->
</div>


<div class="advert_info">
<table>
  <tr>
    <td><?php echo $this->lang->line("PRICE"); ?>:   <?php  echo $adverts_item['price']; ?> </td>

  </tr>
  <tr>
    <td><?php echo $this->lang->line("SELLER"); ?>: <?php  echo $adverts_item['seller']; ?></td>
</tr>
<tr>
    <td>E-mail: <?php  echo $adverts_item['email']; ?></td>
</tr>
<tr>
    <td><?php echo $this->lang->line("PHONE_NR"); ?>: <?php  echo $adverts_item['phone_number']; ?></td>
</tr>
<tr>
    <td><?php echo $this->lang->line("DESCRIPTION"); ?>: <?php  echo $adverts_item['description'];?></td>
</tr>
</table>
<br/>
</div>


</div>
</div>