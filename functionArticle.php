<?php
    class Article{
        
        private static $name;
        private static $description;
        private static $file;
        private static $price;
        private static $stock;
        private static $brand;
        private static $type;
        private static $promo;
        public static $addError = '';
        public static $addSuccess = '';

        public static function addArticle(){

            require_once 'functionDatabase.php';
            $bdd = Database::connect();

            $name = htmlspecialchars($_POST['addName']);
            $description = htmlspecialchars($_POST['addDescription']);
            $file = $_FILES['addFile'];
            $price = htmlspecialchars($_POST['addPrize']);
            $stock = htmlspecialchars($_POST['addStock']);
            $brand = htmlspecialchars($_POST['addBrand']);
            $cat = htmlspecialchars($_POST['addCat']);
            $promo = htmlspecialchars($_POST['promo']);
                
            if(isset ($_POST['addArticleSubmit'])){

                if(!empty($name) && !empty($description) && !empty($price) && !empty($stock) && !empty($cat)){
                    
                    if(isset($file) && $file['error'] == 0) {

                        if ($file['size'] <= 1000000){

                            $fileInfo = pathinfo($file['name']);
                            $extension_upload = $fileInfo['extension'];
                            $extensions_autorized = array('jpg','jpeg','png','svg', 'webp');
                            $fileName = date('j-m-Y_H.i.s') . '_' . $name . "." . $extension_upload;
                
                            if(in_array($extension_upload, $extensions_autorized))
                            {
                              move_uploaded_file($_FILES['addFile']['tmp_name'], 'assets/uploads/' . $fileName);

                              $addArticle = $bdd->prepare('INSERT INTO article(nom, description, photo, prix, idPromo, stock, marque, idCat) VALUES(?,?,?,?,?,?,?,?)');
                              $addArticle-> execute([$name, $description, $fileName, $price, $promo, $stock, $brand, $cat]);

                              static::$addSuccess = '<p class="addSuccess">L\'article a bien ??t?? ajout?? au magasin</p>';
                            
                            }
                            else{
                                static::$addError = '<p class="addError">*Le format d\'image n\'est pas accept?? </p>
                                                    <p class="addError">Format accept??: jpg, jpeg, png, svg.</p>';
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