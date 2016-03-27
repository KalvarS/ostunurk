<h2><?php echo $title; ?></h2>

<?php foreach ($adverts as $adverts_item): ?>

        <h3><?php echo $adverts_item['title']; ?></h3>
        <h3><?php echo $adverts_item['pilt']; ?></h3>
        <div class="main">
                <?php echo $adverts_item['text']; ?>
        </div>
        <p><a href="<?php echo site_url('adverts/'.$adverts_item['slug']); ?>">View article</a></p>


<?php endforeach; ?>
