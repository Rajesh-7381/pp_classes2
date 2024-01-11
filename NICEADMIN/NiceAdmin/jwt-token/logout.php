<!-- <?php
 require './vendor/autoload.php';
 use Firebase\JWT\JWT;
 $error='';
if(isset($_POST['login'])){
    $connect=new PDO("mysql:host=localhost;dbname=testing","root","password");
    if(empty($_POST['email'])){
        $error="please enter email address";
    }else if(empty($_POST['password'])){
        $error="please enter password ";
    }else{
        $query="select * from user where email=?";
        $statement=$connect->prepare($query);
        $statement->execute([$_POST['email']]);
        $data=$statement->fetch(PDO::FETCH_ASSOC);
        if($data){
            if($data['user_password'] === $_POST['password']){

            }
        }else{
            $error="wrong email address";
        }
    }
}

?> -->
logout