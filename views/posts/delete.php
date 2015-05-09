<h1><?= htmlspecialchars($this->post['title']) ?></h1>
<p><?= htmlspecialchars($this->post['text']) ?></p>
<p>Posted on: <?= htmlspecialchars($this->post['postedOn']) ?></p>
<h2>Are you sure you want to delete this post</h2>

<form method="POST" action="/posts/confirmDelete" + >
    <input type="hidden" name="postId" value="<?= htmlspecialchars($this->post['id']) ?>" />
    <button type="submit">Yes</button>
    <a class="button" href="/">Cancel</a>
</form>
