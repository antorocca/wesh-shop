<?php
    session_start();
    require_once 'functionDatabase.php';



    include('include/head&header.php');
?>

<main>
    <section class="infSubSell">
        <h2>Les differents abonnements</h2>
        <article>
            <h3>Abo 1</h3>
            <p>Nombre de références différentes par magasin: <span>5</span></p>
            <p>Nombre de vente par mois: <span>25</p>
            <p>Nombre de comptes liés au magasin: <span>1</p>
            <p>Accés au statistiques du magasin: <i class="fas fa-times"></i></p>
            <p>Frais de vente: <span>20%</p>
            <p>Frais de transaction: <span>5%</p>
            <p>Prix: <span>15.99 €</span></p>
            <a href="">S'inscrire</a>
        </article>
        <article>
            <h3>Abo 2</h3>
            <p>Nombre de références différentes par magasin: <span>15</span></p>
            <p>Nombre de vente par mois: <span>75</span></p>
            <p>Nombre d'utilisateurs liés au magasin: <span>3</span></p>
            <p>Accés au statistiques du magasin: <span>Limité</span></p>
            <p>Frais de vente: <span>15%</span></p>
            <p>Frais de transaction: <span>4%</span></p>
            <p>Prix: <span>39.99 €</span></p>
            <a href="">S'inscrire</a>
        </article>
        <article>
            <h3>Abo 3</h3>
            <p>Nombre de références différentes par magasin: <span>35</span></p>
            <p>Nombre de vente par mois: <span>Illimité</span></p>
            <p>Nombre d'utilisateurs liés au magasin: <span>10</span></p>
            <p>Accés au statistiques du magasin: <i class="fas fa-check"></i></p>
            <p>Frais de vente: <span>10%</span></p>
            <p>Frais de transaction: <span>3%</span></p>
            <p>Prix: <span>120.99 €</span></p>
            <a href="">S'inscrire</a>
        </article>
    </section>
</main>


<?php include('include/footer.php'); ?>