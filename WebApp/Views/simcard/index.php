<?php include($_SERVER['DOCUMENT_ROOT'] . '/WebApp/Views/layouts/components/header.php');
?>
<div class="wrapper m-5">
    <div class="content">
        <div class="filter card">
            <div class="card-header d-flex align-items-center">
                <p class="mb-0 flex-grow-1"><?php echo $title;?></p>
                
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                
                <a href="sim-card/create" class="btn btn-success">Створити</a>
                </div>
            </div>
        </div>
        <div class="table card mt-3">
            <div class="card-header d-flex justify-content-between align-items-center">
                <div>Таблиця</div>
                <div class="input-group w-25">
                    <input type="text" class="form-control table-search" placeholder="Пошук...">
                </div>
            </div>
            <table id="table" class="table table-hover table-bordered">
                <thead>
                  <tr>
                    <th scope="col">Інвертарний номер</th>
                    <th scope="col">Номер Sim</th>
                    <th scope="col">ICC Sim</th>
                    <th scope="col">Корпус</th>
                    <th scope="col">Замітка</th>

                  </tr>
                </thead>
                <tbody class="table-group-divider table-body">
                    <?php foreach($simcards as $sim) {?>

                  <tr>
                    <th scope="row"><?php echo '<a href="/sim-card/'.$sim->id.'" class="link-primary link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover table-cell-number">'.$sim->inventory_number.'</a>';?></th>
                    <td><?php echo $sim->number?></td>
                    <td><?php echo $sim->icc;?></td>
                    <td><?php echo '<a href="/case/'.$sim->body->id.'" class="link-underline-info">'.$sim->body->inventory_number.'</a>';?></td>
                    <td><?php echo $sim->description;?></td>
                  </tr>
                  <?php };?>
                </tbody>
              </table>
                <?php 
                  include($_SERVER['DOCUMENT_ROOT'] . '/WebApp/Views/layouts/components/mainTablePagination.php');
                ?>
        </div>
    </div>
</div>