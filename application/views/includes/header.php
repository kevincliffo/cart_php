<!DOCTYPE html>
<html>
    <head>
        <title>Online Shop</title>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/bootstrap.css'?>">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/style.css'?>">
    </head>
    <body>
        <div class="container"><br/>
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <?php
                    $obj = array('class' => 'navbar-brand');
                    echo anchor('', 'OnlineShop',$obj);
                ?>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="#">Grocery</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="#">Health and Beauty</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="#">Home and Office</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="#">Fashion</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="#">Electronics</a>
                        </li>
                    </ul>
                    <form class="form-inline my-2 my-lg-0">
                        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                    </form>
                </div>
            </nav> 