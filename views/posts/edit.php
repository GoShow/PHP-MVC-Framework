<h1>Edit Existing Author</h1>

<?php if ($this->author) { ?>
<form method="post" action="/authors/edit/<?= $this->author['id'] ?>">
    Author name:
    <input type="text" name="name"
        value="<?= htmlspecialchars($this->author['name']) ?>" />
    <br/>
    <input type="submit" value="Edit" />
    <a href="/authors">Cancel</a>
</form>
<?php } ?>
