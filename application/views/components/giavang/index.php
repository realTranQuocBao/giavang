<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <div class="border-bottom mb-3 pt-3 pb-2">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center">
            <h1 class="h2">GIÁ VÀNG</h1>
        </div>
        <span class="h6"><?= 'Ngày: '.date('d/m/Y'); ?></span>
    </div>

    <div class="mb-3 pt-3 pb-2 row justify-content-center">
        <div class="col-auto">
            <?php $this->load->view('components/giavang/table_giavang') ?>
            <button type="submit" id="updatePage">Cập nhật ngay</button>
        </div>
    </div>

</main>
<script>
   var autoUpdate = () => {
        var form = $(this);
        $.ajax({
            url: "<?= base_url('giavang/update'); ?>",
            data: form.serialize(),
            type: 'POST',
            success: (data) => {
                console.log(data);
                $('table').html(data);
            },
            error: (xhr, status) => {
                alert("Sorry, there was a problem!");
            }
        });
    };
    $('#updatePage').on('click', () => {
        autoUpdate();
    });
    setInterval(autoUpdate, 30000);
</script>