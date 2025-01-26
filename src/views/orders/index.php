<?
$title = 'Список заказов';
require_once HEADER_VIEW
?>
<?if (!empty($orders)): ?>
    <ul>
        <?foreach ($orders as $order):?>
            <li>
                <a href="/orders/<?= $order['id'] ?>">
                    Заказ #<?= $order['id'] ?> - <?= $order['description'] ?>
                </a>
            </li>
        <?endforeach;?>
    </ul>
    <? if ($totalPages > 1): ?>
        <nav class="pagination">
            <ul>
                <? for ($i = 1; $i <= $totalPages; $i++): ?>
                    <li>
                        <a href="/orders?page=<?= $i ?>" <?= $i === $page ? 'class="active"' : '' ?>>
                            <?= $i ?>
                        </a>
                    </li>
                <? endfor; ?>
            </ul>
        </nav>
    <? endif; ?>
<?else:?>
    <p>Заказов пока нет.</p>
<?endif;?>
    <form id="order-form" method="POST" action="/orders/add" class="order-form">
        <label for="description">Описание заказа*</label>
        <textarea name="description" id="description" placeholder="Описание заказа"></textarea>

        <label for="total_price">Общая стоимость*</label>
        <input type="number" min="0" name="total_price" id="total_price" placeholder="Общая стоимость">

<!--        <label for="phone">Номер телефона</label>-->
<!--        <input type="text" name="phone" id="phone" placeholder="+7(000)000-00-00" />-->
<!---->
<!--        <label for="email">Почта</label>-->
<!--        <input type="text" name="email" id="email" placeholder="some@some.some">-->

        <label for="customer_id">Выберите покупателя*</label>
        <select name="customer_id" id="customer_id">
            <?foreach ($customers as $customer):?>
                <option value="<?=$customer['id']?>"><?=$customer['name']?></option>
            <?endforeach;?>
        </select>

        <select name="status" id="status">
            <option value="unpaid">Неоплачен</option>
            <option value="paid">Оплачен</option>
        </select>

        <button type="submit">Добавить заказ</button>
    </form>

    <script src="<?=JS_URL?>/order-form.js"></script>
<? require_once FOOTER_VIEW?>