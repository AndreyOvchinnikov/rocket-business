<?php require_once "./pager.php"; ?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/fonts.css">
    <link rel="stylesheet" href="css/styles.css">

    <script
            src="https://code.jquery.com/jquery-3.5.1.min.js"
            integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
            crossorigin="anonymous"></script>
    <script src="js/main.js" type="application/javascript"></script>

    <title>Rocket test</title>
</head>
<body>
<div class="wrapper">

    <header class="header">

        <!-- top_menu start -->
        <nav class="top_menu">
            <ul>
                <li><a href="#">О компании</a></li>
                <li><a href="#">Доставка</a></li>
                <li><a href="#">Оплата</a></li>
                <li><a href="#">Сервис</a></li>
                <li><a href="#">Возврат</a></li>
                <li><a href="#">Статьи</a></li>
                <li><a href="#">Контакты</a></li>
            </ul>
        </nav>
        <!-- top_menu end -->

        <!-- header_main start -->
        <div class="header_main">
            <a href="#" class="header_main_item logo"></a>

            <form class="header_main_item search" method="post" action="#">
                <input class="search_text" type="text" placeholder="Поиск по товарам">
                <input class="search_submit" type="submit" value="">
            </form>

            <div class="header_main_item info">
                <span class="info_phone">8 (800) 707-99-24</span><br>
                <span class="info_shedule">9.00 - 20.00 ежедневно</span>
            </div>

            <div class="header_main_item cart">
                <a href="#" class="item_cart cart_stat empty"><span>0</span></a>
                <a href="#" class="item_cart cart_likes"><span>6</span></a>
                <a href="#" class="item_cart cart_count"><span>17</span></a>
            </div>
            <div class="header_main_item menuToggle"><span></span></div>
        </div>
        <!-- header_main end -->

        <!--categories_menu start-->
        <nav class="categories_menu clearfix">
            <ul>
                <li><a href="#">Продукция</a></li>
                <li><a href="#">Стабилизаторы 220В</a></li>
                <li><a href="#">Стабилизаторы 380В</a></li>
                <li><a href="#">Генераторы 220В</a></li>
                <li><a href="#">Генераторы 380В</a></li>
                <li><a href="#">ИБП и батареи</a></li>
                <li><a href="#">Прочая техника</a></li>
                <li><a href="#">Услуги</a></li>
                <li class="active"><a href="#">Акции</a></li>
            </ul>
        </nav>
        <!--categories_menu end-->
    </header>

    <!-- content start -->
    <div class="content">

        <!-- content_breadcrumbs start-->
        <div class="content_breadcrumbs">
            <a href="#">Главная</a><span class="breadcrumbs_arrow">→</span>
            <a href="#">Статьи</a>
        </div>
        <!-- content_breadcrumbs end-->


        <!-- content_page start-->
        <div class="content_page">
            <h1 class="page_title">Полезная информация</h1>
            <? if($show_pager):?>
            <div class="page_pager">
               <? echo $pager_content?>
            </div>
            <? endif;?>
        </div>
        <!-- content_page end-->


        <!-- content_products start-->
        <? if(!empty($products)):?>
        <div class="content_products clearfix">
            <? foreach ($products as $product): ?>
            <a class="products_item clearfix">
                <img class="item_img" src="<?= $product['image'] ?>"/>
                <div class="item_text_wrapper">
                    <div class="item_name"><?= $product['title'] ?>
                    </div>
                    <div class="item_description"><?= $product['description'] ?>
                    </div>
                </div>
            </a>
            <? endforeach; ?>
        </div>
        <? else: ?>
            <p>В данный момент раздел пуст...</p>
        <? endif;?>
        <!-- content_products end-->

        <? if($show_pager):?>
        <div class="page_pager bottom">
            <? echo $pager_content?>
        </div>
        <?endif;?>
    </div>
    <!-- content_page end-->
</div>

<footer class="footer clearfix">
    <div class="wrapper">
        <div class="footer_item footer_contacts">
            <span class="contacts_address">121471, Москва ул. Рябиновая 55 стр. 28</span><br>
            <span class="contacts_mail">prestizh06@mail.ru</span><br>
            <span class="contacts_phone">8(800) 707-99-24</span><br>
            <span class="contacts_link"><a href="#">контакты</a> </span>
        </div>

        <div class="footer_item footer_shedule">
            <span class="shedule_item">
                Режим работы:<br>
                Пн-чт с 8.00 до 19.00<br>
                Пт с 8.00 до 17.00<br>
                Сб с 10.00 до 15.00<br>
                Вс (по предварительной договоренности).
            </span>
        </div>

        <div class="footer_item footer_nav ">

            <ul class="nav_menu clearfix">
                <li><a href="#">О компании</a></li>
                <li><a href="#">Оплата</a></li>
                <li><a href="#">Акции</a></li>
                <li><a href="#">Сервис</a></li>
                <li><a href="#">Доставка</a></li>
                <li><a href="#">Возврат</a></li>
            </ul>

            <div class="content_politcs">
                <a href="#">Политика обработки персональных данных</a>
            </div>
        </div>

        <div class="footer_item footer_developer">
            <a href="#"><img class="footer_logo" src="./images/footer_logo.png" alt=""><br>
                <span>Разработка<br> и продвижение сайта</span></a>
        </div>
    </div>
</footer>
</body>
</html>