<?php 
include($_SERVER['DOCUMENT_ROOT'] . '/WebApp/Views/layouts/components/header.php');
include($_SERVER['DOCUMENT_ROOT'] . '/WebApp/Views/layouts/components/backButton.php');
$bodies = $selectFormOptions['bodies'];
$statuses = $selectFormOptions['statuses'];

?>
<div class="wrapper m-5">
    <div class="content">
        <form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="POST">
            <div class="filter card">
                <div class="card-header d-flex align-items-center">
                    <a href="<?php backButton('/sim-card/'.$simdata->id); ?>">
                    <i class="bi bi-arrow-left-square h3 me-3 text-info btn btn-outline-secondary"></i>
                    </a>
                    <p class="mb-0 flex-grow-1"><?php echo $title;?></p>
                        
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <button type="submit" class="btn btn-success">Зберегти</button>
                    </div>
                </div>

                <div class="card-body">
                    <div class="row mb-3 d-flex align-items-center">
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-header">
                                    <label for="number" class="form-label">Sim Номер</label>
                                </div>
                                <div class="card-body">
                                    <div class="mb-3">
                                        <input type="text" class="form-control" id="number" name="number" value="<?php echo $simdata->number?>">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-header">
                                <label for="icc" class="form-label">ICC</label>
                                </div>
                                <div class="card-body">
                                    <div class="mb-3">
                                    <input type="text" class="form-control" id="icc" name="icc" value="<?php echo $simdata->icc?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-header">
                                    <label for="phone" class="form-label">Корпус</label>
                                </div>
                                <div class="card-body">
                                    <select class="form-select" id="body" aria-label="Default select example"  name="body_id">
                                            <?php foreach($bodies as $body) {?>
                                                <option value="<?php echo $body->id;?>" <?php if($simdata->body_id == $body->id) echo 'selected';?>>
                                                    <?php echo $body->inventory_number. ' /#' .$body->terminal->number;?></option>
                                            <?php }?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-header">
                                    <label for="phone" class="form-label">Статус</label>
                                </div>
                                <div class="card-body">
                                    <div class="mb-3">
                                        <select class="form-select" id="status" aria-label="Default select example"  name="equipment_status_id">
                                            <?php foreach($statuses as $status) {?>
                                                <option value="<?php echo $status->id;?>" <?php if($simdata->equipment_status_id == $status->id) echo 'selected';?>>
                                                    <?php echo $status->status;?></option>
                                            <?php }?>
                                        </select>
                                    </div>
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
                                        <textarea name="description" rows="3" type="tex" class="form-control" id="description"><?php echo $simdata->description;?></textarea>
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
