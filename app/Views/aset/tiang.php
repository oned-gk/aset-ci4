<h2><?= esc($title) ?></h2>
<a href="tiang/new" class="btn btn-success btn-sm">Tambah tiang baru</a>
<div class="table-responsive small">
  <table class="table table-striped table-sm">
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">Nomor Tiang</th>
        <th scope="col">Latitude</th>
        <th scope="col">Longitute</th>
        <th scope="col">Foto</th>
      </tr>
    </thead>
    <tbody>
      <?php if ($daftar_tiang !== []): ?>
        <?php $urut = 1 + ($currentPage - 1) * 10; ?>
        <?php foreach ($daftar_tiang as $tiang_item): ?>
          <tr>
            <td><?= $urut++; ?></td>
            <td><a href="/tiang/<?= esc($tiang_item['id_tiang'], 'url') ?>"><?= esc($tiang_item['no_tiang']) ?></a></td>
            <td><?= esc($tiang_item['latitude']) ?></td>
            <td><?= esc($tiang_item['longitude']) ?></td>
            <td>-</td>
          </tr>
        <?php endforeach ?>
    </tbody>
  </table>


  <?= $pager->links('tiang', 'bootstrap_full') ?>

  <?php if (session()->getFlashdata('pesan')) : ?>
    <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
    <div id="liveToast" class="toast show" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="10000" data-bs-autohide="true">
      <div class="toast-header bg-primary text-white">
        <span class="bi bi-info-circle-fill mr-2"></span>
        <strong class="me-auto">Pesan</strong>
        <!-- <small>11 mins ago</small> -->
        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
      </div>
      <div class="toast-body">
          <?= session()->getFlashdata('pesan')?>
      </div>
    </div>
  </div>
  <?php endif; ?>

<?php else: ?>

  <h3>No News</h3>

  <p>Unable to find any news for you.</p>

<?php endif ?>