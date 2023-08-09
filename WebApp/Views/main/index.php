<?php include($_SERVER['DOCUMENT_ROOT'] . '/WebApp/Views/layouts/components/header.php');
?>
<div class="wrapper m-5">
    <div class="content">
        <div class="filter card">
            <div class="card-header">
              Історія
            </div>
            <div class="card-body">
                <div class="row">

            
            <table class="table table-hover table-bordered">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Опис</th>
                    <th scope="col">Дата</th>
                  </tr>
                </thead>
                <tbody class="table-group-divider table-body">
                    <?php foreach($history as $row) {?>

                    <th scope="row"><?php echo '<a href="/equipment/'.$row->equipment_id.'" class="link-primary link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover table-cell-number">'.$row->equipment->inventory_number.'</a>';?>
                    </th>
                    <th><?php echo $row->description;?></th>
                    <td>
                    <?php $dateTime = new DateTime($row->updated_at); echo $dateTime->format('Y-m-d H:i:s'). ' ('.$row->user->name.')';?>
                    </td>
                    </tr>
                    <?php }; ?>
                </tbody>
              </table>
        </div>

                </div>
            </div>
        </div>
        <div class="table card mt-3">
            <div class="card-header">
                Головна
            </div>
            
        </div>
    </div>
</div>