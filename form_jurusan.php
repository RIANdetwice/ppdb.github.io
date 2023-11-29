<?php include "header.php"; ?>

    <div class="main-content col-md-9 ms-auto">

        <?php
        $user = new Mdaftar();

        if(isset($_GET["id"])){
            $duser = $user->GetByID($_GET["id"])[0];
            
        }

        $mode = isset($_GET["id"]) ? "edit" : "add";

        ?>

        <div class="title">
            <h2><?= ucwords($mode) ?> Jurusan</h2>
        </div>

        <?php if(isset($_GET["pesan"])){?>
            <div class="alert alert-info" role="alert">
                <?= $_GET ["pesan"] ?>
            </div>
        <?php }  ?>

        <div class="row justify-content-center">
            <div class="col-md-8">
                <form action="action_jurusan.php?ac=<?= $mode ?>" method="post" >
                <div class="mb-3">
                    <label for="nama_jurusan" class="form-label fw-bold">Nama Jurusan</label>
                    <input type="hidden" name="id_jurusan" value="<?= @$duser["id_jurusan"] ?> ">
                    <input type="text" name="nama_jurusan" id="nama_jurusan" class="form-control" value="<?= @$duser["nama_jurusan"] ?> ">
                </div>

                <div class="mb-3">
                    <label for="pagu_jurusan" class="form-label fw-bold">Pagu Jurusan</label>
                    <input type="number" name="pagu_jurusan" id="pagu_jurusan" class="form-control" value="<?= @$duser["pagu_jurusan"] ?> ">
                </div>

                <div class="mb-3">
                    <label for="status_jurusan" class="form-label fw-bold">status_jurusan</label>
                    <select class="form-select" name="status_jurusan" id="status_jurusan">
                        <option <?= @$duser["status_jurusan"] == 1 ? "selected" : "" ?> value="1">Aktif</option>
                        <option <?= @$duser["status_jurusan"] == 0 ? "selected" : "" ?> value="0">Non Aktif</option>
                    </select>
                </div>

                <div class="mb-3">
                    <input type="submit" value="Simpan" class="btn btn-danger">
                </div>

                </form>
            </div>
        </div>

    </div>

    <?php include "footer.php"; ?>