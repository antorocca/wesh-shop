<?php
    class Article{
        
        private static $name;
        private static $description;
        private static $file;
        private static $prize;
        private static $stock;
        private static $brand;
        private static $type;
        public static $addError = '';
        public static $addSuccess = '';

        public static function addArticle(){

            require_once 'functionDatabase.php';
            $bdd = Database::connect();

            $name = htmlspecialchars($_POST['addName']);
            $description = htmlspecialchars($_POST['addDescription']);
            $file = $_FILES['addFile'];
            $prize = htmlspecialchars($_POST['addPrize']);
            $stock = htmlspecialchars($_POST['addStock']);
            $brand = htmlspecialchars($_POST['addBrand']);
            $type = htmlspecialchars($_POST['addType']);

            if(isset ($_POST['addArticleSubmit'])){

                if(!empty($name) && !empty($description) && !empty($prize) && !empty($stock) && !empty($type)){
                    
                    if(isset($file) && $file['error'] == 0) {

                        if ($file['size'] <= 1000000){

                            $fileInfo = pathinfo($file['name']);
                            $extension_upload = $fileInfo['extension'];
                            $extensions_autorized = array('jpg','jpeg','png','svg');
                            $fileName = date('j-m-Y_H.i.s') . '_' . $name;
                            
                            if(in_array($extension_upload, $extensions_autorized))
                            {
                              move_uploaded_file($_FILES['addFile']['tmp_name'], 'assets/uploads/' . $fileName . '.' . $fileInfo['extension']);

                              $addArticle = $bdd->prepare('INSERT INTO article(nom,description, photo, prix, stock, marque, type) VALUES(?,?,?,?,?,?,?)');
                              $addArticle-> execute([$name,$description,$file,$prize,$stock,$brand,$type]);

                              $addSuccess = '<p class="addSuccess">L\'article a bien été rajouté au magasin</p>';
                            }
                            else{
                                static::$addError = '<p class="addError">*Le format d\'image n\'est pas accepté </p>
                                                    <p class="addError">Format accepté: jpg, jpeg, png, svg.</p>';
                            }
                        }
                    }

                }
                else {
                    static::$addError = '<p class="addError">*Veuillez remplir les champs requis.</p>';
                }
            }
        }


    }



?>