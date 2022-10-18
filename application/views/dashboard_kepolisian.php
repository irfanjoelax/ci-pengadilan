<?php $this->load->view('layouts/header') ?>
<div class="row">
    <div class="col-xs-12">
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                <li data-target="#carousel-example-generic" data-slide-to="3"></li>
            </ol>
            <div class="carousel-inner" role="listbox">
                <div class="item active">
                    <img src="<?= base_url('') ?>asset/img/PNTondano (1).jpg">
                </div>
                <div class="item">
                    <img src="<?= base_url('') ?>asset/img/PNTondano (2).jpg">
                </div>
                <div class="item">
                    <img src="<?= base_url('') ?>asset/img/PNTondano (3).jpg">
                </div>
                <div class="item">
                    <img src="<?= base_url('') ?>asset/img/PNTondano (4).jpg">
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('layouts/footer') ?>