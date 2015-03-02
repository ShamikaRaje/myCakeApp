<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Products Mix'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Products'), ['controller' => 'Products', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Product'), ['controller' => 'Products', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="productsMixes index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id') ?></th>
            <th><?= $this->Paginator->sort('prod_id') ?></th>
            <th><?= $this->Paginator->sort('prod_mix_name') ?></th>
            <th><?= $this->Paginator->sort('prod_mix_price') ?></th>
            <th><?= $this->Paginator->sort('Created') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php //echo "<pre>"; print_r($popular); die; ?>
    <?php foreach ($productsMixes as $productsMix): ?>
        <tr>
            <td><?= $this->Number->format($productsMix->id) ?></td>
            <td>
                <?= $productsMix->has('product') ? $this->Html->link($productsMix->product->id, ['controller' => 'Products', 'action' => 'view', $productsMix->product->id]) : '' ?>
            </td>
            <td><?= h($productsMix->prod_mix_name) ?></td>
            <td><?= $this->Number->format($productsMix->prod_mix_price) ?></td>
            <td><?= h($productsMix->Created) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $productsMix->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $productsMix->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $productsMix->id], ['confirm' => __('Are you sure you want to delete # {0}?', $productsMix->id)]) ?>
            </td>
        </tr>

    <?php endforeach; ?>
    </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
