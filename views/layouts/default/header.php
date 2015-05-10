<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="/content/styles.css"/>
    <title><?php echo htmlspecialchars($this->title) ?></title>
</head>

<body>
<header>
    <a href="/"><img src="/content/images/site-logo.png"></a>
    <ul class="menu">
        <li><a href="/">Home</a></li>
        <?php if ($this->isAdmin()) : ?>
            <li><a href="/posts/create">New post</a></li>
        <?php endif; ?>
        <?php if (!$this->isLoggedIn()) : ?>
            <li><a href="/account/login">Login</a></li>
            <li><a href="/account/register">Register</a></li>
        <?php endif; ?>
    </ul>
    <?php if ($this->isLoggedIn()) : ?>
        <div class="logged">
            <span>Hello, <?php echo $_SESSION['username'] ?></span>

            <form action="/account/logout" method="POST">
                <button class="logout" type="submit">Logout</button>
            </form>
        </div>
    <?php endif; ?>
</header>
<div class="wrapper">
    <?php include_once('views/layouts/aside.php'); ?>
    <div class="content">
        <?php include_once('views/layouts/messages.php'); ?>
