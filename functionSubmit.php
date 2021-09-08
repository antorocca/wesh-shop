<?php
    class Submit{

    public static $erreur = '';
    public static $success = '';
    public static $erreurCo = '';
    public static $successCo = '';
    public static $ban = ''; 

    public static function submitRegister(){
        
        $bdd = Database::connect();
        
        if(isset($_POST['submit'])){
            $email = htmlspecialchars($_POST['email']);
            $mdp = htmlspecialchars($_POST['mdp']);
            $mdp2 = htmlspecialchars($_POST['mdp2']);
            
    
            if(!empty($email) && !empty($mdp) && !empty($mdp2)){
                
                if(filter_var($email, FILTER_VALIDATE_EMAIL)){
    
                    if($mdp===$mdp2){
                        
                        $select = $bdd->prepare("SELECT * FROM user WHERE email=?");
                        $select->execute([$email]);
    
                        $count = $select->rowcount();
    
                        if($count === 0){
    
                            $mdphash = password_hash($mdp, PASSWORD_DEFAULT);
    
                            $insert = $bdd->prepare('INSERT INTO user(email, mdp, role) VALUES(?,?, ?)');
                            $insert-> execute([$email, $mdphash, 'user']);
    
                            static::$success='Bienvenue dans Wesh la boutique fraîche';
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

    public static function submitConnexion(){

        $bdd = Database::connect();

        if(isset($_POST['submitConnexion'])){
            $email = $_POST['email'];
            $mdp = $_POST['mdp'];
            
            if(!empty($email) && !empty($mdp)){
                
                if(filter_var($email, FILTER_VALIDATE_EMAIL)){
                    
        
                    /*$select = $bdd->prepare('SELECT * FROM banni WHERE email = ? ');
                    $select-> execute([$email]);
        
                    $result = $select->fetch();
                    if($result !== false){
        
                        $ban='Vous avez été banni.';
                    }
                    else{*/
                    $select = $bdd->prepare('SELECT * FROM user WHERE email = ? ');
                    $select-> execute([$email]);
        
                    $result = $select->fetch();

                
                
                    if($result !== false){
        
                        $mdpBdd = $result[3];
                        $role = $result['role'];
                        
                        if($role !== 'ban'){

                            if( password_verify($mdp, $mdpBdd)){
            
                                $_SESSION['email'] = $result[1];//1 = email dans bdd
                                $_SESSION['role'] = $result[6];
                                $_SESSION['pseudo'] = $result[2];

                                if($role == 'admin') {
                                    header('Location: admin.php');
                                } 
                                else{
            
                                    header('Location: index.php');
                                }
                            }
                            else{
                                static::$erreurCo = 'Le mot de passe est invalide';
                            }
                        }
                        else{
                            static::$ban = 'Vous avez été banni.';
                        }
                    }
                    else{
                        static::$erreurCo = '*L\'email n\'est pas reconnu';
                    }                    
                }
                else{
                    static::$erreurCo='*Veuillez entrez un email valide';
                }
            }
            else{
                static::$erreurCo = '*Veuillez remplir les champs';
            }
        }
    }
}
?>