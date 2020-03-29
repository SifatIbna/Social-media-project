<?php
include ("includes/header.php");
include ("includes/classes/Users.php");
include ("includes/classes/Post.php");

if(isset($_POST['post'])) {
    $post = new Post($userLoggedIn,$con);
    $post->submitPost($_POST['post_text'],'none');
}


?>
    <div class="user_details columns">
        <a href="<?php echo $userLoggedIn; ?>">
            <img src="<?php echo $user['profile_pic'];?>">
        </a>
        <div class="user_details_left_right">
        <a href="<?php echo $userLoggedIn; ?>">
            <?php
            echo $user['first_name']." ".$user['last_name'];
            ?>
        </a>
        <br>
         <br>
        <?php echo"Posts:".$user['num_posts']."<br>";
        echo "Likes:".$user['num_likes'];?>
        </div>
    </div>

    <div class="main_column columns">
        <form class="post_form" action="index.php" method="post">
            <textarea name="post_text" id="post_text" placeholder="Marvel or DC ?, #IT_MATTERS!!"></textarea>
            <input type="submit" name="post" id="post_button" value="Flame On!">
            <hr>
        </form>


    </div>


</div>

</body>
</html>
