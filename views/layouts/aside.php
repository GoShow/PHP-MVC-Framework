<aside>
    <h2>5 most popular tags</h2>
    <?php foreach ($this->tags as $tag) : ?>
        <div class="tags">
            <p><?= htmlspecialchars($tag['tag']) ?> - <?= htmlspecialchars($tag['tagsCount']) ?> hits</p>
        </div>
    <?php endforeach ?>
</aside>