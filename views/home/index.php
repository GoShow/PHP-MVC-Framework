<?php foreach ($this->posts as $post) : ?>
    <div class="post">
        <h2><?= htmlspecialchars($post['title']) ?></h2>

        <p>Visits: <?= htmlspecialchars($post['visits']) ?></p>

        <form method="post" action="/posts">
            <input type="hidden" name="postId" value="<?= htmlspecialchars($post['id']) ?>"/>
            <button type="submit">View This Post</button>
        </form>
        <?php if ($this->isAdmin()) : ?>

            <form method="post" action="/posts/edit">
                <input type="hidden" name="postId" value="<?= htmlspecialchars($post['id']) ?>"/>
                <button type="submit">Edit</button>
            </form>

            <form method="post" action="/posts/delete">
                <input type="hidden" name="postId" value="<?= htmlspecialchars($post['id']) ?>"/>
                <button type="submit">Delete</button>
            </form>
        <?php endif; ?>
    </div>

<?php endforeach ?>
