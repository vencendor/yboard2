<?

use yii\helpers\Url;
use yii\widgets\Menu;
use yii\widgets\Breadcrumbs;


?><!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml"><!-- Head -->
    <head>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
            <script src="http://code.jquery.com/jquery-2.1.1.min.js"></script>
            <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
            <script src="<?php echo Url::base(); ?>/js/admin.js"></script>
            <meta charset="utf-8" >

                <title><?= $this->context->pageTitle ?></title>

                <meta name="description" content="Dashboard" />
                <meta name="viewport" content="width=device-width, initial-scale=1.0" />
                <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
                <link rel="shortcut icon" href="<?php echo Url::base(); ?>/img/favicon.png" type="image/x-icon" />

                <!-- blueprint CSS framework -->
                <link rel="stylesheet" type="text/css" href="<?php echo Url::base(); ?>/css/style.css" media="screen, projection" />
                <!--Basic Styles-->
                <link href="<?php echo Url::base(); ?>/css/bootstrap.css" rel="stylesheet" />
                <link id="bootstrap-rtl-link" href="" rel="stylesheet" />
                <link href="<?php echo Url::base(); ?>/css/font-awesome.css" rel="stylesheet" />
                <link href="<?php echo Url::base(); ?>/css/weather-icons.css" rel="stylesheet" />

                <!--Fonts-->
                <link href="<?php echo Url::base(); ?>/css/admin.css" rel="stylesheet" type="text/css" />

                <link  type="text/css" rel="stylesheet" href="<?php echo Url::base(); ?>/css/admin_theme.css" />
                <link href="<?php echo Url::base(); ?>/css/demo.css" rel="stylesheet" />
                <link href="<?php echo Url::base(); ?>/css/typicons.css" rel="stylesheet" />
                <link href="<?php echo Url::base(); ?>/css/animate.css" rel="stylesheet" />
                <link id="skin-link" href="" rel="stylesheet" type="text/css" />
                <script src="<?php echo Url::base(); ?>/js/yboard.js" ></script>

                <!--Skin Script: Place this script in head to load scripts for skins and rtl support-->


                <!--[if lt IE 8]>
                <link rel="stylesheet" type="text/css" href="<?php echo Yii::$app->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
                <![endif]-->



                <!--Skin Script: Place this script in head to load scripts for skins and rtl support-->

                <script>
                    $('.search-button').click(function(){
                        $('.search-form').toggle();
                        return false;
                    });
                    $('.search-form form').submit(function(){
                        $('#bulletin-grid').yiiGridView('update', {
                            data: $(this).serialize()
                        });
                        return false;
                    });
                </script>
                </head>
                <!-- /Head -->
                <!-- Body -->
                <body>
                    <!-- Navbar -->
                    <div class="navbar">
                        <div class="navbar-inner">
                            <div class="navbar-container">
                                <!-- Navbar Barnd -->
                                <div class="navbar-header pull-left">
                                    <a href="<?php echo Url::base(); ?>/admin/" class="navbar-brand">
                                        Yboard
                                    </a>
                                </div>
                                <!-- /Navbar Barnd -->

                                <!-- Sidebar Collapse -->
                                <div class="sidebar-collapse" id="sidebar-collapse">
                                    <i class="collapse-icon fa fa-bars"></i>
                                </div>
                                <!-- /Sidebar Collapse -->
                            </div>
                        </div>
                    </div>
                    <!-- /Navbar -->
                    <!-- Main Container -->
                    <div class="main-container container-fluid">
                        <!-- Page Container -->
                        <div class="page-container">
                            <!-- Page Sidebar -->
                            <div class="page-sidebar" id="sidebar">
                                <!-- Sidebar Menu -->
                                <?php
                                echo Menu::widget( array(
                                    'items' => array(
                                        array('label' => '<i class="menu-icon glyphicon glyphicon-home"></i>'
                                            . 'Основное меню<i class="menu-expand"></i>',
                                            'url' => '#',
                                            "items" => array(
                                                array('label' => '<i class="menu-icon glyphicon glyphicon-home"></i>'
                                                    . 'Главная страница',
                                                    'url' => array('/site/index')),
                                                array('label' => 'Добавить объявление',
                                                    'url' => array('/adverts/create')),
                                                array('label' => 'Правила работы',
                                                    'url' => array('/site/page', 'view' => 'about')),
                                                array('label' => 'Обратная связь',
                                                    'url' => array('/site/contact')),
                                                array('url' => Url::to("login/login"),
                                                    'label' => t("Login"),
                                                    'visible' => Yii::$app->user->isGuest),
                                                array('url' => Url::to("registration"),
                                                    'label' => t("Register"),
                                                    'visible' => Yii::$app->user->isGuest),
                                                array('url' => Url::to("registration"),
                                                    'label' => t("Profile"),
                                                    'visible' => !Yii::$app->user->isGuest),
                                                array('url' => Url::to("login/logout"),
                                                    'label' => t("Logout")
                                                    . ' (' . Yii::$app->user->identity->username . ')',
                                                    'visible' => !Yii::$app->user->isGuest),
                                            ),
                                            'linkOptions' => array('class' => 'menu-dropdown'),
                                        ),
                                        array('label' => "Панель администратора",
                                            'url' => array('adverts/index')),
                                        array('label' => t('Bulletin') . '<i class="menu-expand"></i>',
                                            'url' => "#",
                                            'items' => array(
                                                array('label' => "Управление",
                                                    'url' => array('adverts/index')),
                                                array('label' => "Добавить объявление",
                                                    'url' => array('adverts/create')),
                                            ),
                                            'linkOptions' => array('class' => 'menu-dropdown'),
                                        ),
                                        array('label' => 'Категории', 'url' => array('category/index')),
                                        array('label' => t("Pages"), 'url' => array('/cms/cms')),
                                        array('label' => "Баннерные блоки", 'url' => array('banners/index')),
                                        array('label' => "Почтовая рассылка", 'url' => array('delivery')),
                                        array('label' => "Настройки", 'url' => array('default/settings')),
                                        array('label' => "Помощь", 'url' => array('default/help')),
                                    ),
                                    'encodeLabels' => false,
                                    //'options' => array('class' => 'nav sidebar-menu'),

                                    // 'submenuHtmlOptions' => array('class' => 'submenu'),
                                        )
                                );
                                ?>

                                <!-- /Sidebar Menu -->
                            </div>
                            <!-- /Page Sidebar -->
                            <!-- Page Content -->
                            <div class="page-content">
                                <!-- Page Breadcrumb -->
                                <div class="page-breadcrumbs">
                                    <?
                                    /*
                                    if (!isset($this->breadcrumbs))
                                        echo Breadcrumbs::widget( array("Главная") );
                                    /**/
                                    echo Breadcrumbs::widget( array(
                                            /*
                                        'links' => $this->breadcrumbs,
                                        'homeLink' => '<li><i class="fa fa-home"></i><a href="/yboard/view/">Админка</a></li>',
                                        //'options' => array('class' => 'breadcrumb'),
                                        /*
                                        'inactiveLinkTemplate' => '<li><a href="{url}">{label}</a></li>',
                                        'activeLinkTemplate' => '<li><a href="{url}">{label}</a></li>',
                                        'tagName' => 'ul',
                                        'separator' => '',
                                        */
                                    ));
                                    ?><!-- breadcrumbs -->
                                </div>
                                <!-- /Page Breadcrumb -->
                                <!-- Page Body -->
                                <div class="page-header position-relative">
                                    <div class="header-title">
                                        <h1><?= $this->title ?></h1>
                                    </div>
                                </div>
                                <div class="page-body">
                                    <div id="sidebar">
                                        <?php

                                        echo Menu::widget( array(
                                            //'type' => 'list',
                                            'items' => $this->context->menu,
                                            //'options' => array('class' => 'operations'),
                                            // 'encodeLabel' => false,
                                        ));
                                        /**/

                                        ?>
                                    </div>
                                    <?= $content ?>
                                </div>
                                <!-- /Page Body -->
                            </div>
                            <!-- /Page Content -->
                        </div>
                        <!-- /Page Container -->
                        <!-- Main Container -->

                    </div>

                    <!--Basic Scripts-->


                </body><!--  /Body -->
                </html>