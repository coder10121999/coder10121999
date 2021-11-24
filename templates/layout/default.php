<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 */

$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet">

    <?= $this->Html->css(['normalize.min', 'milligram.min', 'cake']) ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
    <style>
        body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

.topnav {
  overflow: hidden;
  background-color: #333;
}

.topnav a {
  float: left;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}


    </style>
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>
<body>
    <?php if($loggedIn): ?>
    <div class="topnav">
    <a class= active>NewsPortal</a>
     <a >
          <?= $this->Html->link(('Posts'), ['controller' => 'posts', 'action' => 'index']); ?>
        </a>
    <a>
        <?= $this->Html->link(('Category'), ['controller' => 'category', 'action' => 'index']); ?>
        </a>
     <a>
             <?= $this->Html->link(('Comments'), ['controller' => 'comments', 'action' => 'index']); ?>
        </a>
    
    </div>
    
    
   <?= $this->Html->link(('Logout'), ['controller' => 'users', 'action' => 'logout'], ['class' => 'button float-right']); ?>
  
    <?php if($_SESSION['Auth']['User']['isadmin']==1): ?>
   <?= $this->Html->link(('Users'), ['controller' => 'users', 'action' => 'index'], ['class' => 'button float-right']); ?> 
    <?php else: ?>
   <?= $this->Html->link(('My Dashboard'), ['controller' => 'users', 'action' => 'index'], ['class' => 'button float-right']); ?>
    <?php endif; ?>
    
    
   <?php else: ?>
     <?= $this->Html->link(('Login'), ['controller' => 'users', 'action' => 'login'], ['class' => 'button float-right']); ?>
     <?= $this->Html->link(('Register'), ['controller' => 'users', 'action' => 'register'], ['class' => 'button float-right']); ?>
      
   <?php endif; ?>
 
   
    <br>
    <br>
    <br>
    <br>
    
    <main class="main">
        <div class="container">
            <?= $this->Flash->render() ?>
            <?= $this->fetch('content') ?>left
        </div>
    </main>
    <footer>
    </footer>
</body>
</html>
