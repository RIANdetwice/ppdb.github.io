<?php include "header.php"; ?>



<div class="main-content col-md-9 ms-auto">
    <div class="title">
        <h2>Data User</h2>
    </div>

    <?php
    $user = new Muser();
    $dataUser = $user->All();
    ?>

    <!-- pesan  -->

    <?php if(isset($_GET["pesan"])){ ?>
        <div class="alert alert-info" role="alert">
            <?= $_GET["pesan"] ?>
        </div>
    <?php } ?>

    <!-- pesan  -->

    <a href="form_user.php" class="btn btn-danger btn-sm mb-3"><i class="fas fa-user-plus"></i> tambah</a>

    <div class="table-responsive">
        <table class="table table-bordered">
            <thead class="bg-danger text-light">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">NAMA</th>
                    <th scope="col">EMAIL</th>
                    <th scope="col">ROLE</th>
                    <th scope="col">STATUS</th>
                    <th scope="col">ACTION</th>
                </tr>
            </thead>
            <tbody class="table-hover">
                    <?php
                    foreach($dataUser as $duser){
                    ?>
                    <tr>
                        <td><?= $duser["id_user"] ?></td>
                        <td><?= $duser["nm_user"] ?></td>
                        <td><?= $duser["email_user"] ?></td>
                        <td><?= $duser["level_user"] ?></td>
                        <td>
                            <?php if($duser["status"]==1){ ?>
                                <span class="badge bg-success">Aktif</span>
                            <?php } else { ?>
                            <span class="badge bg-danger">Non Aktif</span>
                            <?php } ?>
                        </td>
                        <td>
                            <a href="form_user.php?id=<?= $duser["id_user"] ?>" class="btn btn-warning btn-sm"><i class="fas fa-user-edit"></i></a>
                            <a href="action_user.php?id=<?= $duser["id_user"] ?>&ac=delete"  class="btn btn-danger btn-sm"><i class="fas fa-user-times"></i></a>
                        </td>
                    </tr>
                    <?php
                    }
                    ?>
            </tbody>
        </table>
    </div>
    

</div>
<?php include "footer.php"; ?>