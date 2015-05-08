<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="/content/styles.css" />
    <title><?php echo htmlspecialchars($this->title) ?></title>
</head>

<body>
    <header>
        <a href="/"><img src="/content/images/site-logo.png"></a>
        <ul class="menu">
            <li><a href="/">Home</a></li>
            <li><a href="/posts">Posts</a></li>
            <li><a href="/books">Books</a></li>
        </ul>
    </header>
    <?php include_once('views/layouts/messages.php'); ?>
    <div class="wrapper">
