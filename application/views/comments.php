<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Comments</title>
    <style type="text/css">

    input {
        width: 46%;
        padding: 12px 20px;
        margin: 4px;
        background-color: #fff;
        color: #000; 
    }
    textarea {
        width: 96%;
        padding: 12px 20px;
        resize: vertical;
        margin: 4px;
    }
    div {
        margin: auto;
        width: 80%;
    }
    input[type=submit] {
        padding: 12px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        float: right;
        border: 1px solid #ccc;
        margin-bottom: 20px;
    }
    input[type=submit]:hover {
    background-color: #e3dede;
    }
    hr {
        clear: right;
    }
    </style>
</head>
<body>

    <?php echo validation_errors(); ?>

    <div>
        <?php echo form_open('/comments/create'); ?>
            <p>Enter Your Comment:</p>
            <input type="text" name="user_name" placeholder="Name"/>
            <input type="email" name="email" placeholder="Email" required/><br />
            <textarea name="body" placeholder="Your Comment"></textarea><br />

            <input type="submit" name="submit" value="Add Comment" />
        </form>

        <hr>
        <?php foreach($comments as $comment): ?>
            <h3><?php echo $comment['user_name']; ?></h3>
            <p><?php echo $comment['body']; ?></p>
            <hr>
        <?php endforeach; ?>
        <p><?php echo $links; ?></p>
    </div>
</body>
</html>