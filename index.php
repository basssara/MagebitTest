<?php 

require 'db.php';

 ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Mega</title>
</head>
<body>
    <div class="container" id="container">
        <div class="form-container sign-up-container">
            <form method="POST" action="/">
                <h1>Sign Up</h1>
                
                <input type="name" name="name" placeholder="Name" value="<?php echo @$data['name'];?>">
                <input type="email" name="email" placeholder="Email" value="<?php echo @$data['email'];?>">
                <input type="password" name="password" placeholder="Password" value="<?php echo @$data['password'];?>">
                <input type="password" name="password_2" placeholder="Password" value="<?php echo @$data['password_2'];?>">
                <?php 
                    $data = $_POST;
                    if(isset($data['do_signup'])) {
                        //Registration
                    
                        $errors = array();
                    
                        if(trim($data['name']) == '') {
                            $errors[] = 'Enter Name!';
                        }
                    
                        if(trim($data['email']) == '') {
                            $errors[] = 'Enter Email!';
                        }
                    
                        if($data['password'] == '') {
                            $errors[] = 'Enter Password';
                        }
                    
                        if($data['password_2'] != $data['password']) {
                            $errors[] = 'The repeated password was entered incorrectly';
                        }
                    
                        if(R::count('users', "name = ?", array($data['name'])) > 0) {
                            $errors[] = 'This name already exists';
                        }
                    
                        if(R::count('users', "email = ?", array($data['email'])) > 0) {
                            $errors[] = 'This email already exists';
                        }
                    
                        if(empty($errors)) {
                            $user = R::dispense('users');
                            $user->name = $data['name'];
                            $user->email = $data['email'];
                            $user->password = password_hash($data['password'], PASSWORD_DEFAULT);
                            R::store($user);
                            echo '<div style="color: green; margin-top: 20px">You successfully registered</div><hr>';
                        } else {
                            echo '<div style="color: red; margin-top: 20px">'.array_shift($errors).'</div><hr>';
                        }
                    }
                ?>
                <button type="submit" name="do_signup">SignUp</button>
            </form>
        </div>

        <div class="form-container sign-in-container">
            <form method="POST" action="signin.php">
                <h1>Sign In</h1>
                
                <input type="name" name="name" placeholder="Name">
                <input type="password" name="password" placeholder="Password">
                    <?php /*
                    $data = $_POST;

                    if(isset($data['do_signin'])) {
                        $errors = array();
                        $user = R::findOne('users', 'name = ?', array($data['name']));
                    
                        if($user) {
                            //exist
                    
                            if(password_verify($data['password'], $user->password)) {
                                //everything ok
                                $_SESSION['logged_user'] = $user;
                                echo '<div style="color: green;">You are logged in!<br/>
                                    Сan go to the <a href="/">home</a> page</div><hr>';
                                    echo 'Authorized <hr>';
                                    echo $_SESSION['logged_user']->name;
                                    echo '<a href="/logout.php">Logout</a>';
                            } else {
                                $errors[] = 'Password is incorrect';
                                    echo $_SESSION['logged_user']->name;
                                    //echo '<a href="/logout.php">Go back</a>';  
                            }
                        } else {
                            $errors[] = 'User with this login was not found!';
                               // echo '<a href="/logout.php">Go back</a>';   
                                echo $_SESSION['logged_user']->name;
                        }
                    
                        if(! empty($errors)) {
                            echo '<div style="color: red; margin-top: 25px">'.array_shift($errors).'</div><hr>';
                        }
                    }
                    */?>
                <button type="submit" name="do_signin">Sign In</button>
            </form>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1>Welcome Back!</h1>
                    <p>To keep connected with us please login with your personal info bla bla bla</p>
                    <button class="ghost" id="signIn">Sign In</button>
                </div>
                
                <div class="overlay-panel overlay-right">
                    <h1>Hello, Friend</h1>
                    <p>Enter smthblalblawwewe lorem</p>
                    <button name="do_signup" class="ghost" id="signUp">Sign Up</button>
                </div>
            </div>

        </div>
    </div>
    <script type="text/javascript">
        const signUpButton = document.getElementById('signUp');
        const signInButton = document.getElementById('signIn');
        const container = document.getElementById('container');

        signUpButton.addEventListener('click', () => {
            container.classList.add("right-panel-active");
        });
        
        signInButton.addEventListener('click', () => {
            container.classList.remove("right-panel-active");
        });
    </script>
</body>
</html>