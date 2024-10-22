<!-- <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Dashboard</h1>
  <div class="btn-toolbar mb-2 mb-md-0">
    <div class="btn-group me-2">
      <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
      <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
    </div>
    <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle d-flex align-items-center gap-1">
      <svg class="bi">
        <use xlink:href="#calendar3" />
      </svg>
      This week
    </button>
  </div>
</div> -->
<?php if ($grafik1 !== []): ?>
  <div class="row mb-2">
    <div class="col-3"></div>
    <div class="col-6">
          <canvas id="Grafik1" width="400" height="200"></canvas>
    </div>   
    <div class="col-3"></div>   
  </div>
<?php endif; ?>
<?php if ($grafik1 !== []): ?>
  <h6>Jumlah Tiang per Kelurahan</h6>
  <div class="table-responsive small">
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">Kelurahan</th>
          <th scope="col">jumlah</th>
          <th scope="col">Kecamatan</th>
          <th scope="col">Kabupaten</th>
        </tr>
      </thead>
      <tbody>
        <?php $urut = 1  ?>
        <?php foreach ($grid1 as $grid1_item): ?>


          <tr>
            <td><?= $urut++; ?></td>
            <td><?= esc($grid1_item['kelurahan']) ?></td>
            <td><?= esc($grid1_item['jumlah']) ?></td>
            <td><?= esc($grid1_item['kecamatan']) ?></td>
            <td><?= esc($grid1_item['kabupaten']) ?></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
<?php endif; ?>
<script src="<?= base_url('assets/Chart.js-4.3.2/chart.js') ?>"></script>
<?php if ($grafik1 !== []): ?>
  <script>
    /* globals Chart:false */

    (() => {
      'use strict'

      // Graphs
      const ctx = document.getElementById('Grafik1')
      // eslint-disable-next-line no-unused-vars
      const myChart = new Chart(ctx, {
        type: 'pie',
        data: {
          labels: [
            <?php foreach ($grafik1 as $grafik1_item): ?> 
              '<?= esc($grafik1_item['kecamatan']).' ('.esc($grafik1_item['jumlah']).')' ?>',
            <?php endforeach ?>
          ],
          datasets: [{
            data: [
              <?php foreach ($grafik1 as $grafik1_item): ?> '<?= esc($grafik1_item['jumlah']) ?>',
              <?php endforeach ?>
            ],
          }]
        },
        options: {
          plugins: {
            legend: {
              display: true,
              position: "bottom",             
            },
            tooltip: {
              boxPadding: 3
            }
          }
        }
      })
    })()
  </script>

<?php endif; ?>