<h1>Create New Post</h1>

<form method="post" action="/posts/create">
    <fieldset>
        <label>
            Title
            <input type="text" name="title" required="required"/>
        </label>
        <label>
            Post:
            <textarea name="text" rows="8" required="required"></textarea>
        </label>
        <label>
            Enter tags separated with space:
            <input type="text" name="tags" required="required"/>
        </label>

        <button type="submit">Create</button>
            <a class="button" href="/">Cancel</a>

    </fieldset>

    <br/>

</form>
