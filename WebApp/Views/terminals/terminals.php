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
                    <th scope="col">Тип</th>
                  </tr>
                </thead>
                <tbody class="table-group-divider">
                    <?php foreach($terminals as $terminal) {?>

                  <tr <?php if(!$terminal->is_active) echo 'class="table-secondary"'; ?> >
                    <th scope="row"><?php echo '<a href="terminals/'.$terminal->id.'" class="link-primary link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">'.$terminal->number.'</a>';?></th>
                    <td><?php echo '<a href="counterparties/'.$terminal->counterparty->id.'" class="link-underline-info">'.$terminal->counterparty->name.'</a>';?></td>
                    <td><?php echo $terminal->settlement->name?></td>
                    <td><?php echo $terminal->address;?></td>
                    <th><?php echo $terminal->phone;?></th>
                    <td>
                        <?php $var = $terminal->is_outdoor ? 'Вулиця' : 'Внутрішній';

                            echo '<a href="case/'.$terminal->body[0]->id.'" class="link-underline-info">'.$terminal->body[0]->inventory_number.'</a>' .' / '. $var;
                        ?>
                    </td>
                  </tr>
                  <?php }; ?>
                </tbody>
              </table>
        </div>
    </div>
</div>