<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Category[]|\Cake\Collection\CollectionInterface $category
 */
?>
<div class="category index content">
    <?php if($_SESSION['Auth']['User']['isadmin']==1): ?>
    <?= $this->Html->link(__('New Category'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <?php endif; ?>
    <h3 style="font-size: 20px"><?= __('Search by Category') ?></h3>
    <br>
    <br>
    
    <?php foreach ($category as $category): ?>
    <div class="card">
       <div class="card-header" style="font-size: 20px">
         <?= h($category->categoryname) ?>
       </div>
       <div class="card-body">
            <h5 class="card-title" style="float:right"><?= h($category->created) ?></h5>
            <p class="card-text" style="font-size: 20px"><?= h($category->catdescription) ?></p>
                <?= $this->Html->link(__('View'), ['action' => 'view', $category->id], ['class' => 'button float-left']) ?>
                
             <?php if($_SESSION['Auth']['User']['id']==1): ?>
           
               <?= $this->Html->link(__('Edit'), ['action' => 'edit', $category->id], ['class' => 'button float-left']) ?>
           
               <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $category->id], ['class' => 'button float-left'], ['confirm' => __('Are you sure you want to delete # {0}?', $category->id) ]) ?>
             <?php endif; ?>
           
       </div>
    </div>
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
