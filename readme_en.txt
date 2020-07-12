/*
Name: ZenCart On XOOPS - free edition
URL: http://www.s-page.net/products/74.html
Description: Online shop module for XOOPS. 
Version: 1.34 (base:zen-cart-v1.3.8a-full-fileset-12112007)
Author: hira
Author URL: http://www.s-page.net/
*/

--------------------------------
First Things First
--------------------------------
It is the module which can display Zen-Cart on XOOPS.
Zen-Cart(http://wwww.zen-cart.com/) is an open source application for online shop.
XOOPS(http://www.xoops.org/) is an open source application for community portal.

Zen-Cart was an standalone online shop construction system, 
but ZOX customized it for modules of XOOPS. 
Because You can realize community functions in XOOPS side in ZOX by a shop function, 
a flexible site-building is possible.

online demo(http://demo-zox.s-page.net/)

A version of Zen-Cart becoming the base:zen-cart-v1.3.8a-full-fileset-12112007

In addition, as for the free edition, a copyright and an advertisement are displayed by a footer part.
When you do not want to display them, you please order professional editon.
http://www.s-page.net/products/74.html
The shift of professional editon is very simple from a free edition.

--------------------------------
Installation
--------------------------------
1.Upload
    Upload a modules/zox directory to a modules directory of XOOPS.

2.Permission
    change access permission of a file and the directory as follows.
    zox
    |- admin
    |  |_ backup(777)
    |  |_ images
    |      |_ graphs(777)
    |- cache(777)
    |- media(777)
    |- pub(777)
    |- images(777)
    |   |_ (A directory to be included in)(777)
    |_ includes
      |- configure.php(444)
      |_ languages
         |_ english
           |_html_includes(777)
              |_(A directory to be included in)(666)

3.Install
    Please install it from the module of the XOOPS Admin Menu.
    [ZenCart On XOOPS] button linked to a Zen-Cart Admin Menu is 
    added to a manager menu of XOOPS as soon as installation is completed.

4.Setting of Zen-Cart
    It is necessary to set manager information and a shop name, e-mail address 
    in a Zen-Cart Admin Menu in ZOX. 
    Admin Username and the password are as follows.
    
         Admin Username: admin
         Admin Password: admin

    Firstly, by Tools::Admin Settings, Reset password of admin by all means.
    
    Next,Confirm the following next, and please change it.
    Configuration::My Store,
    Configuration::E-Mail Options,
    Configuration::Shipping/Packaging
    
5.Setting of XOOPS
    If setting of Zen-Cart is over, 
    let's set a block and group authority.

--------------------------------
About a block
--------------------------------

Using a block of XOOPS, You can display new product and right and 
left column of Zen-Cart in a top page and other modules.

ZOX has following 8 blocks.
  CSS/AJAX_none
  LeftColumn
  RightColumn
  SingleColumn
  Whats_new
  Specials
  Featured
  Upcoming


CSS/AJAX_none is ...
  It reads necessary style sheet and javascript to display other blocks. *1

LeftColumn、RightColumn、SingleColumn is ...
  It is for side blocks and displays the left column, 
  the right column of Zen-Cart, a single column each.
  You can set it about the indication contents in the following.
  
  Zen-Cart Admin Menu::Tools::Layout Boxes Controller


Whats_new、Specials、Featured、Upcoming is ...
  It is for center blocks and displays a new product, a special price product,
  a recommended product, a Upcoming product each.

When right and left column in the ZOX module is unnecessary, 
please refer to the following.
  
  Zen-Cart Admin Menu::Layout Settings::Column Left/Right Status -> 0

In addition, the block indexing uses jQuery. 
Can use jQuery in either two following methods.

a)Insert the following tag in the head part of the theme file.
  <script type="text/javascript" src="<{$xoops_url}>/modules/zox/jquery-1.3.2.js"></script>
  <link rel="stylesheet" type="text/css" media="screen" href="<{$xoops_url}>/modules/zox/blocks/zox_blocks.css" />

b)Display an [CSS/AJAX_none] block
  Please adjust an indication point so that it is displayed than main contents and other blocks by an HTML source by the top. 

--------------------------------
About SSL(https)
--------------------------------
Edit two following files, and please change false in true.
/includes/configure.php
  define('ENABLE_SSL', 'false');
/admin/includes/configure.php
  define('ENABLE_SSL_ADMIN', 'false');
  
It does not work in shared SSL.

--------------------------------
About Session
--------------------------------
The following setting becomes invalid to start a session in XOOPS.
  Zen-Cart Admin Menu::Sessions::Force Cookie Use
  Zen-Cart Admin Menu::Sessions::Prevent Spider Sessions
Please set these with the following file.
  /includes/config_zox.php

--------------------------------
Uninstallation
--------------------------------
Please uninstall it from the module of the XOOPS Admin Menu.
If it deletes the zox directory of the modules directory, it is completion.

*It is necessary to delete it by manual operation when you added 
 a database table in additional modules.

--------------------------------
Note
--------------------------------
As for this module, directory name has to be "zox".
In addition, I cannot answer it even if I have emails because I am weak in English.
Please understand it.

--------------------------------
License
--------------------------------
This module is released under the GPL (see license.txt).

====================================================
gratitude
====================================================
I made this module in reference to 
[Zen Cart Xoops Integration](http://dev.imaginacolombia.com). 
On release, I almost rewrite it. 
However, without [Zen Cart Xoops Integration],
it is sure that there was not this module. 

In addition, the module icon used [Free Vector Cliparts] of 
N.Design Studio(http://www.ndesign-studio.com/). 

Thank you.

--

S-page
------------------------------------
 HIRAOKA Tadahito 
 handle : hira
 URL: http://www.s-page.net/
------------------------------------
