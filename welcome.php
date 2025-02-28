<?php 

session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <script src="https://cdn.jsdelivr.net/gh/cferdinandi/smooth-scroll/dist/smooth-scroll.polyfills.min.js"></script>
    <title>Home</title>
</head>
<body>
    <section id="header">
        <div class="container">
            <img src="img/puma.png" class="logo">
            <div class="header-text">
                <h1><?php echo "<h1>Bienvenido " . $_SESSION['username'] . "</h1>"; ?></h1>
                <span class="square"></span>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi quia mollitia ex, laboriosam minus optio aut beatae neque est harum!</p>
                <a href="inicio/index.php"><button class="common-btn">Cerrar Sesion</button></a>
                    <div class="line">
                        <span class="line-1"></span><br>
                        <span class="line-2"></span><br>
                        <span class="line-3"></span>
                    </div>
            </div>
        </div>
    </section>

    <nav id="sideNav">
        <ul>
            <li><a href="#header">Home</a></li>
            <li><a href="#about">About us</a></li>
            <li><a href="#features">Features</a></li>
            <li><a href="#courses">Courses</a></li>
            <li><a href="#offer">Offer</a></li>
            <li><a href="#contact">Contact us</a></li>
            <li><a href="seccion/pinturas.php">Pinturas</a></li>
            <li><a href="seccion/dibujo.php">Dibujo</a></li>
            <li><a href="seccion/fotografia.php">Fotografia</a></li>
        </ul>
    </nav>
    <img src="img/menu-alt-right-regular-24.png" id="menuBtn">

    <!--about-->

    <section id="about">
        <div class="about-left-col">
            <img src="img/about.png" alt="">
        </div>
        <div class="about-right-col">
            <div class="about-text">
                <h1>about us</h1>
                <span class="square"></span>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                    Quasi illum repudiandae placeat corporis earum! 
                    Et aspernatur reprehenderit doloribus quos ipsam obcaecati qui nulla voluptatibus in laudantium molestiae, 
                    impedit magnam sint?</p><br>
                    <div class="line">
                        <span class="line-1"></span><br>
                        <span class="line-2"></span><br>
                        <span class="line-3"></span>
                    </div>

                    <h2>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit, earum.</h2>
                    <h3>--Suarez</h3>
            </div>
        </div>
    </section>

    <!--Features-->

    <section id="features">
        <div class="feature-row">
            <div class="feature-col">
                <img src="img/compras.png">
                <h4>Compras en linea</h4>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quo, temporibus.</p>
            </div>
            <div class="feature-col">
                <img src="img/dinero.png">
                <h4>Dinero Seguro</h4>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quo, temporibus.</p>
            </div>
            <div class="feature-col">
                <img src="img/seguro.png">
                <h4>Seguridad Total</h4>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quo, temporibus.</p>
            </div>
        </div>
        <div class="feature-btn">
            <div class="line">
                <span class="line-1"></span><br>
                <span class="line-2"></span><br>
                <span class="line-3"></span>
            </div>
            <a href="#contact"><button class="common-btn">Contactanos</button></a>
        </div>
    </section>

    <!--courses-->

    <section id="courses">
        <div class="container course-row">
            <div class="course-left-col">
                <div class="course-text">
                    <h1>Browse our top <br>courses</h1>
                    <span class="square"></span>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                        Placeat reprehenderit quod corporis explicabo fuga hic, 
                        ex officiis iusto nulla aperiam, pariatur, 
                        quae minus facere nesciunt.</p>
                        <button class="common-btn">View all courses</button>
                        <div class="line">
                            <span class="line-1"></span><br>
                            <span class="line-2"></span><br>
                            <span class="line-3"></span>
                        </div>
                </div>
            </div>
            <div class="course-right-col">
                <img src="img/Security_Isometric.svg">
            </div>
        </div>
    </section>

    <!--Offer-->

    <section id="offer">
        <div class="about-left-col">
            <img src="img/Ethereum_Flatline.svg" alt="">
        </div>
        <div class="about-right-col">
            <div class="about-text">
                <h1>Limitless learning, <br> limitless posibilities</h1>
                <span class="square"></span>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                    Quasi illum repudiandae placeat corporis earum! 
                    Et aspernatur reprehenderit doloribus quos ipsam obcaecati qui nulla voluptatibus in laudantium molestiae, 
                    impedit magnam sint?</p> 
                    <button class="common-btn">Start Free Trial</button> 
                    <div class="line">
                        <span class="line-1"></span><br>
                        <span class="line-2"></span><br>
                        <span class="line-3"></span>
                    </div>
            </div>
        </div>
    </section>

    <!--Contact us-->

    <section id="contact">
        <div class="container contact-row">
            <div class="contact-left-col">
                <h1>sign up to join our <br> learning community</h1>
                <form>
                    <input type="text" placeholder="enter name">
                    <input type="email" placeholder="Enter email"
                    <input type="password" placeholder="Enter password">
                    <div class="btn-box">
                        <button class="common-btn">sign up</button>
                         <button class="common-btn">Start Free Trial</button>
                    </div>
                </form>
                <div class="line">
                    <span class="line-1"></span><br>
                    <span class="line-2"></span><br>
                    <span class="line-3"></span>
                </div>
            </div>
            <div class="contact-right-col">
                <img src="img/5138237.jpg" alt="">
            </div>
        </div>
    </section>

<!---Footer--->

    <section id="footer">
        <div class="container footer-row">
            <hr>
            <div class="footer-left-col">
                <div class="footer-links">
                    <div class="link-title">
                        <h4>producto</h4>
                        <small>our plan</small><br>
                        <small>Free Trial</small>
                    </div>
                    <div class="link-title">
                        <h4>Sobre nosotros</h4>
                        <small>Request Demo</small><br>
                        <small>FAQs</small>
                    </div>
                    <div class="link-title">
                        <h4>soporte</h4>
                        <small>Features</small><br>
                        <small>Contact us</small>
                    </div>
                    <div class="link-title">
                        <h4>Explorar</h4>
                        <small>Find a nonprofit</small><br>
                        <small>Coporate Solution</small>
                    </div>
                </div>
            </div>
            <div class="footer-right-col">
                <div class="footer-info">
                    <div class="copyright-text">
                       <small>Soporte@gmail.com</small><br>
                       <small>Copyright 2022 SZ</small> 
                    </div>
                    <div class="footer-logo">
                        <img src="img/puma.png">
                        <a href="#header"><button class="common-btn">Home</button></a
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--social-icons-->

    <div class="social-icons">
        <a href=""><img src="img/facebook.png"></a>
        <a href=""><img src="img/instagram.png"></a>
        <a href=""><img src="img/twitter.png"></a>
        <a href=""><img src="img/linkedin.png"></a>
    </div>

    <script>
        var menuBtn = document.getElementById("menuBtn");
        var sideNav = document.getElementById("sideNav");

        sideNav.style.right = "-250px";
        menuBtn.onclick = function(){
            if(sideNav.style.right == "-250px"){
                sideNav.style.right = "0";
            }
            else{
                sideNav.style.right = "-250px";
            }
        }

        var scroll = new SmoothScroll('a[href*="#"]',{
            speed:1000,
            speedAsDuration: true
        
    });

    </script>
    

    
</body>
</html>
