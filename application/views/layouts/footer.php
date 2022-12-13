</section>
</div>

<footer class="main-footer">
    <strong>
        Copyright &copy; <?= date('Y') ?> <span class="text-success"><?= COPYRIGHT ?></span>
    </strong>
    <div class="pull-right hidden-xs">
        <b>Version</b> 3.0.0
    </div>
</footer>
</div>

<!-- Script -->
<script src="<?= base_url() ?>asset/js/jquery.min.js"></script>
<script src="<?= base_url() ?>asset/js/bootstrap.min.js"></script>
<script src="<?= base_url() ?>asset/js/adminlte.min.js"></script>
<script>
    const form = document.querySelector('.form-inline');

    form.onsubmit = () => {
        const kejaksaan = document.getElementById('tujuan_kejaksaan').value;
        const lapas = document.getElementById('tujuan_lapas').value;

        if (kejaksaan == '' && lapas == '') {
            alert(`Harap Masukkan tujuan minimal salah satu kejaksaan atau lapas`)
            return false;
        } else {
            return true;
        }
    }
</script>
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
<?php if (isset($chart)) : ?>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.9.1/dist/chart.min.js"></script>
    <script>
        const ctx = document.getElementById('myChart').getContext('2d');
        const myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: [
                    'Penetapan Hari Sidang',
                    'Penahanan Hakim',
                    'Penahanan KPN',
                    'Ijin Sita',
                    'Ijin Penahanan',
                    'Ijin Geledah',
                    'Petikan Putusan',
                ],
                datasets: [{
                    label: 'Grafik Total/Jumlah Berdasarkan Fitur Utama',
                    data: [<?= $chart ?>],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(255, 205, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(201, 203, 207, 0.2)'
                    ],
                    borderColor: [
                        'rgb(255, 99, 132)',
                        'rgb(255, 159, 64)',
                        'rgb(255, 205, 86)',
                        'rgb(75, 192, 192)',
                        'rgb(54, 162, 235)',
                        'rgb(153, 102, 255)',
                        'rgb(201, 203, 207)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
<?php endif; ?>
</body>

</html>