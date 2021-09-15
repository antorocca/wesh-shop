<?php
    class Crud{  

        
        private static $email ;
        private static $role;
        public static $erreur = '';

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

        public static function create(){

            require_once 'functionDatabase.php';

            $bdd = Database::connect();

            if(isset($_POST['submitCreate'])){

            $email = htmlspecialchars($_POST['createEmail']);
            $name = htmlspecialchars($_POST['createName']);
            $firstname = htmlspecialchars($_POST['createFirstname']);
            $address = htmlspecialchars($_POST['createAddress']);
            $city = htmlspecialchars($_POST['createCity']);
            $mdp = htmlspecialchars($_POST['createMdp']);
            $mdp2 = htmlspecialchars($_POST['createMdp2']);
            
    
            if(!empty($email) && !empty($mdp) && !empty($mdp2)){
                
                if(filter_var($email, FILTER_VALIDATE_EMAIL)){
    
                    if($mdp===$mdp2){
                        
                        $select = $bdd->prepare("SELECT * FROM user WHERE email=?");
                        $select->execute([$email]);
    
                        $count = $select->rowcount();
    
                        if($count === 0){
    
                            $mdphash = password_hash($mdp, PASSWORD_DEFAULT);
    
                            $insert = $bdd->prepare('INSERT INTO user(email, name, firstname, mdp, address, ville, role) VALUES(?, ?, ?, ?, ?, ?, ?)');
                            $insert-> execute([$email, $name, $firstname, $mdphash, $address, $city, 'user']);

                            header('Location: admin.php');
                            }
    
                        }
                        else{
                            static::$erreur = '*Vous etes déjà enregistré veuillez vous connecter !';
                        }
                    }
                    else{
                       static::$erreur="*Les mots de passes ne sont pas identique !";
                    }
                }
                else{
                    static::$erreur="*Veuillez entrer un email valide !";
                }
            }
            else{
                static::$erreur= "*Veuillez remplir les champs !";
            }
        }   
    }