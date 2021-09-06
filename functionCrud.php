<?php
    class Crud{  

        
        private static $email ;
        private static $role;

        public static function update(){ 

            require_once 'functionDatabase.php';

            $bdd = Database::connect();
            $email = $_GET['email'];
            $role = $_GET['role'];

            if(isset($_POST['submitModif'])){

                $modifEmail = htmlspecialchars($_POST['modifEmail']);
                $modifRole = $_POST['modifRole'];

                if(empty($modifEmail)) {
                    $modifEmail = $email;
                    $update = $bdd->prepare('UPDATE user SET email = ?, role = ? WHERE email= ?');
                    $update-> execute([$modifEmail, $modifRole, $email]);
                    header('Location: admin.php');
                }
                else {
                    $update = $bdd->prepare('UPDATE user SET email = ?, role = ? WHERE email= ?');
                    $update->execute([$modifEmail, $modifRole, $email]);
                    header('Location: admin.php');
                }
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