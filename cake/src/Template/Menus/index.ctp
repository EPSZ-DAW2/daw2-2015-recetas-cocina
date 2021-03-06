﻿<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Acciones') ?></li>
        <li><?= $this->Html->link(__('Nuevo menú'), ['action' => 'add']) ?></li>
       <li><?= $this->Html->link(__('Menús y sus platos asociados'), ['controller' => 'MenuRecetas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Añadir plato a menú'), ['controller' => 'MenuRecetas', 'action' => 'add']) ?></li>
		<li><?= $this->Html->link(__('Planificaciones de menús'), ['controller' => 'PlanificacioneMenus', 'action' => 'index']) ?></li>
    </ul>
</nav>
<div class="menus index large-9 medium-8 columns content">
    <h3><?= __('Menús') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
				<th><?= $this->Paginator->sort('titulo') ?></th>
                       <th class="actions"><?= __('Acciones') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($menus as $menu): ?>
            <tr>
                <td><?= $this->Number->format($menu->id) ?></td>
				<td><?= $menu->titulo ?></td>
               <td class="actions">
                    <?= $this->Html->link(__('Ver'), ['action' => 'view', $menu->id]) ?>
                    <?= $this->Html->link(__('Editar'), ['action' => 'edit', $menu->id]) ?>
                    <?= $this->Form->postLink(__('Borrar'), ['action' => 'delete', $menu->id], ['confirm' => __('Está seguro de que desea eliminar # {0}?', $menu->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('anterior')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('siguiente') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
