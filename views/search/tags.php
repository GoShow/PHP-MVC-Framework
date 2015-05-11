<?php if (count($this->postsByTag) > 0) : ?>
    <h1>Search by tag: <?php echo $this->tag ?></h1>
<?php foreach ($this->postsByTag as $post) : ?>
    <div class="post">
        <h2><?= htmlspecialchars($post['title']) ?></h2>
        <p><?= htmlspecialchars($post['text']) ?></p>
        <p>Posted on: <?= htmlspecialchars($post['postedOn']) ?></p>
        <p>Visits: <?= htmlspecialchars($post['visits']) ?></p>


    </div>

<?php endforeach ?>
<?php endif ?>
<?php if (count($this->postsByTag) == 0) : ?>
    <h1>No results found for tag: <?php echo $this->tag ?></h1>
<?php endif ?>
