<h1>Create New Post</h1>

<form method="post" action="/posts/create">
    <label>
        Title
        <input type="text" name="title"/>
    </label>
    <br/><br/>
    New post:
    <textarea name="text">
    </textarea>
    <input type="submit" value="Create">
    <br />
    <a href="/posts">Cancel</a>
</form>
