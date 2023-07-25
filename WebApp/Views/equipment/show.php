<?php include($_SERVER['DOCUMENT_ROOT'] . '/WebApp/Views/layouts/components/header.php')?>
<div class="wrapper m-5">
    <div class="content">
        <div class="filter card border
            <?php $border = $equipment->equipment_status->id === 5 ? 'border-dark' : 'border-info'; echo  $border;?>
        ">
            <div class="card-header d-flex align-items-center 
            <?php $border = $equipment->equipment_status->id === 5 ? 'border-bottom border-dark-subtle' : 'border-bottom border-info-subtle'; echo  $border;?> 
            ">
                <a href="/equipment">
                <i class="bi bi-arrow-left-square h3 me-3 text-info btn btn-outline-secondary"></i>
                </a>
                <p class="mb-0 flex-grow-1"><?php echo $title;?></p>
                
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                
                <a href="edit/<?php echo $equipment->id;?>" class="btn btn-primary">Редагувати</a>
                </div>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-header">
                                Назва, тип, модифікація
                            </div>
                            <div class="card-body">
                                <p class="card-text text-center"><?php echo $equipment->equipment_type->type. ' \ '.$equipment->equipment_modification->modification;?></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-header">
                                Контрагент
                            </div>
                            <div class="card-body">
                                <p class="card-text text-center"><?php echo $equipment->counterparty->name. ' / '.$equipment->counterparty->counterparty_relation->name;?></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-header">
                                Термінал / корпус
                            </div>
                            <div class="card-body">
                                <p class="card-text text-center">
                                    <a href="/case/<?php echo $equipment->body->id;?>" class="link-primary link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">
                                        <?php echo $equipment->body->inventory_number?>
                                    </a>
                                    /
                                    <a href="/terminal/<?php echo $equipment->body->terminal->id;?>" class="link-primary link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">
                                        <?php echo $equipment->body->terminal->number?>
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-header">
                                Статус
                            </div>
                            <div class="card-body">
                                <p class="card-text text-center">
                                    <?php echo $equipment->equipment_status->status;?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                Замітка
                            </div>
                            <div class="card-body">
                                <p class="card-text text-center"><?php echo $equipment->description;?></p>
                            </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="table card mt-3">
            <div class="card-header">
                Устаткування
            </div>
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                    <th scope="col">Номер</th>
                    <th scope="col">Тип</th>
                    <th scope="col">Встановлено</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    <tr>
                    <th scope="row">
                        <a href="#" class="link-primary link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">M000
                        </a>
                    </th>
                    <td>Монітор</td>
                    <td>13.05.2023</td>
                    </tr>
                    <tr>
                    <th scope="row">PC000</th>
                    <td>Принтер</td>
                    <td>1.07.2023</td>
                    </tr>
                </tbody>
                </table>
        </div>
    </div>
</div>
