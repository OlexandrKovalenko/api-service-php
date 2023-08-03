<?php include($_SERVER['DOCUMENT_ROOT'] . '/WebApp/Views/layouts/components/header.php')?>
<div class="wrapper m-5">
    <div class="content">
        <div class="filter card">
            <div class="card-header d-flex align-items-center">
                <p class="mb-0 flex-grow-1"><?php echo $title;?></p>
                
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                
                <a href="case/create" class="btn btn-success">Створити</a>
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
            <div class="card-header d-flex justify-content-between align-items-center">
                <div>Таблиця</div>
                <div class="input-group w-25">
                    <input type="text" class="form-control table-search" placeholder="Пошук...">
                </div>
            </div>
            <table class="table table-hover table-bordered">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Тип корпусу</th>
                    <th scope="col">Точка</th>
                    <th scope="col">Адреса</th>
                </tr>
                </thead>
                <tbody class="table-group-divider table-body">
                    <?php foreach($bodies as $body) {;?>

                <tr>
                    <th scope="row"><?php echo '<a href="case/'.$body->id.'" class="link-primary link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover table-cell-number">'.$body->inventory_number.'</a>';?></th>
                    <td><?php echo $body->bodytype->type;?></td>
                    <td><?php echo '<a href="terminal/'.$body->terminal->id.'" class="link-underline-info">'.$body->terminal->number.'</a>'?></td>
                    <td><?php echo $body->terminal->settlement->name. ' / ' .$body->terminal->settlement->region->name;?></td>
                </tr>
                    <?php }; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>