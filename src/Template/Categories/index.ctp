<table>
    <tr>
        <th>Category ID</th>
        <th>Category Parent ID</th>
        <th>Category left node</th>
        <th>Category Right node</th>
        <th>Name</th>
        <th>Description </th>
        <th>Created</th>
        <th>Action</th>
    </tr>
<?php foreach ($categories as $category): ?>
    <tr>
        <td><?= $this->Number->format($category->id) ?></td>
        <td><?= $this->Number->format($category->parent_id) ?></td>
        <td><?= $this->Number->format($category->lft) ?></td>
        <td><?= $this->Number->format($category->rght) ?></td>
        <td><?= h($category->name) ?></td>
        <td><?= h($category->description) ?></td>
        <td><?= h($category->created) ?></td>
        <td class="actions" colspan="2">
            <?= $this->Html->link(__('View'), ['action' => 'view', $category->id]) ?>
            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $category->id]) ?>
            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $category->id], ['confirm' => __('Are you sure you want to delete # {0}?', $category->id)]) ?>
            <?= $this->Form->postLink(__('Move down'), ['action' => 'move_down', $category->id], ['confirm' => __('Are you sure you want to move down # {0}?', $category->id)]) ?>
            <?= $this->Form->postLink(__('Move up'), ['action' => 'move_up', $category->id], ['confirm' => __('Are you sure you want to move up # {0}?', $category->id)]) ?>
        </td>
    </tr>
<?php endforeach; ?>
</table>