<?php if ($daftar_tiang !== []): ?>

    <?php foreach ($daftar_tiang as $tiang_item): ?>
        <p>
        ID : <?= esc($tiang_item['id_tiang']) ?><br>
        No : <?= esc($tiang_item['no_tiang']) ?><br>
        Latitude : <?= esc($tiang_item['latitude']) ?><br>
        Longitude : <?= esc($tiang_item['longitude']) ?>
        </p>
       
    <?php endforeach ?>

<?php else: ?>

    <h3>No News</h3>

    <p>Unable to find any news for you.</p>

<?php endif ?>