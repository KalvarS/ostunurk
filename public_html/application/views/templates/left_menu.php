<div class="wrapper">
<div class="wrapper_main">
<div class="left_menu">
<div class="menu_content">
<div class="title">
<p><?php echo $this->lang->line("CATEGORIES"); ?></p>
</div>
<div class="categories">
<ul class="list">

<?php foreach ($categories as $category_item): ?>
<?php if ($category_item['category'] == 'Aiandus'): ?>
<li><a href="/index.php/item/<?php echo $category_item['category']; ?>"> <?php echo $this->lang->line("GARDENING"); echo " (".$category_item['sum'].")"?> </a></li>
<?php elseif ($category_item['category'] == 'Arvutid'): ?>
<li><a href="/index.php/item/<?php echo $category_item['category']; ?>"> <?php echo $this->lang->line("COMPUTERS"); echo " (".$category_item['sum'].")"?> </a></li>
<?php elseif ($category_item['category'] == 'Autod'): ?>
<li><a href="/index.php/item/<?php echo $category_item['category']; ?>"> <?php echo $this->lang->line("CARS"); echo " (".$category_item['sum'].")"?> </a></li>
<?php elseif ($category_item['category'] == 'Sport'): ?>
<li><a href="/index.php/item/<?php echo $category_item['category']; ?>"> <?php echo $this->lang->line("SPORTS"); echo " (".$category_item['sum'].")"?> </a></li>
<?php else: ?>
<li><a href="/index.php/item/<?php echo $category_item['category']; ?>"> <?php echo $category_item['category']; echo " (".$category_item['sum'].")"?> </a></li>
<?php endif ?>

<?php endforeach; ?>

</ul>
</div>
</div>
</div>
