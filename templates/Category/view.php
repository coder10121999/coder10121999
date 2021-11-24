<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Category $category
 */
?>

    <?php if($_SESSION['Auth']['User']['isadmin']==1): ?>
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Category'), ['action' => 'edit', $category->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Category'), ['action' => 'delete', $category->id], ['confirm' => __('Are you sure you want to delete # {0}?', $category->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Category'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Category'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <?php endif; ?>
    
    <div class="card text-center">
           <div class="card-header" style="font-size: 20px">
               <?= h($category->categoryname) ?>
           </div>
    <div class="card-body">
      <h5 class="card-title" style="float: right">
        <?= h($category->created) ?>
      </h5>
    <br>
      <blockquote style="font-size: 20px">
         <?= $this->Text->autoParagraph(h($category->catdescription)); ?>
        </blockquote>
      
    </div>
  
    </div>
    
    <br>
    <br>
    <br>
    <br>
    
    <?php if (!empty($category->posts)) : ?>
    <?php foreach ($category->posts as $posts) : ?>
    <?php if(h($posts->approved)==1): ?>
    <div class="card w-75">
        <div class="card-body">
           <h5 class="card-title" style="font-size: 20px"><?= h($posts->title) ?></h5>
           <p class="card-text" style="float: right"><?= h($posts->created) ?></p>
          
          <?= $this->Html->link(__('Read More...'), ['controller' => 'Posts', 'action' => 'view', $posts->id],  ['class' => 'button float-left'] ) ?>
        </div>
    </div>
    <?php endif; ?>
    <?php endforeach; ?>
    <?php endif; ?>
    
    

