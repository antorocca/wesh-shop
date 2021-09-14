<?php
    class Crud{  

        
        private static $email ;
        private static $role;

        public static function update(){ 

            require_once 'functionDatabase.php';

            $bdd = Database::connect();

            $email = $_GET['email'];

            
            $user = $bdd->prepare('SELECT * FROM user WHERE email = ?');
            $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $user->execute([$email]);

            $userDetails = $user->fetch();

            if(isset($_POST['submitModif'])){
                $modifEmail = htmlspecialchars($_POST['updateEmail']);
                $modifRole = $_POST['updateRole'];
                $updateName = htmlspecialchars($_POST['updateName']);
                $updateFirstName = htmlspecialchars($_POST['updateFirstname']);
                $updateAddress = htmlspecialchars($_POST['updateAddress']);
                $updateCity = htmlspecialchars($_POST['updateCity']);

    
                    if(empty($modifEmail)){
    
                        $modifEmail = $userDetails[1];
                    }
                    if(empty($updateName)){
                            
                        $updateName = $userDetails[2];
                    }
                    if(empty($updateFirstName)){
                                
                        $updateFirstName = $userDetails[3];
                    }               
                    if(empty($updateAddress)){
                                    
                        $updateAddress = $userDetails[5];
                    }
                    if(empty($updateCity)){
                                        
                        $updateCity = $userDetails[6];
                    }
                    if(empty($modifRole)){
                                            
                        $modifRole = $userDetails[7];
                    }
                $update = $bdd->prepare('UPDATE user SET email = ?, name = ?, firstname = ?, address = ?, ville = ?, role = ? WHERE email= ?');
                $update->execute([$modifEmail, $updateName, $updateFirstName, $updateAddress, $updateCity,$modifRole, $email]);
                header('Location: admin.php');

            }
        }














        public static function delete(){

            require_once 'functionDatabase.php';

            $bdd = Database::connect();
            $email = $_GET['email'];

            if(isset($_POST['deleteInput'])){
                $delete = $bdd-> prepare('DELETE FROM user WHERE email = ?');
                $delete-> execute([$email]);
                header("Location: admin.php");
            }
        }

        public static function ban(){

            require_once 'functionDatabase.php';

            $bdd = Database::connect();
            $email = $_GET['email'];
            $role = $_GET['role'];

            if(isset($_POST['banInput'])){

                if($role == 'ban'){
                    $insertBan = $bdd->prepare('UPDATE user SET role = ? WHERE email= ?');
                    $insertBan->execute(['user', $email]);
                    header('Location: admin.php');

                }
                else{
                    $insertBan = $bdd->prepare('UPDATE user SET role = ? WHERE email= ?');
                    $insertBan->execute(['ban', $email]);
                    header('Location: admin.php');
                }
            }
        }

    }