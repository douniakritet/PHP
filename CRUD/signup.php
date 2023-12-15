<?php session_start();?>
<?php include('navbar.html'); ?>
<?php include('config.php');?>
<?php
                                     if(isset($_POST['register'])){
                                        //assign variables to post values
                                        $fname = $_POST['fname'];
                                        $lname = $_POST['lname'];
                                        $email = $_POST['email'];
                                        $password = $_POST['password'];
                                        $confirm = $_POST['confirmpassword'];
                                        $phone = $_POST['phone'];
                                        $gender = $_POST['gender'];
                                        
                                        if($password != $confirm){
                                            $_SESSION['error'] = 'Passwords did not match';
                                            echo "
                                            <div class='alert alert-danger text-center'>
                                                <i class='fas fa-exclamation-triangle'></i> ".$_SESSION['error']."
                                            </div>
                                        ";
                                        }else{
                                            $stmt = $pdo->prepare('SELECT * FROM users WHERE email = :email');
                                            $stmt->execute(['email' => $email]);
              
                        if($stmt->rowCount() > 0){
                            //return the values to the user
                            $_SESSION['email'] = $email;
                            $_SESSION['password'] = $password;
                            $_SESSION['confirmpassword'] = $confirm;
              
                            //display error
                            $_SESSION['error'] = 'Email already taken';
                            echo "
                            <div class='alert alert-danger text-center'>
                                <i class='fas fa-check-circle'></i> ".$_SESSION['error']."
                            </div>
                        ";
                            
                        }
                        else{
                            //encrypt password using password_hash()
                            $password = password_hash($password, PASSWORD_DEFAULT);
              
                            //insert new user to our database
                            $stmt = $pdo->prepare('INSERT INTO users (fname, lname, email, password, confirmpassword, phone, gender) VALUES (:fname, :lname, :email, :password, :confirmpassword, :phone, :gender)');
              
                            try{
                                $stmt->execute(['fname' => $fname, 'lname' => $lname, 'email' => $email, 'password' => $password, 'confirmpassword' => $confirm, 'phone' => $phone,'gender' => $gender]);
              
                                $_SESSION['success'] = 'User verified. You can <a href="signin.php">login</a> now';
                                echo "
                                <div class='alert alert-success text-center'>
                                    <i class='fas fa-check-circle'></i> ".$_SESSION['success']."
                                </div>
                            ";
                            }
                            catch(PDOException $e){
                                $_SESSION['error'] = $e->getMessage();
                            }
              
                        }
              
                    }
              
                }
                else{
                    $_SESSION['error'] = 'Fill up registration form first';
                }
              
                
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
                       
                       <h5>Avez-vous déja un compte?</h5><a href="signin.php"><input type="submit" name="login" value="Login"/><br/></a>
                       
                    </div>
                  
                    <div class="col-md-9 register-right">
                      
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <h3 class="register-heading">Rejoignez des milliers d'inscrits</h3>
                                <div class="row register-form">
                                   
                                    <div class="col-md-6">
                                        <form action="" method="POST">
                                        <div class="form-group">
                                            <input type="text" name="fname" class="form-control" placeholder="First Name *" value="<?php echo (isset($_SESSION['fname'])) ? $_SESSION['fname'] : ''; unset($_SESSION['fname']); ?>" required/>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="lname" class="form-control" placeholder="Last Name *" value="<?php echo (isset($_SESSION['lname'])) ? $_SESSION['lname'] : ''; unset($_SESSION['lname']); ?>" required/>
                                        </div>
                                        <div class="form-group">
                                            <input type="email" name="email" class="form-control" placeholder="Your Email *" value="<?php echo (isset($_SESSION['email'])) ? $_SESSION['email'] : ''; unset($_SESSION['email']);?>" required/>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control" placeholder="Password *" value="<?php echo (isset($_SESSION['password'])) ? $_SESSION['password'] : ''; unset($_SESSION['password']);?>" required/>
                                        </div> </div> 
                                          <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="password" name="confirmpassword" class="form-control" placeholder="confirmPassword *" value="<?php echo (isset($_SESSION['confirmpassword'])) ? $_SESSION['confirmpassword'] : ''; unset($_SESSION['confirmpassword']);?>" required/>
                                        </div> 
                                      
                                       <div class="form-group">
                                      
                                        <div class="form-group">
                                            <input type="text" name="phone" minlength="10" maxlength="10" name="txtEmpPhone" class="form-control" placeholder="Your Phone *" value="<?php echo (isset($_SESSION['phone'])) ? $_SESSION['phone'] : ''; unset($_SESSION['phone']);?>"required/>
                                        </div></div>
                                         
                                       
                                            <div class="maxl">
                                                <label class="radio inline"> 
                                                    <input type="radio" name="gender" value="male" checked>
                                                    <span> Male </span> 
                                                </label>
                                                <label class="radio inline"> 
                                                    <input type="radio" name="gender" value="female">
                                                    <span>Female </span> 
                                                </label>
                                            </div>
                                        </div>
                                   
                                    
                                        
                                        
                                        <input type="submit" name="register" class="btnRegister"  value="Register"/>
                                     </form>
                                    </div>
                                </div>
                            </div>
                    