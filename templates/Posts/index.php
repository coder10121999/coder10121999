<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Post[]|\Cake\Collection\CollectionInterface $posts
 */
?>

<?php if($_SESSION['Auth']['User']['isadmin']==1): ?>

<div>
<?= $this->Html->link(__('New Post'), ['action' => 'add'], ['class' => 'button float-right']) ?>
<h3><?= __('Posts') ?></h3>
</div>


<br>
<br>

<div>
     <?php foreach ($posts as $post): ?>
     <div class="card" >
      <div class="card-header" style="font-size: 30px">
       <?= h($post->title) ?>
      </div>
      <div class="card-body">
        <h5 class="card-title">
            <?= $post->has('category') ? $this->Html->link($post->category->categoryname, ['controller' => 'Category', 'action' => 'view', $post->category->id]) : '' ?>
           
            <a style="float: right">Created: 
                <?= h($post->created) ?>
            </a>
        </h5>
        <br>
          <br>
        <?= $this->Html->image($post['PostImage'], ['alt' => 'myImage']); ?>
        <p class="card-text" style="font-size: 20px">
         <?= $this->Text->truncate($post->details,200,['ellipsis'=> '...','exact' =>false]); ?>
        </p>
        
          <?= $this->Html->link(__('Read More...'), ['action' => 'view', $post->id],  ['class' => 'button float-left']) ?>
          
          <?php if($post->approved == 0): ?>
          <?= $this->Html->link(__('Approve'), ['action' => 'approve', $post->id],  ['class' => 'button float-right']) ?>
          <?php endif; ?>
          

      </div>
     </div>
      
     <?php endforeach; ?>
</div>

<div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
</div>

<?php else: ?>


<div>
<?= $this->Html->link(__('New Post'), ['action' => 'add'], ['class' => 'button float-right']) ?>
<h3><?= __('Posts') ?></h3>
</div>


<br>
<br>

<div>
     <?php foreach ($posts as $post): ?>
     <?php if($post->approved==1): ?>

     <div class="card" >
      <div class="card-header" style="font-size: 30px">
       <?= h($post->title) ?>
      </div>
      <div class="card-body">
        <h5 class="card-title">
            <?= $post->has('category') ? $this->Html->link($post->category->categoryname, ['controller' => 'Category', 'action' => 'view', $post->category->id]) : '' ?>
            <?= $post->has('user') ? $this->Html->link($post->user->username, ['controller' => 'Users', 'action' => 'view', $post->user->id]) : '' ?>
            <a style="float: right">Created: 
                <?= h($post->created) ?>
            </a>
        </h5>
        <?= $this->Html->image($post['PostImage'], ['alt' => 'myImage']); ?>
        <p class="card-text" style="font-size: 20px">
         <?= $this->Text->truncate($post->details,200,['ellipsis'=> '...','exact' =>false]); ?>
        </p>
        
          <?= $this->Html->link(__('Read More...'), ['action' => 'view', $post->id],  ['class' => 'button float-left']) ?>

      </div>
     </div>
     
     <?php endif; ?>
     <?php endforeach; ?>
</div>

<div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
</div>

  
<?php endif; ?>
