<?php include "header.php"; ?>

    <div class="main-content col-md-9 ms-auto">

        <?php
        $user = new Muser();

        if(isset($_GET["id"])){
            $duser = $user->GetByID($_GET["id"])[0];
            print_r($duser);
        }

        $mode = isset($_GET["id"]) ? "edit" : "add";

        ?>

        <div class="title">
            <h2><?= ucwords($mode) ?> User</h2>
        </div>

        <?php if(isset($_GET["pesan"])){?>
            <div class="alert alert-info" role="alert">
                <?= $_GET ["pesan"] ?>
            </div>
        <?php }  ?>

        <div class="row justify-content-center">
            <div class="col-md-8">
                <form action="action_user.php?ac=<?= $mode ?>" method="post" >
                <div class="mb-3">
                    <label for="nm_user" class="form-label fw-bold">Nama</label>
                    <input type="hidden" name="id_user" value="<?= @$duser["id_user"] ?> ">
                    <input type="text" name="nm_user" id="nm_user" class="form-control" value="<?= @$duser["nm_user"] ?> ">
                </div>

                <div class="mb-3">
                    <label for="email_user" class="form-label fw-bold">Email</label>
                    <input type="text" name="email_user" id="email_user" class="form-control" value="<?= @$duser["email_user"] ?> ">
                </div>

                <div class="mb-3">
                    <label for="password_user" class="form-label fw-bold">password</label>
                    <input type="password" name="password_user" id="password_user" class="form-control">
                    <input type="hidden" name="old_password" value="<?= @$duser["password_user"] ?> ">
                </div>

                <div class="mb-3">
                    <label for="level_user" class="form-label fw-bold">Level</label>
                    <select class="form-select" name="level_user" id="level_user">
                        <option <?= @$duser["level_user"] == "Admin" ? "selected" : "" ?> value="Admin">Admin</option>
                        <option <?= @$duser["level_user"] == "User" ? "selected" : "" ?> value="Admin">User</option>
                    </select>
                   
                </div>

                <div class="mb-3">
                    <label for="status" class="form-label fw-bold">status</label>
                    <select class="status" name="status" id="status">
                        <option <?= @$duser["status"] == 1 ? "selected" : "" ?> value="1">Aktif</option>
                        <option <?= @$duser["status"] == 0 ? "selected" : "" ?> value="0">Non Aktif</option>
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