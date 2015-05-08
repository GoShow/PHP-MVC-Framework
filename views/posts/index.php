
<?php foreach ($this->posts as $post) : ?>
    <div class="post">
        <h2><?= htmlspecialchars($post['title']) ?></h2>
        <p><?= htmlspecialchars($post['text']) ?></p>
        <p>Posted on: <?= htmlspecialchars($post['postedOn']) ?></p>
    </div>
<?php endforeach ?>
<a href="/posts/create">[Create New]</a>
