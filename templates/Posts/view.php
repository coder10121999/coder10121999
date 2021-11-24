
<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Post $post
 */
use Cake\ORM\TableRegistry;
$usersTable = TableRegistry::get('Users');
$user = $usersTable->get($post->created_by);
?>
<?php if($_SESSION['Auth']['User']['isadmin']==1): ?>
<div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Post'), ['action' => 'edit', $post->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Post'), ['action' => 'delete', $post->id], ['confirm' => __('Are you sure you want to delete # {0}?', $post->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Posts'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Post'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
</div>
<?php else: ?>
  <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Post'), ['action' => 'edit', $post->id], ['class' => 'side-nav-item']) ?>
            
</div>
<?php endif; ?>


   <div class="card" >
      <div class="card-header" style="font-size: 30px">
       <?= h($post->title) ?>
      </div>
      <div class="card-body">
        <h5 class="card-title" styl="font-size: 15px">
            <?= $post->has('category') ? $this->Html->link($post->category->categoryname, ['controller' => 'Category', 'action' => 'view', $post->category->id]) : '' ?>
            <a style="float: right">Created: 
                <?= h($post->created) ?>
            </a>
            <a>
              Created by :
               <?= $user->username ?>
            </a>
            <a>
            Modified by:
                <?= $post->modified_by ?>
            </a>
            <a style="float: right">Modified:
                <?= h($post->modified) ?>
            </a>
        </h5>
        <?= $this->Html->image($post['PostImage'], ['alt' => 'myImage']); ?>
        <br>
        <br>
        <div class="card-text" style="font-size: 20px">
           <blockquote>
                    <?= $this->Text->autoParagraph(h($post->details)); ?>
            </blockquote>
        </div>
        
        
      </div>
       <div class="related">
                <h4 style="font-size: 20px"><?= __('Related Comments') ?></h4>
                <?php if (!empty($post->comments)) : ?>
                 <?php foreach ($post->comments as $comments) : ?>
                <div class="card" style="width: 40rem;">
                       <div class="card-body">
                       <h5 class="card-title" style="font-size: 18px">
                      <?php $user_comm = $usersTable->get($comments->user_id); ?>
                        <?= h($user_comm->username) ?>
                       </h5>
                       <h6 class="card-subtitle mb-2 text-muted">
                           Created: <?= h($comments->created) ?>
                       </h6>
                       <p class="card-text" style="font-size: 20px">
                           <?= h($comments->comments) ?>
                       </p>
                      
                      <?php if($_SESSION['Auth']['User']['id']==1): ?>
                      <a class="card-link">
                          <?= $this->Html->link(__('View'), ['controller' => 'Comments', 'action' => 'view', $comments->id]) ?>
                      </a>
                      <a class="card-link">
                          <?= $this->Html->link(__('Edit'), ['controller' => 'Comments', 'action' => 'edit', $comments->id]) ?>
                      </a>
                      <a class="card-link">
                          <?= $this->Form->postLink(__('Delete'), ['controller' => 'Comments', 'action' => 'delete', $comments->id], ['confirm' => __('Are you sure you want to delete # {0}?', $comments->id)]) ?>
                      </a>
                      <?php endif; ?>
                           
                      </div>
               </div>
                <?php endforeach; ?>
                <?php endif; ?>
            </div>
       <?= $this->Html->link(__('New Comment'),['controller' => 'Comments' ,'action' => 'add'], ['class' => 'button float-left']) ?>
    </div>