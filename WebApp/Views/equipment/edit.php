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
                    <a href="/equipment/">
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
                                    <input type="hidden" name="equipment_type_id" value="<?php echo $equipment->equipment_type_id ?>"/>
                                    <select disabled class="form-select mb-3" id="type" aria-label="Default select example">
                                        <?php foreach($equipmentTypes as $type) {?>
                                            <option value="<?php echo $type->id;?>" <?php if($equipment->equipment_type_id == $type->id) echo 'selected';?>>
                                                <?php echo $type->type;?></option>
                                        <?php }?>
                                    </select>
                                    <select class="form-select" id="modification" aria-label="Default select example" name="equipment_modification_id">
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
                                    <select class="form-select" id="counterparty" aria-label="Default select example"  name="counterparty_id">
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
                                        <select class="form-select" id="body" aria-label="Default select example"  name="body_id">
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
                                        <select class="form-select" id="status" aria-label="Default select example"  name="equipment_status_id">
                                            <?php foreach($statuses as $status) {?>
                                                <option value="<?php echo $status->id;?>" <?php if($equipment->equipment_status_id == $status->id) echo 'selected';?>>
                                                    <?php echo $status->status;?></option>
                                            <?php }?>
                                        </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                <label for="description" class="form-label">Персональна замітка</label>
                                </div>
                                <div class="card-body">
                                    <div class="mb-3">
                                        <textarea rows="3" type="tex" class="form-control" id="description"  name="description"><?php echo $equipment->description;?></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                <label for="description" class="form-label">Історія</label>
                                </div>
                                <div class="card-body">
                                    <div class="mb-3">
                                        <textarea required rows="3" type="tex" class="form-control" id="description"  name="descriptionHistory"></textarea>
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
                    <th scope="col">Корпус</th>
                    <th scope="col">Контрагент</th>
                    <th scope="col">Замітка</th>
                    <th scope="col">Дата</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    <?php foreach($history as $row) { ?>



                    <tr>
                    <th scope="row">
                        <?php if(isset($row->body_id)){?>
                            <a href="/case/<?php echo $row->body_id;?>" class="link-primary link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">
                            <?php echo $row->body->inventory_number;?>
                        </a>
                        <?php } else '-'?>
                    </th>
                    <td>
                        <?php if(isset($row->counterparty_id)){?>
                            <a href="/body/<?php echo $row->counterparty_id;?>" class="link-primary link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">
                            <?php echo $row->counterparty->name;?>
                        </a>
                        <?php } else '-'?>
                    </td>
                    <td>
                    <?php echo $row->description;?>
                    </td>
                    <td>
                    <?php $dateTime = new DateTime($row->updated_at); echo $dateTime->format('Y-m-d H:i:s'). ' ('.$row->user->name.')';?>
                    </td>
                    </tr>

                    <?php }?>
                </tbody>
                </table>
        </div>
    </div>
</div>
