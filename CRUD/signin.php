<?php session_start();
ob_start();
include('config.php');
include('navbar.html');

    
if(isset($_POST['submit'])){
                    //assign variables to post values
                    $email = $_POST['email'];
                    $password = $_POST['password'];
              
                    
              
                    //get the user with email
                    $stmt = $pdo->prepare('SELECT * FROM users WHERE email = :email');
              
                    try{
                        $stmt->execute(['email' => $email]);
              
                        //check if email exist
                        if($stmt->rowCount() > 0){
                            //get the row
                            $user = $stmt->fetch();
              
                            //validate inputted password with $user password
                            if(password_verify($password, $user['password'])){
                                //action after a successful login
                                $_SESSION['id'] = $user['id']; 
                                header('location: dashboard/dashboard.php'); 
                                $_SESSION['email'] = $email; 
                               
                                ob_end_flush();         
                                $_SESSION['success'] = 'User verification successful';
                                echo "
                                <div class='alert alert-success text-center'>
                                    <i class='fas fa-check-circle'></i> ".$_SESSION['success']."
                                </div>
                            ";
                          
                            }
                            else{
                                //return the values to the user
                                $_SESSION['email'] = $email;
                                $_SESSION['password'] = $password;
              
                                $_SESSION['error'] = 'Incorrect password or email';
                                echo "
                        <div class='alert alert-danger text-center'>
                            <i class='fas fa-exclamation-triangle'></i> ".$_SESSION['error']." ";
  
                            }
              
                        }
                        else{
                            //return the values to the user
                            $_SESSION['email'] = $email;
                            $_SESSION['password'] = $password;

                            $_SESSION['error'] = 'No account associated with the email';
                            echo "
                            <div class='alert alert-danger text-center'>
                                <i class='fas fa-exclamation-triangle'></i> ".$_SESSION['error']." ";
      
                        }
              
                    }
                    catch(PDOException $e){
                        $_SESSION['error'] = $e->getMessage();
                    }
              
                }
                /*else{
                    $_SESSION['error'] = 'Fill up login form first';
                    echo "
                    <div class='alert alert-danger text-center'>
                        <i class='fas fa-exclamation-triangle'></i> ".$_SESSION['error']." ";

                }*/
            
?>
           
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="style.css" />
<!------ Include the above in your HEAD tag ---------->

<div class="container register">

                <div class="row">
                    <div class="col-md-3 register-left">
                        <img src="https://image.ibb.co/n7oTvU/logo_white.png" alt=""/>
                        <h3>Bonjour</h3>
                        <h6>"Inscrivez-vous dès maintenant pour débloquer un monde d'opportunités éducatives et professionnelle. Votre avenir commence ici!"<h6></br>
                       
                       <h5>Vous avez pas un compte</h5><a href="signup.php"><input type="submit" name="register" value="Register"/><br/></a>
                       
                    </div>
                  
                    <div class="col-md-9 register-right">
                      
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <h3 class="register-heading">Vous allez déja un compte.</h3>
                                <div class="row register-form">
                                   
                                    <div class="col-md-6">
                                        
                                        <form action="" method="POST">

                                        <div class="form-group">
                                            <input type="text" name="email" class="form-control" placeholder="Email *" value="" required/>
                                        </div>
                                        
                                        
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control" placeholder="Password *" value="" required/>
                                        </div>
                        
                                    
                                        <div class="form-group">
                                        <!--<input type="checkbox" checked="checked" name="remember"> Remember me -->                                       </div>
                                      
                                        <input type="submit" name="submit" class="btnRegister"  value="Login"/>
                                        
                                        </div>

                                    </div>
                                    
                                        
                                     </form>
                                    </div>
                                </div>
                            </div>
                           