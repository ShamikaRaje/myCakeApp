<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Products Mix'), ['action' => 'edit', $productsMix->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Products Mix'), ['action' => 'delete', $productsMix->id], ['confirm' => __('Are you sure you want to delete # {0}?', $productsMix->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Products Mixes'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Products Mix'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Products'), ['controller' => 'Products', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Product'), ['controller' => 'Products', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="productsMixes view large-10 medium-9 columns">
    <h2><?= h($productsMix->id) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Product Nam') ?></h6>
            <p><?= $productsMix->has('product') ? $this->Html->link($productsMix->product->Product_name, ['controller' => 'Products', 'action' => 'view', $productsMix->product->id]) : '' ?></p>
            <h6 class="subheader"><?= __('Prod Mix Name') ?></h6>
            <p><?= h($productsMix->prod_mix_name) ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($productsMix->id) ?></p>
            <h6 class="subheader"><?= __('Prod Mix Price') ?></h6>
            <p><?= $this->Number->format($productsMix->prod_mix_price) ?></p>
        </div>
        <div class="large-2 columns dates end">
            <h6 class="subheader"><?= __('Created') ?></h6>
            <p><?= h($productsMix->Created) ?></p>
        </div>
    </div>
</div>
