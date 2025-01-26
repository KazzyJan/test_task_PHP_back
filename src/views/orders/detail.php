<?
$title = 'Детали заказа #' . $order['id'];
require_once HEADER_VIEW
?>
<p><strong>ID заказа:</strong> <?= $order['id'] ?></p>
<p><strong>Описание:</strong> <?= $order['description'] ?></p>
<p><strong>Общая стоимость:</strong> <?= $order['total_price'] ?> руб.</p>
<div><strong>Контактные данные:</strong><br>
    Email <?= $order['email'] ?><br>
    Телефон <?= $order['phone'] ?>
</div>
<p><strong>Статус:</strong>
    <?if ($order['status'] == 'unpaid'):?>
        Не оплачен
    <?elseif($order['status'] == 'paid'):?>
        Оплачен
    <?endif;?>
</p>
<h2>Клиент</h2>
<?php if ($customer): ?>
    <a href="/customers/<?=$customer['id']?>"><strong>Имя:</strong> <?= $customer['name'] ?></a>
    <a href="mailto:<?=$customer['email']?>"><strong>Email:</strong> <?= $customer['email'] ?></a>
<?php else: ?>
    <p>Клиент не найден.</p>
<?php endif; ?>
<br>
<a href="/orders">Вернуться к списку заказов</a>
</body>
</html>
