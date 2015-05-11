<aside>
    <h2>5 most popular tags</h2>
    <?php foreach ($_SESSION['tags'] as $tag) : ?>
        <div class="tags">
            <p><?= htmlspecialchars($tag['tag']) ?> - <?= htmlspecialchars($tag['tagsCount']) ?> hits</p>
        </div>
    <?php endforeach ?>

    <h2>Search by tags</h2>

    <form action="/search/tags" method="post">
        <label>
            Enter tag:
            <input type="search" name="tag"/>
        </label>
        <button type="submit">Search</button>
    </form>
</aside>