<?
$title = 'Список покупателей';
require_once HEADER_VIEW
?>
<?if (!empty($customers)): ?>
    <ul>
        <?foreach ($customers as $customer):?>
            <li>
                <a href="/customers/<?= $customer['id'] ?>">
                    Покупатель #<?= $customer['id'] ?> - <?= $customer['name'] ?>
                </a>
            </li>
        <?endforeach;?>
    </ul>
    <? if ($totalPages > 1): ?>
        <nav class="pagination">
            <ul>
                <? for ($i = 1; $i <= $totalPages; $i++): ?>
                    <li>
                        <a href="/customers?page=<?= $i ?>" <?= $i === $page ? 'class="active"' : '' ?>>
                            <?= $i ?>
                        </a>
                    </li>
                <? endfor; ?>
            </ul>
        </nav>
    <? endif; ?>
<?else:?>
    <p>Покупателей пока нет.</p>
<?endif;?>
<? require_once FOOTER_VIEW?>