<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="vi">
<head>
<?php $this->load->view('modules/headtag') ?>
</head>

<body>
<?php $this->load->view('modules/header') ?>
    <div class="container-fluid">
        <div class="row">
            <?php $this->load->view('modules/navbar') ?>
            <?php $this->load->view("components/$comp/$view",$this->data) ?>
        </div>
    </div>
</body>
</html>