<!DOCTYPE html>
<!--[if IE 9 ]><html class="ie ie9 no-js" lang="en"><![endif]-->
<!--[if gt IE 9 | !IE]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=0" />
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Maximum Tech</title>
    <meta name="description" content="Trabalhamos com soluções tecnológicas em sistemas para o seu negócio. 
        Desenvolvemos soluções em sistemas para seu pequeno negócio e atendendo com qualidade as expectativas dos clientes.">
    <meta name="keywords" content="desenvolvimento web, sistemas, sistema, layout responsive, ágil, metodologia, software, site,
        gerenciador de conteúdo, fortaleza ce, python, php, tecnologia, tech, maximum, projeto, internet, programar, computador,
        computadores, landing page, home page, web page, sistema web, sistemas web">
    <meta name="author" content="maximumtech">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="copyright" content="Maximum Tech" />
    <meta name="robots" content="index, follow">

    <meta property="og:image" content="http://www.maximumtech.com.br/assets/img/foto_comp_facebook.jpg" />
    <meta property="og:title" content="Maximum Tech" />
    <meta property="og:description" content="Trabalhamos com soluções tecnológicas em sistemas para o seu negócio." />

    <meta http-equiv="content-language" content="pt-br">
    <link rel="apple-touch-icon" href="assets/img/apple-touch-icon.png">
    <link rel="icon" href="assets/img/favicon.ico">
    <link rel='stylesheet' href='assets/css/bootstrap.min.css'>
    <link rel='stylesheet' href='assets/css/vendor.css'>
    <link rel='stylesheet' href='assets/css/theme_dark.css'>
    <link rel='stylesheet' href='assets/css/custom.css'>
    <!--[if lte IE 9]><!-->
    <script src='assets/js/vendor/html5shiv.min.js'></script>
    <!--<![endif]-->
</head>
<body>

