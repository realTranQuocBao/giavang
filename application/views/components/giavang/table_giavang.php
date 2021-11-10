<table class="table table-hover table-bordered table-striped table-responsive">
    <thead class="text-center ">
        <tr>
            <th scope="col">Loại vàng</th>
            <th scope="col">Mua vào</th>
            <th scope="col">Bán ra</th>
        </tr>
    </thead>
    <tbody class="text-center">
        <?php foreach ($xml->ratelist->city as $city) :  ?>
            <tr scope="row">
                <th colspan="3"><?= $city['name']; ?></th>
            </tr>
            <?php foreach ($city->item as $item) : ?>
                <tr>
                    <td class="text-left"><?= $item['type']; ?></td>
                    <td><?= $item['buy']; ?></td>
                    <td><?= $item['sell']; ?></td>
                </tr>
            <?php endforeach; ?>
        <?php endforeach; ?>
        <tr class="text-left">
            <td colspan="5">
                <div id="info">
                    <ul><u class="font-weight-bold">Ghi chú:</u>
                        <li>Đơn vị: <?= $xml->ratelist['unit'] ?>.</li>
                        <li>Giá vàng được cập nhật lúc <?= date("H:i d/m/Y", strtotime($xml->ratelist['updated'])); ?> và chỉ mang tính chất tham khảo</li>
                        <li>Copyright by <?= $xml->url; ?></li>
                    </ul>
                </div>
            </td>
        </tr>
    </tbody>
</table>