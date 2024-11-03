<?php
session_start();
if(!isset($_SESSION['u']))
{
	header("location: login.php");
}
require_once('exo13.inc.php');
# controle du droit d'accès
# récupération de la liste des clients
$sql='  select *from utilisateur ';
$statment=$db->query($sql);
$utilisateurs = $statment->fetchall(PDO::FETCH_ASSOC);
$nbClients=$statment->rowcount();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AirMorocco</title>
    <link rel="stylesheet" href="../css/index.css">
</head>
<body>
    
    <header>
        <div class="logo">
            <a href="index.html"> <span>BRIGHT</span>LIFE</a>
        </div>
        <ul class="menu">
            <li><a href="#">Acceuil</a></li>
            <li><a href="#a-propos">à propos</a></li>
            <li><a href="#contact">contact</a></li>
        </ul>
        <a href="chat.html" class="btn-reservation">CHAT NOW</a>

        <div class="responsive-menu"></div>
    </header>
    <!-- acceuil section -->
    <section id="home">
        <h2>HELLO THERE</h2>
        <h1>You're never alone,we're here to lend an ear whenever you need.</h1>
        <p></p>
        <p>CONTACT US</p>
        <a href="chat.html" class="btn-reservation home-btn">Start Chat</a>
    </section>

    <!-- A propos section -->
    <section id="a-propos">
        <h1 class="title">à propos</h1>
        <div class="img-desc">
           <div class="left">
              <img src="../images/PHO3.jpeg" alt="">
           </div>
            <div class="right">
                <h3>Explore our site and get instant support with our live chat feature. Connect with us anytime for quick answers and assistance</h3>
                <p>Welcome to our site! Dive into a world of convenience and exploration with our user-friendly platform. From browsing products to finding expert advice, our site offers seamless navigation and instant assistance with our live chat feature. Whether you're a seasoned shopper or just starting your journey, we're here to make your experience smooth and enjoyable. Start exploring now and let us guide you every step of the way  .</p>
                <a href="#">Lire Plus</a>
            </div>
        </div>
        
    </section>
    <!--  contact section -->
    <section id="contact">
        <h1 class="title">Contact</h1>
        <h1></h1>
        <form action="">
            <div class="left-right">
                <div class="left">
                    <label>Nom complet</label>
                    <input type="text">
                    <label>Email</label>
                    <input type="Email" placeholder=".....@gmail.com">
                    <label>NUMERO</label>
                    <input type="number" placeholder="+">
                    <label>Message</label>
                    <textarea name="" id="" cols="30" rows="10" placeholder="Please let us know if you encounter any issues or have any complaints by filling out the form below."></textarea>
                </div>
                <div class="right">
                    <label>Adresse</label>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d12511047.208804163!2d-98.56426326977552!3d33.88708932239433!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zOcKwMTMnMDMuOSJTIDEwOMKwMzEnMDYuNCJX!5e0!3m2!1sen!2sus!4v1647323314895!5m2!1sen!2sus" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>


                </div>
            </div>
            <button>Envoyer</button>
        </form>
    </section>

    <footer>
        <p> Réalisé par <span>AYMAN&BADR</span> | Tous les droits sont réservés.</p>
    </footer>


    <script>
        var toggle_menu = document.querySelector('.responsive-menu');
        var menu = document.querySelector('.menu');
        toggle_menu.onclick= function(){
             toggle_menu.classList.toggle('active');
             menu.classList.toggle('responsive')
        }
    </script>


</body>
</html>