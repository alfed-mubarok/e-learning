<?= $this->extend('guru/layout/templateguru') ?>
<?= $this->section('isi') ?>

<style>
  .chat-container {
    max-height: 350px;
    overflow-y: auto;
    background: #fff;
    padding: 15px;
    border: 1px solid #dee2e6;
    border-radius: 8px;
    margin-bottom: 20px;
  }

  .chat-group {
    display: flex;
    margin-bottom: 15px;
    align-items: flex-start;
  }

  .chat-group.left {
    flex-direction: row;
  }

  .chat-group.right {
    flex-direction: row-reverse;
  }

  .avatar {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    object-fit: cover;
    margin: 0 10px;
  }

  .chat-bubbles {
    display: flex;
    flex-direction: column;
    gap: 5px;
    max-width: 70%;
  }

  .chat-name {
    font-weight: bold;
    font-size: 0.9rem;
    color: #555;
    margin-bottom: 5px;
  }

  .chat-time {
    font-size: 0.8rem;
    color: #888;
    margin-left: 8px;
  }

  .chat-bubble {
    background-color: #f1f3f4;
    padding: 10px 15px;
    border-radius: 15px;
    display: inline-block;
    max-width: 100%;
    word-wrap: break-word;
  }

  .chat-group.right .chat-bubbles {
    align-items: flex-end;
    text-align: right;
  }

  .chat-group.right .chat-bubble {
    background-color: #007bff;
    color: white;
  }

  .chat-group.right .chat-name {
    text-align: right;
  }

  /* Input Form */
  .chat-input-form {
    display: flex;
    align-items: center;
    gap: 10px;
  }

  .chat-input-form input[type="text"] {
    flex-grow: 1;
    padding: 10px;
    border-radius: 25px;
    border: 1px solid #ccc;
    outline: none;
  }

  .chat-input-form button {
    background-color: #007bff;
    border: none;
    color: white;
    padding: 10px 16px;
    border-radius: 25px;
    cursor: pointer;
  }

  .chat-input-form button:hover {
    background-color: #0056b3;
  }
</style>



<div class="container-fluid">
  <div class="d-flex justify-content-between align-items-center mb-2">
    <h3 class="text-gray-800 mb-0">Diskusi - <?= esc($materi['judul']) ?></h3>
    <a href="<?= base_url('guru/materi') ?>" class="btn btn-dark btn-sm">Kembali</a>
  </div>
  <div class="chat-container">

    <?php
    $prevUser = null;
    $prevTime = null;
    $openGroup = false;

    foreach ($pesan as $index => $p):
      $isCurrentUser = $p['id_user'] == session()->get('id_user');
      $direction = $isCurrentUser ? 'right' : 'left';
      $isNewGroup = $prevUser !== $p['id_user'] || (strtotime($p['created_at']) - strtotime($prevTime) > 300);

      if ($isNewGroup):
        if ($openGroup) echo '</div></div>'; // Tutup grup lama jika ada
        $openGroup = true;
    ?>
        <div class="chat-group <?= $direction ?>">
          <img class="avatar"
            src="<?= base_url(($p['role'] === 'guru' ? 'guru/' : 'siswa/') . $p['foto']) ?>"
            onerror="this.src='<?= base_url('img/undraw_profile.svg') ?>';"
            alt="Foto">

          <div class="chat-bubbles">
            <div class="chat-name">
              <?= esc($p['nama']) ?>
              <span class="chat-time"><?= date('d M Y H:i', strtotime($p['created_at'])) ?></span>
            </div>
          <?php endif; ?>
          <div class="chat-bubble"><?= esc($p['isi_pesan']) ?></div>
        <?php
        $prevUser = $p['id_user'];
        $prevTime = $p['created_at'];

        $next = $pesan[$index + 1] ?? null;
        $nextUser = $next['id_user'] ?? null;
        $nextTime = $next['created_at'] ?? null;

        $nextIsNewGroup = $nextUser !== $p['id_user'] || (strtotime($nextTime) - strtotime($p['created_at']) > 300);

        if ($nextIsNewGroup) {
          echo '</div></div>'; // Tutup grup kalau selanjutnya beda user/waktu
          $openGroup = false;
        }
      endforeach;

      if ($openGroup) echo '</div></div>'; // Tutup jika terakhir belum ditutup
        ?>
          </div>

          <!-- Form Kirim Chat -->
          <form class="chat-input-form" action="<?= base_url('diskusi/kirim') ?>" method="post">
            <input type="hidden" name="id_materi" value="<?= $id_materi ?>">
            <img src="<?= base_url('guru/' . session()->get('foto_guru')) ?>"
              onerror="this.src='<?= base_url('img/undraw_profile.svg') ?>';"
              style="width: 40px; height: 40px; object-fit: cover;">
            <input type="text" name="isi_pesan" placeholder="Tambahkan komentar kelas..." required>
            <button type="submit">
              <i class="fas fa-paper-plane"></i>
            </button>
          </form>
          <script>
            window.onload = function() {
              const container = document.querySelector('.chat-container');
              if (container) {
                container.scrollTop = container.scrollHeight;
              }
            };
          </script>

          <?= $this->endSection() ?>