<?php include($_SERVER['DOCUMENT_ROOT'] . '/WebApp/Views/layouts/components/header.php')?>
<div class="wrapper m-5">
    <div class="content">
        <div class="filter card">
            <div class="card-header d-flex align-items-center">
                <p class="mb-0 flex-grow-1"><?php echo $title;?></p>
                
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                
                <a href="counterparty/create" class="btn btn-success">Створити</a>
                </div>
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
                    <th scope="col">Назва/Ім`я</th>
                    <th scope="col">Повна назва/ім`я</th>
                    <th scope="col">Тел.</th>
                    <th scope="col">Тип відносин</th>
                    <th scope="col">Замітка</th>
                  </tr>
                </thead>
                <tbody class="table-group-divider">
                    <?php foreach($counterparties as $counterparty) {?>

                    <tr <?php $trClass = $counterparty->counterparty_relation_id === 1 
                        || $counterparty->counterparty_relation_id === 2 
                        || $counterparty->counterparty_relation_id === 3 
                        ? 'class="table-success"' 
                        : null; echo $trClass;
                        ?> >
                    <th scope="row"><?php echo '<a href="/counterparty/'.$counterparty->id.'" class="link-primary link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">'.$counterparty->name.'</a>';?></th>
                    <td><?php echo $counterparty->full_name;?></td>
                    <td><?php echo $counterparty->phone;?></td>
                    <td><?php echo $counterparty->counterparty_relation->name;?></td>
                    <th><?php echo $counterparty->description;?></th>
                  </tr>
                  <?php }; ?>
                </tbody>
              </table>
        </div>
    </div>
</div>