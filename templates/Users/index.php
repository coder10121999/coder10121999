<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User[]|\Cake\Collection\CollectionInterface $users
 */
?>
<?php if($_SESSION['Auth']['User']['isadmin']==1): ?>
<div class="users index content">
    <?= $this->Html->link(__('New User'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Users') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('username') ?></th>
                    <th><?= $this->Paginator->sort('password') ?></th>
                    <th><?= $this->Paginator->sort('email') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th><?= $this->Paginator->sort('isadmin') ?></th>
                    <th><?= $this->Paginator->sort('isactive') ?></th>
                    <th><?= $this->Paginator->sort('userimage') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user): ?>
                <tr>
                    <td><?= $this->Number->format($user->id) ?></td>
                    <td><?= h($user->username) ?></td>
                    <td><?= h($user->password) ?></td>
                    <td><?= h($user->email) ?></td>
                    <td><?= h($user->created) ?></td>
                    <td><?= h($user->modified) ?></td>
                    <td><?= $this->Number->format($user->isadmin) ?></td>
                    <td><?= $this->Number->format($user->isactive) ?></td>
                    <td><?= $this->Html->image($user->userimage) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $user->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $user->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
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
</div>
<?php else: ?>
<?php foreach ($users as $user): ?>
      <?php if($user->id == $_SESSION['Auth']['User']['id']): ?>

         <div class="card">
          <div class="card-header" style="font-size: 20px">
            Welcome: <?= h($user->username) ?>
          </div>
          <div class="card-body">
            <h5 class="card-title" style="float: right">
                Created: <?= h($user->created) ?>
            </h5>
            <p class="card-text" style="font-size: 20px">
                <?= $this->Html->image($user->userimage) ?>
                <br>
                <br>
                <br>
                Email: <?= h($user->email) ?>
            </p>
            <?= $this->Html->link(__('View your comments'), ['action' => 'view', $user->id], ['class' => 'button float-left']) ?>
            <br>
            <br>
              <br>
              <br>
            <?= $this->Html->link(__('Edit your details'), ['action' => 'edit', $user->id], ['class' => 'button float-left']) ?>
            <br>
            <br>
              <br>
              <br>
            <?= $this->Form->postLink(__('Delete your account'), ['action' => 'delete', $user->id], ['class' => 'button float-left'], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?>
            
          </div>
        </div>

      <?php endif; ?>
   <?php endforeach; ?>
<?php endif; ?>
