<?php
class Post {
    private $user_obj;
    private $con;

    public function __construct($user,$con)
    {
        $this->con = $con;
        $this->user_obj = new Users($user,$con);
    }

    public function submitPost($body,$user_to) {
       $body = strip_tags($body);//remove HTML tag
        $body = mysqli_real_escape_string($this->con,$body);
        $check_query = preg_replace('/\s+/','',$body); //deletes all spaces

        if($check_query != "") {

            //current date and Time
            $date_added = date("Y-m-d H:i:s");
            //Get username

            $added_by = $this->user_obj->getUsername();

            //If user post himself on the timeline
            if($user_to == $added_by) {
                $user_to ="none" ;
            }

            //insert post
            $query = mysqli_query($this->con,"INSERT INTO posts 
                                    values ('','$body','$added_by','$user_to','$date_added','no','no','0')");

            $retuned_id = mysqli_insert_id($this->con);

            //Insert notification

            //Update post count for user
            $num_posts = $this->user_obj->getNumPosts();
            $num_posts++;
            $update_query = mysqli_query($this->con,"UPDATE users SET num_posts = '$num_posts' WHERE username='$added_by'");


        }

    }

    public function loadPostsFriend() {
        $str = "" ;
        $data = mysqli_query($this->con,"SELECT * FROM posts WHERE deleted = 'no' ORDER BY id DESC ");

        while($row = mysqli_fetch_array($data)) {
            $id = $row['id'];
            $body = $row['body'];
            $added_by = $row['added_by'];
            $date_time = $row['date_time'];

            if($row['user_to'] == "none") {
                $user_to = "" ;
            }
            else {

                $user_to_obj = new Users($row['user_to'],$this->con);
                $user_to_name = $user_to_obj->getFirstAndLastName();
                $user_to = "<a href ='".$row['user_to']."'>".$user_to_name."</a>" ;
            }

            $added_by_obj = new Users($added_by,$this->con);
            if($added_by_obj->isClosed()) {
                continue;
            }

            $user_details_query = mysqli_query($this->con,"SELECT first_name, last_name, profile_pic FROM users WHERE username = '$added_by'");
            $user_row = mysqli_fetch_array($user_details_query);

        }
    }
}


?>
