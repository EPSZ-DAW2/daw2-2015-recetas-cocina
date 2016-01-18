<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Menu') ?></li>
        <li><?= $this->Html->link(__('Listar Tiendas'), ['action' => 'indexpublico']) ?> </li>
    </ul>
</nav>
<div class="tiendas view large-9 medium-8 columns content">
    <h3><?= h($tienda->nombre) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Nombre') ?></th>
            <td><?= h($tienda->nombre) ?></td>
        </tr>
        <tr>
            <th><?= __('Domicilio') ?></th>
            <td><?= h($tienda->domicilio) ?></td>
        </tr>
        <tr>
            <th><?= __('Poblacion') ?></th>
            <td><?= h($tienda->poblacion) ?></td>
        </tr>
        <tr>
            <th><?= __('Provincia') ?></th>
            <td><?= h($tienda->provincia) ?></td>
        </tr>
        <tr>
            <th><?= __('Usuario') ?></th>
            <td><?= $tienda->has('usuario') ? $this->Html->link($tienda->usuario->nombre, ['controller' => 'Usuarios', 'action' => 'view', $tienda->usuario->id]) : '' ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Ofertas de la Tienda') ?></h4>
        <?php if (!empty($tienda->tienda_ofertas)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Ingrediente') ?></th>
                <th><?= __('Descripcion') ?></th>
                <th><?= __('Envase') ?></th>
                <th><?= __('Cantidad') ?></th>
                <th><?= __('Medida') ?></th>
                <th><?= __('Notas') ?></th>
                <th class="actions"><?= __('Acciones') ?></th>
            </tr>
            <?php foreach ($listaOfertas as $tiendaOfertas){?>
            <tr>
                <td><?= h($tiendaOfertas->ingrediente->nombre) ?></td>
                <td><?= h($tiendaOfertas->descripcion) ?></td>
                <td><?= h($tiendaOfertas->envase) ?></td>
                <td><?= h($tiendaOfertas->cantidad) ?></td>
                <td><?= h($tiendaOfertas->medida) ?></td>
                <td><?= h($tiendaOfertas->notas) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Ver'), ['controller' => 'TiendaOfertas', 'action' => 'view2', $tiendaOfertas->id]) ?>
                </td>
            </tr>
            <?php } ?>
        </table>
    <?php endif; ?>
    </div>
</div>