<?php include($_SERVER['DOCUMENT_ROOT'] . '/WebApp/Views/layouts/components/header.php')?>
<div class="wrapper m-5">
    <div class="content">
        <div class="filter card">
            <div class="card-header">
                Термінали
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3">
                        <label for="lastName" class="form-label">Last name</label>
                            <select class="form-select" id="country" required>
                                <option value="">Choose...</option>
                                <option>United States</option>
                            </select>
                    </div>
                    <div class="col-md-3">
                        <label for="lastName" class="form-label">Last name</label>
                        <select class="form-select" id="country" required>
                            <option value="">Choose...</option>
                            <option>United States</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="lastName" class="form-label">Last name</label>
                        <select class="form-select" id="country" required>
                            <option value="">Choose...</option>
                            <option>United States</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="lastName" class="form-label">Last name</label>
                        <select class="form-select" id="country" required>
                            <option value="">Choose...</option>
                            <option>United States</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="table card mt-3">
            <div class="card-header">
                Таблиця
            </div>
            <table class="table table-hover table-bordered">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Контрагент</th>
                    <th scope="col">Місто</th>
                    <th scope="col">Адреса</th>
                    <th scope="col">Тел.</th>

                  </tr>
                </thead>
                <tbody class="table-group-divider">
                    <?php foreach($equipments as $equipment) {?>

                  <tr>
                    <th scope="row"><?php echo '<a href="equipments/'.$equipment->id.'" class="link-primary link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">'.$equipment->inventory_number.'</a>';?></th>
                    <td><?php echo $equipment->equipment_type->type .' / '. $equipment->equipment_modification->modification ?></td>
                    <td><?php echo $equipment->equipment_status->status;?></td>
                    <td><?php echo '<a href="counterparties/'.$equipment->counterparty->id.'" class="link-underline-info">'.$equipment->counterparty->name.'</a>';?></td>
                    <th><?php echo '<a href="bodies/'.$equipment->body->id.'" class="link-underline-info">'.$equipment->body->inventory_number.'</a> / 
                    <a href="terminals/'.$equipment->body->terminal->id.'" class="link-underline-info">'.$equipment->body->terminal->number.'</a>';?></th>

                  </tr>
                  <?php }; ?>
                </tbody>
              </table>
        </div>
    </div>
</div>