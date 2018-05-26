
    <div class="table-responsive">
        <table class="table table-hover table-striped">
            <thead>
            <tr>
                <th>Назва</th>
                <th>Ціна</th>
                <th>Кількість</th>
                <th>Сума</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($session['cart'] as $id => $item): ?>
                <tr>

                    <td><?=$item['name']?></td>
                    <td align="center"><?=$item['price']?></td>
                    <td align="center"><?=$item['qty']?></td>
                    <td align="center"><?=$item['qty']*$item['price']?></td>

                </tr>
            <?php endforeach;?>

            <tr>
                <td colspan="3"><strong>Всього товарів:</strong></td>
                <td><strong><?= $session['cart.qty']?></strong></td>
            </tr>
            <tr>
                <td colspan="3"><strong>На загальну суму:</strong></td>
                <td><strong><?= $session['cart.sum']?></strong></td>
            </tr>

            </tbody>
        </table>
    </div>
