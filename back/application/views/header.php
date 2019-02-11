<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Департамент международного сотрудничества</title>

    <link rel="shortcut icon" href="<?=WEB_SERVER?>/images/logo.png" type="image/png">
    <link rel="stylesheet" href="<?=WEB_SERVER?>/css/bootstrap.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css"
          integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link href="<?=WEB_SERVER?>/css/jquery.fancybox.css" rel="stylesheet">
    <link rel="stylesheet" href="<?=WEB_SERVER?>/css/style.css">
    <script src="<?=WEB_SERVER?>/js/bootstrap.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
            crossorigin="anonymous"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/11.1.1/classic/ckeditor.js"></script>
</head>
<body>
<main>
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="brand d-sm-none d-lg-block">
                    <h1 class="brand_name">Департамент&nbsp;Международного Сотрудничества</h1>
                    <!--p class="brand_slogan"></p-->
                </div>
            </div>
            <div class="col-lg-3 text-center">

            </div>
            <div class="col-lg-5 logo-info">
                <a href="callto:#" class="fad-phone"><i class="fas fa-phone-volume"></i> 8 (495)-748-82-81</a>
                <p class="date_work"><i class="far fa-clock"></i> Время работы офиса: пн-пт с 10.00 до 19.00</p>
            </div>
        </div>
    </div>
</main>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <div class="navbar-brand" href="#"><img src="<?=WEB_SERVER?>/images/logo.png" width="30" height="30"
                                                class="d-inline-block align-top"
                                                alt="Департамент международного сотрудничества"></div>
        <div class="d-none d-sm-block d-lg-none brand_slogann">Департамент международного сотрудничества</div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="nav navbar-nav text-nowrap flex-row mx-md-auto order-1 order-md-2">
                <li class="nav-item <?php if($this->uri->segment(2)=="index"){echo "active";}?>">
                    <a class="nav-link" href="<?=WEB_SERVER?>/main/index">Главная&nbsp;<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item <?php if($this->uri->segment(2)=="activitys"){echo "active";}?>">
                    <a class="nav-link" href="<?=WEB_SERVER?>/main/activitys">Мероприятия&nbsp;</a>
                </li>
                <li class="nav-item <?php if($this->uri->segment(2)=="gallery"){echo "active";}?>">
                    <a class="nav-link" href="<?=WEB_SERVER?>/main/gallery">Фотогалерея&nbsp;</a>
                </li>
                <li class="nav-item <?php if($this->uri->segment(2)=="contacts"){echo "active";}?>">
                    <a class="nav-link" href="<?=WEB_SERVER?>/main/contacts">Контакты&nbsp;</a>
                </li>
                <li class="nav-item <?php if($this->uri->segment(2)=="abouth"){echo "active";}?>">
                    <a class="nav-link" href="<?=WEB_SERVER?>/main/abouth">О нас</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
