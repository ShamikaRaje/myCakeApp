<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('List Products Mixes'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Products'), ['controller' => 'Products', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Product'), ['controller' => 'Products', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="productsMixes form large-10 medium-9 columns">
    <?= $this->Form->create($productsMix); ?>
    <fieldset>
        <legend><?= __('Add Products Mix') ?></legend>
        <?php
            echo $this->Form->input('prod_id', ['options' => $products]);
           // echo $this->Form->input('tags._ids', ['options' => $tags]);
            echo $this->Form->input('prod_mix_name');
            echo $this->Form->input('prod_mix_price');
            echo $this->Form->input('Created');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
