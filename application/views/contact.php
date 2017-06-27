<script type="text/javascript">
    function Proc(location)
    {
        window.location = location;
    }
</script>

<?php

$name = $_POST['name'];
$sub = $_POST['subject'];
$from_email = $_POST['email'];
$message = $_POST['message'];


$body="Order Form \n\nName : $name \nEmail Address :$from_email \nSubject :$sub \nMessage :$message";

$to_email = 'rp@precise-tech.net';

$subject = "Contact Request from precise-tech.net : ".  $sub ;


$from_header = 'From: ' . $_POST["email"] . "\r\n" .
    'Reply-To: '. $_POST["email"] . "\r\n" .
    'X-Mailer: PHP/' . phpversion();


if($name!="" && $message!="" && $_POST["email"]!="")
{
    set_time_limit(2);
    if(mail($to_email, $subject, $body, $from_header)) {

        echo 'YES';
    }

    else {

        echo "Please Try Again";
    }
}
else
{
    echo "Fill required fields";

}
?>