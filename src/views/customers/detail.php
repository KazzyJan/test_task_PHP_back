<?
$title = 'Покупатель #' . $customer['id'];
require_once HEADER_VIEW
?>
<p><strong>ID покупателя:</strong> <?= $customer['id'] ?></p>
<p><strong>ФИО:</strong> <?= $customer['name'] ?></p>
<p><strong>Номер телефона:</strong> <?= $customer['phone'] ?></p>
<p><strong>Почта:</strong> <?= $customer['email'] ?></p>

<h2>Заказы пользователя</h2>

<ul>
    <li><h3>Оплаченые заказы</h3>
        <ul>
            <?foreach ($orders as $order):?>
                <?if ($order['status'] == 'paid'):?>
                    <li><a href="/orders/<?=$order['id']?>">Заказ #<?=$order['id']?>: <?=$order['description']?></a></li>
                <?endif?>
            <?endforeach?>
        </ul>
    </li>
    <li><h3>Неоплаченые заказы</h3>
        <ul>
            <?foreach ($orders as $order):?>
                <?if ($order['status'] == 'unpaid'):?>
                    <li><a href="/orders/<?=$order['id']?>">Заказ #<?=$order['id']?>: <?=$order['description']?></a></li>
                <?endif?>
            <?endforeach?>
        </ul>
    </li>
</ul>

<?
$totalAmount = 0;
$paidAmount = 0;
$unpaidAmount = 0;
    foreach ($orders as $order) {
        if ($order['status'] == 'paid') {
            $paidAmount += $order['total_price'];
        }
        elseif ($order['status'] == 'unpaid') {
            $unpaidAmount += $order['total_price'];
        }
        $totalAmount += $order['total_price'];
    }
    ?>

<h3>Суммы по заказам</h3>
<table>
    <thead>
    <tr>
        <th>Всего</th>
        <th>Оплачено</th>
        <th>Неоплачено</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td><?=$totalAmount?></td>
        <td><?=$paidAmount?></td>
        <td><?=$unpaidAmount?></td>
    </tr>
</table>
<br>
<a href="/customers">Вернуться к списку покупателей</a>
</body>
</html>
