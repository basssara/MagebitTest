<?php
require "db.php";
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
                                    //echo $_SESSION['logged_user']->name;
                                    echo '<a href="/logout.php">Go back</a>';  
                            }
                        } else {
                            $errors[] = 'User with this login was not found!';
                                echo '<a href="/logout.php">Go back</a>';   
                                //echo $_SESSION['logged_user']->name;
                        }
                    
                        if(! empty($errors)) {
                            echo '<div style="color: red; margin-top: 25px">'.array_shift($errors).'</div><hr>';
                        }
                    }
                    ?>