<div class="site">
    <div class="site-loader _multi-circle-line">
        <div class="site-loader-spinner"></div>
    </div> <!-- .site-loader -->

    <div class="site-bg">
        <div class="site-bg-img"></div>
        <div class="site-bg-video">
            <video id="bgVideo" autoplay="" loop="">
                <source src="assets/video/video.mp4" type="video/mp4">
            </video>
        </div>
        <div class="site-bg-overlay"></div>
        <div class="site-bg-effect layer" data-depth=".30"></div> <!-- parallax data, try edit to other number :) -->
        <canvas class="site-bg-canvas layer" data-depth=".30"></canvas> <!-- parallax data, try edit to other number :) -->
        <div class="site-bg-border"></div>
    </div> <!-- .site-bg -->

    <div class="site-canvas">
        <header class="site-header">
            <div class="container">
                <div class="site-header-header">
                    <div class="site-header-brand" data-section="#home">
                        <a href="#" data-hover="Home">
                            <img class="site-header-logo-invert" src="assets/img/site-header-logo-maximum-tech.png" alt="">
                        </a>
                    </div>
                    <a class="primary-nav-toggle" href="#">
                        <i class="fa fa-navicon"></i>
                    </a>
                </div>
                <div class="site-header-main">
                    <nav class="primary-nav">
                        <div class="primary-menu-container">
                            <ul class="primary-menu">
                                <li class="primary-menu-item is-active" data-section="#home">
                                    <a href="#" data-hover="Home"><span>Home</span></a> <!-- set `data-hover` same as the link text -->
                                </li> <!-- add `is-active` class for the main section, set `data-section` to be the section id -->
                                <li class="primary-menu-item" data-section="#about">
                                    <a href="#" data-hover="Quem somos"><span>Quem somos</span></a>
                                </li>
                                <li class="primary-menu-item" data-section="#service">
                                    <a href="#" data-hover="Serviços"><span>Serviços</span></a>
                                </li>
                                <li class="primary-menu-item" data-section="#contact">
                                    <a href="#" data-hover="Contatos"><span>Contatos</span></a>
                                </li>
                                <li class="primary-menu-item" data-section="#social">
                                    <a href="#"><i class="fa fa-share-alt"></i></a>
                                </li>
                                <li class="primary-menu-item audio-toggle">
                                    <a href="#"><i class="fa fa-volume-up"></i></a>
                                </li> <!-- .audio-toggle -->
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </header> <!-- .site-header -->
        <main class="site-main">
            <div id="nav" class="section">
                <div class="section-table">
                    <div class="section-table-cell">
                        <div class="container">
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="col-inner">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- for `> md` screen, control with `#nav` id -->

            <div id="social" class="section">
                <div class="section-table">
                    <div class="section-table-cell">
                        <div class="container">
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="col-inner">
                                        <div class="social-menu-container">
                                            <ul class="social-menu">
                                                <li class="social-item">
                                                    <div data-href="https://www.maximumtech.com.br" data-layout="button" data-size="small" data-mobile-iframe="true">
                                                        <a class="fb-xfbml-parse-ignore" target="_blank"
                                                           href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fwww.maximumtech.com.br%2F&amp;src=sdkpreparse">
                                                            <i class="fa fa-facebook-square"></i>
                                                            <span>Facebook</span>
                                                        </a>
                                                    </div> <!-- social link -->
                                                </li>
                                                <li class="social-item">
                                                    <a target="_blank" href="https://twitter.com/share" data-url="http://www.maximumtech.com.br"
                                                       data-text="Quer um Sistema? Visite a Maximum Tech!" data-hashtags="maximumtech">
                                                        <i class="fa fa-twitter-square"></i>
                                                        <span>Twitter</span>
                                                    </a>
                                                </li>
                                                <li class="social-item esconder-pc">
                                                    <a href="whatsapp://send?text=Acesse nosso site: http://www.maximumtech.com.br">
                                                        <i class="fa fa-whatsapp"></i>
                                                        <span>Whatsapp</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- #social -->

            <div id="home" class="section is-active">
                <div class="section-table">
                    <div class="section-table-cell">
                        <div class="container">
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="col-inner">
                                        <div id="countdown_dashboard" class="countdown">
                                            <div class="dash-secondary">
                                                <div class="dash hours_dash">
                                                    <div class="top" style="display: block; font-size: 48px; ">
                                                        Bem Vindo a Máxima Tecnologia
                                                    </div>
                                                </div>
                                            </div>
                                        </div> <!-- .countdown -->
                                        <p>
                                            Trabalhamos com soluções tecnológicas em sites e sistemas web. Visualise em Serviços ou entre em contato para mais informações.
                                            <br>
                                            Se inscreva abaixo para receber nossas novidades e outras informações.
                                        </p>
                                        <form id="subscribeForm">
                                            <div class="subscribe-wrap">
                                                <a id="subscribeBtn" class="btn btn-default btn-subscribe">
                                                    <i class="fa fa-bell-o animated infinite swing"></i> <!-- bell animation class `animated infinite swing` -->
                                                    <span>Fique por Dentro</span>
                                                </a>
                                                <input id="subscribeEmail" class="form-control" type="email" name="email" placeholder="Seu Endereço de Email">
                                                <button id="subscribeSubmit" class="btn" type="submit"><i class="fa fa-envelope-o"></i></button>
                                            </div>
                                            <div class="form-notify"></div>
                                        </form> <!-- #subscribeForm -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="about" class="section">
                <div class="section-table">
                    <div class="section-table-cell">
                        <div class="container">
                            <div class="row">
                                <div class="col-xs-6 tela-full-mobile">
                                    <div class="col-xs-12">
                                        <div class="col-inner">
                                            <div class="section-heading">
                                                <h2 class="section-title">Quem somos?</h2>
                                                <p class="section-subtitle">Sistemas • Sites • Gerenciadores de Conteúdo</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">&nbsp;</div>
                                    <div class="col-md-12">
                                        <div class="col-inner">
                                            <div class="iconbox _left">
                                                <div class="iconbox-icon">
                                                    <i class="icon-strategy"></i>
                                                </div>
                                                <div class="iconbox-heading">
                                                    <h4>Nossa Estratégia</h4>
                                                </div>
                                                <div class="iconbox-content">
                                                    <p>Desenvolver soluções em sistemas para seu pequeno negócio e atendendo com qualidade as expectativas dos clientes.</p>
                                                </div>
                                            </div> <!-- .iconbox -->

                                            <div class="iconbox _left">
                                                <div class="iconbox-icon">
                                                    <i class="icon-tools"></i>
                                                </div>
                                                <div class="iconbox-heading">
                                                    <h4>Missão e Meta</h4>
                                                </div>
                                                <div class="iconbox-content">
                                                    <p>Conquistar nossos clientes com inovação e agilidade, são os preceitos que alicerçam o nosso trabalho.</p>
                                                </div>
                                            </div> <!-- .iconbox -->
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-6 esconder-mobile">
                                    <div class="col-md-12">&nbsp;</div>
                                    <div class="col-md-12 div-content-center">
                                        <video width="500" muted autoplay loop >
                                            <source src="assets/video/primeiro-video-marketing-maximum-tech.mp4" type="video/mp4">
                                        </video>
                                    </div>
                                    <div class="col-md-12">&nbsp;</div>
                                    <div class="col-md-12 div-content-center">
                                        <a class="btn btn-default hidden-xs hidden-sm" href="#" data-section="#service">
                                            <span>Nossos Serviços</span>
                                        </a> <!-- button link to section, edit the `data-section` to be section id -->
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="service" class="section">
                <div class="section-table">
                    <div class="section-table-cell">
                        <div class="container">
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="col-inner">
                                        <div class="section-heading">
                                            <h2 class="section-title">O que fazemos?</h2>
                                            <p class="section-subtitle">Sistemas • Sites • Gerenciadores de Conteúdo</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                    <div class="col-inner">
                                        <div id="serviceCarousel" class="owl-carousel">
                                            <div class="service-carousel-item iconbox _center">
                                                <div class="iconbox-icon">
                                                    <i class="icon-beaker"></i>
                                                </div>
                                                <div class="iconbox-heading">
                                                    <h4>Fábrica de Software</h4>
                                                </div>
                                                <div class="iconbox-content">
                                                    <p>Especializados em desenvolvimento e implementação de novos sistemas para seu negócio.</p>
                                                </div>
                                            </div> <!-- .iconbox -->

                                            <div class="service-carousel-item iconbox _center">
                                                <div class="iconbox-icon">
                                                    <i class="icon-mobile"></i>
                                                </div>
                                                <div class="iconbox-heading">
                                                    <h4>Layout Responsive</h4>
                                                </div>
                                                <div class="iconbox-content">
                                                    <p>Layout com design que se adapta a qualquer formato e em todos os dispositivos.</p>
                                                </div>
                                            </div> <!-- .iconbox -->

                                            <div class="service-carousel-item iconbox _center">
                                                <div class="iconbox-icon">
                                                    <i class="icon-gears"></i>
                                                </div>
                                                <div class="iconbox-heading">
                                                    <h4>Metodologia Ágil</h4>
                                                </div>
                                                <div class="iconbox-content">
                                                    <p>Processo de desenvolvimento ágil e eficaz com entregas contínuas e protótipos direcionados.</p>
                                                </div>
                                            </div> <!-- .iconbox -->

                                            <div class="service-carousel-item iconbox _center">
                                                <div class="iconbox-icon">
                                                    <i class="icon-chat"></i>
                                                </div>
                                                <div class="iconbox-heading">
                                                    <h4>Feedback Contínuo</h4>
                                                </div>
                                                <div class="iconbox-content">
                                                    <p>Garantia de um sistema de qualidade nos prazos determinados, em constante comunicação com o cliente.</p>
                                                </div>
                                            </div> <!-- .iconbox -->

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- #service -->

            <div id="contact" class="section">
                <div class="section-table">
                    <div class="section-table-cell">
                        <div class="container">
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="col-inner">
                                        <div class="section-heading">
                                            <h2 class="section-title">Entre em Contato</h2>
                                            <p class="section-subtitle">Sistemas • Sites • Gerenciadores de Conteúdo</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-md-5 m-t-30-sm-max">
                                    <div class="col-inner">
                                        <div class="iconbox _left">
                                            <div class="iconbox-icon">
                                                <i class="icon-tablet"></i>
                                            </div>
                                            <div class="iconbox-heading">
                                                <h4>Telefone</h4>
                                            </div>
                                            <div class="iconbox-content">
                                                <p>
                                                    (85) 9 8725-7171
                                                </p>
                                            </div>
                                        </div> <!-- .iconbox -->

                                        <div class="iconbox _left">
                                            <div class="iconbox-icon">
                                                <i class="icon-pencil"></i>
                                            </div>
                                            <div class="iconbox-heading">
                                                <h4>Email</h4>
                                            </div>
                                            <div class="iconbox-content">
                                                <p>
                                                    contato@maximumtech.com.br
                                                </p>
                                            </div>
                                        </div> <!-- .iconbox -->

                                        <div class="iconbox _left">
                                            <div class="iconbox-icon">
                                                <i class="icon-map-pin"></i>
                                            </div>
                                            <div class="iconbox-heading">
                                                <h4>Endereço</h4>
                                            </div>
                                            <div class="iconbox-content">
                                                <p>
                                                    Fortaleza - Ceará
                                                </p>
                                            </div>
                                        </div> <!-- .iconbox -->

                                    </div>
                                </div>
                                <div class="col-xs-12 col-md-6 col-lg-5 col-md-offset-1 col-lg-offset-2">
                                    <div class="col-inner">
                                        <form class="_outline" id="contactForm" novalidate="novalidate">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group required">
                                                        <label class="form-label" for="contactName">Seu Nome</label>
                                                        <input class="form-control" id="contactName" type="text" name="name">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group required">
                                                        <label class="form-label" for="contactEmail">Email</label>
                                                        <input class="form-control" id="contactEmail" type="text" name="email">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group required">
                                                <label class="form-label" for="contactMessage">Mensagem</label>
                                                <textarea class="form-control" id="contactMessage" rows="4" name="message"></textarea>
                                            </div>
                                            <div class="btn-wrap">
                                                <button type="submit" class="btn btn-default btn-block">Enviar Mensagem</button>
                                            </div>
                                            <div class="form-notify">Drop us a line to say hello :)</div>
                                        </form> <!-- contactForm -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main> <!-- .site-main -->
    </div>
</div>
<!--Compartilhar do Facebook-->
<div id="fb-root"></div>
<script>(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v2.10";
    fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<script>!function(d,s,id){
    var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';
    if(!d.getElementById(id)){js=d.createElement(s);
        js.id=id;js.src=p+'://platform.twitter.com/widgets.js';
        fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');
</script>

<script src="assets/js/vendor/jquery-1.11.3.min.js"></script>
<script src='assets/js/vendor/bootstrap.min.js'></script>
<script src='assets/js/vendor/plugin.js'></script>
<script src='assets/js/variable.js'></script>
<script src='assets/js/main.js'></script>

<!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-109039390-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-109039390-1');
</script>

</body>
</html>
