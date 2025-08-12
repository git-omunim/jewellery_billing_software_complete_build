<?php
/*
 * **************************************************************************************
 * @tutorial: File of Side Menu featutrs
 * **************************************************************************************
 *
 * Created on 26 Dec, 2017 09:34:08 AM
 *
 * @FileName: sideMenu_universe.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: omunim
 * @version 1.0.1
 * @Copyright (c) 2017 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2012 SoftwareGen, Inc
 *
 * @ModificaionHistory
 *  MODIFICATION DATE:
 *  AUTHOR:
 *  REASON:
 *
 */
?>

<!DOCTYPE html>
<html lang="en">
    <!-- begin::Head -->
    <head>
	<meta charset="utf-8"/>
        <meta name="description" content="Latest updates and statistic charts">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	
	<!-- begin::Web font -->
<!--	<script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
	<script>
            WebFont.load({
                google:{"families":["Poppins:300,400,500,600,700","Roboto:300,400,500,600,700"]},
                active: function(){
                        sessionStorage.fonts = true;
                }
            });
        </script>-->
	<!-- end::Web font -->
    </head>
    <!-- end::Head -->
    
    <body class="m-page--fluid m--skin- m-content--skin-light2 m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-light m-aside-left--fixed m-aside-left--offcanvas m-aside-left--minimize m-brand--minimize m-footer--push m-aside--offcanvas-default">
        <!-- begin:: Page -->
	<div class="m-grid m-grid--hor m-grid--root m-page">
            <div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop">
                <!-- BEGIN: Left Aside -->
                <button class="m-aside-left-close  m-aside-left-close--skin-light " id="m_aside_left_close_btn">
                    <i class="la la-close"></i>
                </button>
                <div id="m_aside_left" class="m-grid__item m-aside-left  m-aside-left--skin-light ">
                    <!-- BEGIN: Aside Menu -->
                    <div id="m_ver_menu" class="m-aside-menu  m-aside-menu--skin-light m-aside-menu--submenu-skin-light " data-menu-vertical="true" data-menu-scrollable="true" data-menu-dropdown-timeout="500">
                        <ul class="m-menu__nav  m-menu__nav--dropdown-submenu-arrow ">
                            <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  data-menu-submenu-toggle="hover" data-redirect="true">
                                <a  href="#" class="m-menu__link m-menu__toggle"
                                    onclick="navigation_universe('omAddCustomer');">
                                    <i class="m-menu__link-icon icon-home"></i>
                                    <!--<img alt="" src="assets_universe/demo/demo6/media/img/logo/stock32.png"/>-->
                                    <span class="m-menu__link-text" style="width: 100px !important;">Home</span>
                                </a>
                                <div class="m-menu__submenu">
                                    <span class="m-menu__arrow"></span>
                                    <ul class="m-menu__subnav">
                                        <li class="m-menu__item  m-menu__item--parent" aria-haspopup="true"  data-redirect="true">
                                            <a  href="#" class="m-menu__link"
                                                onclick="navigation_universe('omAddCustomer');">
                                                <span class="m-menu__link-text">Home</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  data-menu-submenu-toggle="hover">
                                <a  href="#" class="m-menu__link m-menu__toggle">
                                    <i class="m-menu__link-icon flaticon-layers"></i>
                                    <!--<img alt="" src="assets_universe/demo/demo6/media/img/logo/addGold32.png"/>-->
                                    <span class="m-menu__link-text" style="width: 100px !important;">Add Stock</span>
                                    <i class="m-menu__ver-arrow la la-angle-right"></i>
                                </a>
                                <div class="m-menu__submenu">
                                    <span class="m-menu__arrow"></span>
                                    <ul class="m-menu__subnav">
                                        <li class="m-menu__item  m-menu__item--parent" aria-haspopup="true" >
                                            <a  href="#" class="m-menu__link ">
                                                <span class="m-menu__link-text">Add Stock</span>
                                            </a>
                                        </li>
                                        <li class="m-menu__item" aria-haspopup="true" data-redirect="true">
                                            <a  href="#" class="m-menu__link"
                                                onclick="navigation_universe('addStock');">
                                                <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                                    <span></span>
                                                </i>
                                                <span class="m-menu__link-text">Add Stock</span>
                                            </a>
                                        </li>
                                        <li class="m-menu__item" aria-haspopup="true" data-redirect="true">
                                            <a  href="#" class="m-menu__link"
                                                onclick="navigation_universe('omAddImitationStock');">
                                                <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                                    <span></span>
                                                </i>
                                                <span class="m-menu__link-text">Add Imitation Stock</span>
                                            </a>
                                        </li>
                                        <li class="m-menu__item " aria-haspopup="true"  data-redirect="true">
                                            <a  href="#" class="m-menu__link">
                                                <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                                    <span></span>
                                                </i>
                                                <span class="m-menu__link-text">Add Mobile Stock</span>
                                            </a>
                                        </li>
                                        <li class="m-menu__item " aria-haspopup="true"  data-redirect="true">
                                            <a  href="#" class="m-menu__link ">
                                                <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                                    <span></span>
                                                </i>
                                                <span class="m-menu__link-text">Add Medical Stock</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  data-menu-submenu-toggle="hover" data-redirect="true">
                                <a  href="#" class="m-menu__link m-menu__toggle">
                                    <i class="m-menu__link-icon flaticon-suitcase"></i>
                                    <!--<img alt="" src="assets_universe/demo/demo6/media/img/logo/stock32.png"/>-->
                                    <span class="m-menu__link-text" style="width: 100px !important;">Stock Panel</span>
                                    <i class="m-menu__ver-arrow la la-angle-right"></i>
                                </a>
                                <div class="m-menu__submenu">
                                    <span class="m-menu__arrow"></span>
                                    <ul class="m-menu__subnav">
                                        <li class="m-menu__item  m-menu__item--parent" aria-haspopup="true"  data-redirect="true">
                                            <a  href="#" class="m-menu__link ">
                                                <span class="m-menu__link-text">Stock Panel</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  data-menu-submenu-toggle="hover" data-redirect="true">
                                <a  href="#" class="m-menu__link m-menu__toggle"
                                    onclick="navigation_universe('omSell_Purchase');">
                                    <i class="m-menu__link-icon flaticon-graphic-1"></i>
                                    <span class="m-menu__link-text" style="width: 100px !important;">Sell/Purchase Item</span>
                                    <i class="m-menu__ver-arrow la la-angle-right"></i>
                                </a>
                                <div class="m-menu__submenu">
                                    <span class="m-menu__arrow"></span>
                                    <ul class="m-menu__subnav">
                                        <li class="m-menu__item  m-menu__item--parent" aria-haspopup="true"  data-redirect="true">
                                            <a  href="#" class="m-menu__link ">
                                                <span class="m-menu__link-title">
                                                    <span class="m-menu__link-wrap">
                                                        <span class="m-menu__link-text">Sell/Purchase Item</span>
                                                    </span>
                                                </span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  data-menu-submenu-toggle="hover" data-redirect="true">
                                <a  href="#" class="m-menu__link m-menu__toggle">
                                    <i class="m-menu__link-icon flaticon-light"></i>
                                    <!--<img alt="" src="assets_universe/demo/demo6/media/img/logo/newOrder32.png"/>-->
                                    <span class="m-menu__link-text" style="width: 100px !important;">New Order Panel</span>
                                    <i class="m-menu__ver-arrow la la-angle-right"></i>
                                </a>
                                <div class="m-menu__submenu">
                                    <span class="m-menu__arrow"></span>
                                    <ul class="m-menu__subnav">
                                        <li class="m-menu__item  m-menu__item--parent" aria-haspopup="true"  data-redirect="true">
                                            <a  href="#" class="m-menu__link ">
                                                <span class="m-menu__link-text">New Order Panel</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  data-menu-submenu-toggle="hover" data-redirect="true">
                                <a  href="inner.html" class="m-menu__link m-menu__toggle">
                                    <i class="m-menu__link-icon flaticon-share"></i>
                                    <!--<img alt="" src="assets_universe/demo/demo6/media/img/logo/repair32.png"/>-->
                                    <span class="m-menu__link-text" style="width: 100px !important;">Repair/Fix Items</span>
                                    <i class="m-menu__ver-arrow la la-angle-right"></i>
                                </a>
                                <div class="m-menu__submenu">
                                    <span class="m-menu__arrow"></span>
                                    <ul class="m-menu__subnav">
                                        <li class="m-menu__item  m-menu__item--parent" aria-haspopup="true"  data-redirect="true">
                                            <a  href="#" class="m-menu__link ">
                                                <span class="m-menu__link-text">Repair/Fix Items</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  data-menu-submenu-toggle="hover" data-redirect="true">
                                <a  href="#" class="m-menu__link m-menu__toggle">
                                    <i class="m-menu__link-icon flaticon-graphic"></i>
                                    <!--<img alt="" src="assets_universe/demo/demo6/media/img/logo/tag32.png"/>-->
                                    <span class="m-menu__link-text" style="width: 100px !important;">BarCode Tag Print Panel</span>
                                    <i class="m-menu__ver-arrow la la-angle-right"></i>
                                </a>
                                <div class="m-menu__submenu">
                                    <span class="m-menu__arrow"></span>
                                    <ul class="m-menu__subnav">
                                        <li class="m-menu__item  m-menu__item--parent" aria-haspopup="true"  data-redirect="true">
                                            <a  href="#" class="m-menu__link ">
                                                <span class="m-menu__link-text">BarCode Tag Print Panel</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  data-menu-submenu-toggle="hover" data-redirect="true">
                                <a  href="#" class="m-menu__link m-menu__toggle">
                                    <i class="m-menu__link-icon flaticon-pie-chart"></i>
                                    <!--<img alt="" src="assets_universe/demo/demo6/media/img/logo/girvi32.png"/>-->
                                    <span class="m-menu__link-text" style="width: 100px !important;">Girvi Panel</span>
                                    <i class="m-menu__ver-arrow la la-angle-right"></i>
                                </a>
                                <div class="m-menu__submenu">
                                    <span class="m-menu__arrow"></span>
                                    <ul class="m-menu__subnav">
                                        <li class="m-menu__item  m-menu__item--parent" aria-haspopup="true"  data-redirect="true">
                                            <a  href="#" class="m-menu__link ">
                                                <span class="m-menu__link-text">Girvi Panel</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  data-menu-submenu-toggle="hover" data-redirect="true">
                                <a  href="#" class="m-menu__link m-menu__toggle">
                                    <i class="m-menu__link-icon flaticon-clipboard"></i>
                                    <!--<img alt="" src="assets_universe/demo/demo6/media/img/logo/udhaar32.png"/>-->
                                    <span class="m-menu__link-text" style="width: 100px !important;">Udhaar Panel</span>
                                    <i class="m-menu__ver-arrow la la-angle-right"></i>
                                </a>
                                <div class="m-menu__submenu">
                                    <span class="m-menu__arrow"></span>
                                    <ul class="m-menu__subnav">
                                        <li class="m-menu__item  m-menu__item--parent" aria-haspopup="true"  data-redirect="true">
                                            <a  href="#" class="m-menu__link ">
                                                <span class="m-menu__link-text">Udhaar Panel</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  data-menu-submenu-toggle="hover" data-redirect="true">
                                <a  href="#" class="m-menu__link m-menu__toggle">
                                    <i class="m-menu__link-icon flaticon-technology"></i>
                                    <!--<img alt="" src="assets_universe/demo/demo6/media/img/logo/transactions32.png"/>-->
                                    <span class="m-menu__link-text" style="width: 100px !important;">Daily Transactions Panel</span>
                                    <i class="m-menu__ver-arrow la la-angle-right"></i>
                                </a>
                                <div class="m-menu__submenu">
                                    <span class="m-menu__arrow"></span>
                                    <ul class="m-menu__subnav">
                                        <li class="m-menu__item  m-menu__item--parent" aria-haspopup="true"  data-redirect="true">
                                            <a  href="#" class="m-menu__link ">
                                                <span class="m-menu__link-text">Daily Transactions Panel</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  data-menu-submenu-toggle="hover" data-redirect="true">
                                <a  href="#" class="m-menu__link m-menu__toggle">
                                    <i class="m-menu__link-icon flaticon-user"></i>
                                    <!--<img alt="" src="assets_universe/demo/demo6/media/img/logo/maleUser32.png"/>-->
                                    <span class="m-menu__link-text" style="width: 100px !important;">User List Panel</span>
                                    <i class="m-menu__ver-arrow la la-angle-right"></i>
                                </a>
                                <div class="m-menu__submenu">
                                    <span class="m-menu__arrow"></span>
                                    <ul class="m-menu__subnav">
                                        <li class="m-menu__item  m-menu__item--parent" aria-haspopup="true"  data-redirect="true">
                                            <a  href="inner.html" class="m-menu__link ">
                                                <span class="m-menu__link-text">User List Panel</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  data-menu-submenu-toggle="hover" data-redirect="true">
                                <a  href="#" class="m-menu__link m-menu__toggle">
                                    <i class="m-menu__link-icon flaticon-user-add"></i>
                                    <!--<img alt="" src="assets_universe/demo/demo6/media/img/logo/adduser32.png"/>-->
                                    <span class="m-menu__link-text" style="width: 100px !important;">Add New User Panel</span>
                                    <i class="m-menu__ver-arrow la la-angle-right"></i>
                                </a>
                                <div class="m-menu__submenu">
                                    <span class="m-menu__arrow"></span>
                                    <ul class="m-menu__subnav">
                                        <li class="m-menu__item  m-menu__item--parent" aria-haspopup="true"  data-redirect="true">
                                            <a  href="#" class="m-menu__link ">
                                                <span class="m-menu__link-text">Add New User Panel</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  data-menu-submenu-toggle="hover" data-redirect="true">
                                <a  href="#" class="m-menu__link m-menu__toggle">
                                    <i class="m-menu__link-icon flaticon-pie-chart"></i>
                                    <!--<img alt="" src="assets_universe/demo/demo6/media/img/logo/search32.png"/>-->
                                    <span class="m-menu__link-text" style="width: 100px !important;">Customer/Girvi Search Panel</span>
                                    <i class="m-menu__ver-arrow la la-angle-right"></i>
                                </a>
                                <div class="m-menu__submenu">
                                    <span class="m-menu__arrow"></span>
                                    <ul class="m-menu__subnav">
                                        <li class="m-menu__item  m-menu__item--parent" aria-haspopup="true"  data-redirect="true">
                                            <a  href="#" class="m-menu__link ">
                                                <span class="m-menu__link-text">Customer/Girvi Search Panel</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  data-menu-submenu-toggle="hover" data-redirect="true">
                                <a  href="#" class="m-menu__link m-menu__toggle">
                                    <i class="m-menu__link-icon flaticon-users"></i>
                                    <!--<img alt="" src="assets_universe/demo/demo6/media/img/logo/analysis32.png"/>-->
                                    <span class="m-menu__link-text" style="width: 100px !important;">Analysis Panel</span>
                                    <i class="m-menu__ver-arrow la la-angle-right"></i>
                                </a>
                                <div class="m-menu__submenu">
                                    <span class="m-menu__arrow"></span>
                                    <ul class="m-menu__subnav">
                                        <li class="m-menu__item  m-menu__item--parent" aria-haspopup="true"  data-redirect="true">
                                            <a  href="#" class="m-menu__link ">
                                                <span class="m-menu__link-text">Analysis Panel</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  data-menu-submenu-toggle="hover" data-redirect="true">
                                <a  href="#" class="m-menu__link m-menu__toggle">
                                    <i class="m-menu__link-icon flaticon-symbol"></i>
                                    <!--<img alt="" src="assets_universe/demo/demo6/media/img/logo/calculator24.png"/>-->
                                    <span class="m-menu__link-text" style="width: 100px !important;">Girvi Calculator Panel</span>
                                    <i class="m-menu__ver-arrow la la-angle-right"></i>
                                </a>
                                <div class="m-menu__submenu">
                                    <span class="m-menu__arrow"></span>
                                    <ul class="m-menu__subnav">
                                        <li class="m-menu__item  m-menu__item--parent" aria-haspopup="true"  data-redirect="true">
                                            <a  href="#" class="m-menu__link ">
                                                <span class="m-menu__link-text">Girvi Calculator Panel</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <!-- END: Aside Menu -->
                </div>
                <!-- END: Left Aside -->
            </div>
        </div>
    </body>
</html>