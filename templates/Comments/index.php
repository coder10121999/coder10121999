<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Comment[]|\Cake\Collection\CollectionInterface $comments
 */
?>
<div class="comments index content">
    <?= $this->Html->link(__('New Comment'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Add Comments') ?></h3>
    <br>
    <br>
    
    <?php foreach ($comments as $comment): ?>
    <?php if($comment->post->approved == 1): ?>
     <div class="card">
       <div class="card-header" style="font-size: 20px">
         <?= $comment->has('post') ? $this->Html->link($comment->post->title, ['controller' => 'Posts', 'action' => 'view', $comment->post->id]) : '' ?>
       </div>
       <div class="card-body">
            <h5 class="card-title" style="float:left">
                <?= $comment->has('user') ? $this->Html->link($comment->user->username, ['controller' => 'Users', 'action' => 'view', $comment->user->id]) : '' ?>
            </h5>
            <h5 class="card-title" style="float:right"><?= h($comment->created) ?></h5>
           <br>
           <br>
            <p class="card-text" style="font-size: 20px"><?= h($comment->comments) ?></p>
           
           <?php if($_SESSION['Auth']['User']['isadmin']==1): ?>
           <a>
            <?= $this->Html->link(__('View'), ['action' => 'view', $comment->id], ['class' => 'button float-right']) ?>
            </a>
           <a>
            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $comment->id], ['class' => 'button float-right']) ?>
           </a>
           <a>
            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $comment->id], ['class' => 'button float-right'], ['confirm' => __('Are you sure you want to delete # {0}?', $comment->id)]) ?>
            </a>
           <?php endif; ?>
           
       </div>
    </div>
    <?php endif; ?>
    <?php endforeach; ?>
    
    
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
</div>