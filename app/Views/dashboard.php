<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h2 class="h2"><?= esc($title) ?></h2>

</div>
<?php if ($grafik1 !== []): ?>
  <div class="row mb-2">
    <div class="col-1"></div>
    <div class="col-10">
      <canvas id="Grafik1" width="400" height="200"></canvas>
    </div>
    <div class="col-1"></div>
  </div>
<?php endif; ?>
<?php if ($grafik1 !== []): ?>
  <hr>
  <div class="table-responsive small">
    <table class="table table-striped table-sm mb-5">
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">Kelurahan</th>
          <th scope="col">jumlah</th>
        </tr>
      </thead>
      <tbody>
        <?php $urut = 1; ?>
        <?php $total = 0;  ?>
        <?php foreach ($grid1 as $grid1_item): ?>
          <?php $total=$total+$grid1_item['jumlah']?>
          <tr>
            <td><?= $urut++; ?></td>
            <td><?= esc($grid1_item['kelurahan'] . ', ' . $grid1_item['kecamatan']) ?></td>
            <td class="text-end"><?= esc($grid1_item['jumlah']) ?></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
      <tfoot>
      <tr>
            <td></td>
            <td>TOTAL</td>
            <td class="text-end"><?= $total ?></td>
          </tr>
      </tfoot>
    </table>
  </div>
<?php endif; ?>
<script src="<?= base_url('assets/Chart.js-4.3.2/chart.js') ?>"></script>
<?php if ($grafik1 !== []): ?>
  <script>
    /* globals Chart:false */
    // Graphs
    const ctx = document.getElementById('Grafik1')
    // eslint-disable-next-line no-unused-vars
    const myChart = new Chart(ctx, {
      type: 'pie',
      data: {
        labels: [
          <?php foreach ($grafik1 as $grafik1_item): ?> '<?= esc($grafik1_item['kecamatan']) . ' (' . esc($grafik1_item['jumlah']) . ')' ?>',
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
  </script>

<?php endif; ?>