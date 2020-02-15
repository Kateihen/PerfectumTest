<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Comments</title>

</head>
<body>

    <?php echo validation_errors(); ?>

    <?php echo form_open('/comments/create'); ?>
    
        <label for="name">Name:</label><br />
        <input type="text" name="user_name" /><br />

        <label for="email">Email:</label><br />
        <input type="email" name="email" required/><br />

        <label for="body">Your Comment:</label><br />
        <textarea name="body"></textarea><br />

        <input type="submit" name="submit" value="Add Comment" />
    </form>

    <?php foreach($comments as $comment): ?>
        <h3><?php echo $comment['user_name']; ?></h3>
        <p><?php echo $comment['body']; ?></p>
    <?php endforeach; ?>

    <p><?php echo $links; ?></p>
</body>
</html>