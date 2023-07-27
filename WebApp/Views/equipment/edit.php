<?php 
include($_SERVER['DOCUMENT_ROOT'] . '/WebApp/Views/layouts/components/header.php');
include($_SERVER['DOCUMENT_ROOT'] . '/WebApp/Views/layouts/components/backButton.php');
$equipment = $data['equipment'];
$counterparties = $data['counterparties'];
$bodies = $data['bodies'];
$statuses = $data['statuses'];
$equipmentTypes = $data['equipmentTypes'];
$modifications = $data['modifications'];
?>
<div class="wrapper m-5">
    <div class="content">
        <form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="POST">
            <div class="filter card border
                <?php $border = $equipment->equipment_status->id === 5 ? 'border-dark' : 'border-info'; echo  $border;?>
            ">
                <div class="card-header d-flex align-items-center 
                <?php $border = $equipment->equipment_status->id === 5 ? 'border-bottom border-dark-subtle' : 'border-bottom border-info-subtle'; echo  $border;?> 
                ">
                    <a href="<? backButton('/equipment/'.$counterparty->id); ?>">
                    <i class="bi bi-arrow-left-square h3 me-3 text-info btn btn-outline-secondary"></i>
                    </a>
                    <p class="mb-0 flex-grow-1"><?php echo $title;?></p>
                    
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    
                    <button type="submit" class="btn btn-success">Зберегти</button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-header">
                                    <label for="type" class="form-label">Назва, тип, модифікація</label>
                                </div>
                                <div class="card-body">
                                    <select class="form-select mb-3" id="type" aria-label="Default select example" name="type">
                                        <?php foreach($equipmentTypes as $type) {?>
                                            <option value="<?php echo $type->id;?>" <?php if($equipment->equipment_type_id == $type->id) echo 'selected';?>>
                                                <?php echo $type->type;?></option>
                                        <?php }?>
                                    </select>
                                    <select class="form-select" id="modification" aria-label="Default select example" name="modification">
                                        <?php foreach($modifications as $mod) {?>
                                            <option value="<?php echo $mod->id;?>" <?php if($equipment->equipment_modification_id == $mod->id) echo 'selected';?>>
                                                <?php echo $mod->modification;?></option>
                                        <?php }?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-header">
                                    <label for="counterparty" class="form-label">Контрагент</label>
                                </div>
                                <div class="card-body">
                                    <select class="form-select" id="counterparty" aria-label="Default select example"  name="counterparty">
                                        <?php foreach($counterparties as $counterparty) {?>
                                            <option value="<?php echo $counterparty->id;?>" <?php if($equipment->counterparty_id == $counterparty->id) echo 'selected';?>>
                                                <?php echo $counterparty->name. ' / ' .$counterparty->full_name. ' / ' .$counterparty->counterparty_relation->name;?></option>
                                        <?php }?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-header">
                                    <label for="body" class="form-label">Корпус / Термінал</label>
                                </div>
                                <div class="card-body">
                                    <p class="card-text text-center">
                                        <select class="form-select" id="body" aria-label="Default select example"  name="body">
                                            <?php foreach($bodies as $body) {?>
                                                <option value="<?php echo $body->id;?>" <?php if($equipment->body_id == $body->id) echo 'selected';?>>
                                                    <?php echo $body->inventory_number. ' /#' .$body->terminal->number. ' / ' .$body->bodytype->type. ' ' .$body->bodytype->diagonal.'"';?></option>
                                            <?php }?>
                                        </select>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-header">
                                    <label for="status" class="form-label">Статус</label>
                                </div>
                                <div class="card-body">
                                    <p class="card-text text-center">
                                        <select class="form-select" id="status" aria-label="Default select example"  name="status">
                                            <?php foreach($statuses as $status) {?>
                                                <option value="<?php echo $status->id;?>" <?php if($equipment->equipment_status_id == $status->id) echo 'selected';?>>
                                                    <?php echo $status->status;?></option>
                                            <?php }?>
                                        </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                <label for="description" class="form-label">Замітка</label>
                                </div>
                                <div class="card-body">
                                    <div class="mb-3">
                                        <textarea rows="3" type="tex" class="form-control" id="description"  name="description"><?php echo $equipment->description;?></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
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
