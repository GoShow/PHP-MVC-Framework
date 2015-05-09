<h1>Edit your post</h1>

<form method="POST" action="/posts/confirmEdit">
    <fieldset>
        <input name="title" placeholder="<?= htmlspecialchars($this->post['title']) ?>" value="<?= htmlspecialchars($this->post['title']) ?>" required="required"/>
        <textarea name="text" rows="15" required="required"><?= htmlspecialchars($this->post['text']) ?></textarea>
        <input type="hidden" name="postId" value="<?= htmlspecialchars($this->post['id']) ?>" />

        <button type="submit">Edit</button>
        <a class="button" href="/">Cancel</a>

    </fieldset>
</form>
