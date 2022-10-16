</section>
</div>

<footer class="main-footer">
    <strong>
        Copyright &copy; <?= date('Y') ?> <span class="text-success"><?= COPYRIGHT ?></span>
    </strong>
    <div class="pull-right hidden-xs">
        <b>Version</b> 1.0.0
    </div>
</footer>
</div>

<!-- Script -->
<script src="<?= base_url() ?>asset/js/jquery.min.js"></script>
<script src="<?= base_url() ?>asset/js/bootstrap.min.js"></script>
<script src="<?= base_url() ?>asset/js/adminlte.min.js"></script>
<?php if (isset($datatable)) : ?>
    <script src="<?= base_url() ?>asset/js/jquery.dataTables.min.js"></script>
    <script src="<?= base_url() ?>asset/js/dataTables.bootstrap.min.js"></script>
    <script>
        $(function() {
            $('.datatables').DataTable({
                'ordering': false,
            })
        })
    </script>
<?php endif; ?>
<?php if (isset($summernote)) : ?>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.summernote').summernote({
                height: 100
            });
        });
    </script>
<?php endif; ?>
</body>

</html>