<table class="table table-hover table-bordered table-striped table-responsive">
    <thead class="text-center ">
        <tr>
            <th scope="col" colspan="2">Ngoại tệ</th>
            <th scope="col" colspan="2">Mua</th>
            <th scope="col" rowspan="2" class="align-middle">Bán</th>
        </tr>
        <tr>
            <th scope="col">Tên ngoại tệ</th>
            <th scope="col">Mã NT</th>
            <th scope="col">Tiền mặt</th>
            <th scope="col">Chuyển khoản</th>
        </tr>
    </thead>
    <tbody class="text-right">
        <?php foreach ($xml->Exrate as $row) : ?>
            <tr>
                <td class="text-left"><?= $row['CurrencyName']; ?></td>
                <td class="text-center"><?= $row['CurrencyCode']; ?></td>
                <td><?= $row['Buy']; ?></td>
                <td><?= $row['Transfer']; ?></td>
                <td><?= $row['Sell']; ?></td>
            </tr>
        <?php endforeach; ?>
        <tr class="text-left">
            <td colspan="5">
                <div id="info">
                    <ul><u class="font-weight-bold">Ghi chú:</u>
                        <li>Copyright by <?= $xml->Source ?></li>
                        <li>Tỷ giá được cập nhật lúc <?= date("H:i d/m/Y", strtotime($xml->DateTime)) ?> và chỉ mang tính chất tham khảo</li>
                        <li>Bảng được cập nhật tự động sau mỗi 5 phút theo yêu cầu của VCB.</li>
                    </ul>
                </div>
            </td>
        </tr>
    </tbody>
</table>