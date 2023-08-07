<?php 
include($_SERVER['DOCUMENT_ROOT'] . '/WebApp/Views/layouts/components/header.php');
include($_SERVER['DOCUMENT_ROOT'] . '/WebApp/Views/layouts/components/backButton.php');
$terminal = $data['terminal'];
$bodies = $data['bodies'];
$settlements = $data['settlements'];
$counterparties = $data['counterparties'];
?>
<div class="wrapper m-5">
    <div class="content">
        <form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="POST">
            <div class="filter card border
                <?php $border = $terminal->is_active ? 'border-success' : 'border-danger'; echo  $border;?>
            ">
                <div class="card-header d-flex align-items-center 
                <?php $border = $terminal->is_active ? 'border-bottom border-success-subtle' : 'border-bottom border-danger-subtle'; echo  $border;?> 
                ">
                    <a href="<?php backButton('/terminal/'.$terminal->id); ?>">
                    <i class="bi bi-arrow-left-square h3 me-3 text-info btn btn-outline-secondary"></i>
                    </a>
                    <p class="mb-0 flex-grow-1"><?php echo $title;?></p>
                    
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <button type="submit" class="btn btn-success">Зберегти</button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-header">
                                    <label for="settlement" class="form-label">Регіон \ Місто \ Село</label>
                                </div>
                                <div class="card-body">
                                    <select class="form-select" id="type" aria-label="Default select example" name='settlement_id'>
                                        <?php foreach($settlements as $settlement) {?>
                                            <option value="<?php echo $settlement->id;?>" <?php if($terminal->settlement_id == $settlement->id) echo 'selected';?>>
                                                <?php echo $settlement->name. ' / ' .$settlement->region->name;?></option>
                                        <?php }?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-header">
                                    <label for="address" class="form-label">Адреса</label>
                                </div>
                                <div class="card-body">
                                    <input type="text" class="form-control" id="address" value="<?php echo  $terminal->address;?>"  name='address'>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-header">
                                    <label for="counterparty" class="form-label">Контрагент</label>
                                </div>
                                <div class="card-body">
                                    <select class="form-select" id="counterparty" aria-label="Default select example" name='counterparty_id'>
                                        <?php foreach($counterparties as $counterparty) {?>
                                            <option value="<?php echo $counterparty->id;?>" <?php if($terminal->counterparty_id == $counterparty->id) echo 'selected';?>>
                                                <?php echo $counterparty->name. ' / ' .$counterparty->full_name. ' / ' .$counterparty->counterparty_relation->name;?></option>
                                        <?php }?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-2">
                            <div class="card">
                                <div class="card-header">
                                    <label for="bodytype" class="form-label">Статус точки</label>
                                </div>
                                <div class="card-body">
                                    <div class="form-check">
                                        <input type="radio" class="btn-check" name="is_active" value="1" id="success-outlined" autocomplete="off" 
                                            <?php if($terminal->is_active) echo 'checked' ?>
                                        >
                                        <label class="btn btn-outline-success" for="success-outlined">Активний</label>

                                        <input type="radio" class="btn-check" name="is_active" value="0" id="danger-outlined" autocomplete="off" 
                                        <?php if(!$terminal->is_active) echo 'checked' ?>
                                        >
                                        <label class="btn btn-outline-danger" for="danger-outlined">Не активний</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="card">
                                <div class="card-header">
                                    <label for="bodytype" class="form-label">Тип терміналу</label>
                                </div>
                                <div class="card-body">
                                    <div class="form-check">
                                        <input type="radio" class="btn-check" name="is_outdoor" value="1" id="primary-warning" autocomplete="off" 
                                            <?php if($terminal->is_outdoor) echo 'checked' ?>
                                        >
                                        <label class="btn btn-outline-warning" for="primary-warning">Вуличний</label>

                                        <input type="radio" class="btn-check" name="is_outdoor" value="0" id="danger-info" autocomplete="off" 
                                            <?php if(!$terminal->is_outdoor) echo 'checked' ?>
                                        >
                                        <label class="btn btn-outline-info" for="danger-info">Внутрішній</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-header">
                                <label for="body" class="form-label">Корпус</label>
                                </div>
                                <div class="card-body">
                                    <select class="form-select" id="body" aria-label="Default select example" name='body_id'>
                                        <?php foreach($bodies as $body) {?>
                                            <option value="<?php echo $body->id;?>" <?php if($terminal->body[0]->id == $body->id) echo 'selected';?>>
                                                <?php echo $body->inventory_number. ' / ' .$body->bodytype->type. ' ' .$body->bodytype->diagonal.'"';?></option>
                                        <?php }?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-header">
                                    <label for="phone" class="form-label">Телефон</label>
                                </div>
                                <div class="card-body">
                                    <input type="text" class="form-control" id="phone" value="<?php echo  $terminal->phone;?>" name='phone'>
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
                                        <textarea rows="3" type="tex" class="form-control" id="description" name='description'><?php echo $terminal->description;?></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
