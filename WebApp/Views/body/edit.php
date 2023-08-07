<?php 
include($_SERVER['DOCUMENT_ROOT'] . '/WebApp/Views/layouts/components/header.php');
include($_SERVER['DOCUMENT_ROOT'] . '/WebApp/Views/layouts/components/backButton.php');
$body = $data['body'];
$terminals = $data['terminals'];
$bodytypes = $data['bodytype'];
?>
<div class="wrapper m-5">
    <div class="content">
        <form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="POST">
            <div class="filter card border">
                <div class="card-header d-flex align-items-center">
                    <a href="<?php backButton('/case/'.$body->id); ?>">
                    <i class="bi bi-arrow-left-square h3 me-3 text-info btn btn-outline-secondary"></i>
                    </a>
                    <p class="mb-0 flex-grow-1 h3"><?php echo $title;?></p>
                    
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    
                    <button type="submit" class="btn btn-success">Зберегти</button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <label for="terminal" class="form-label">Термінал</label>
                                </div>
                                <div class="card-body">
                                    <select class="form-select" id="terminal" aria-label="Default select example" name='terminal_id'>
                                        <?php foreach($terminals as $terminal) {?>
                                            <option value="<?php echo $terminal->id;?>" <?php if($body->terminal_id == $terminal->id) echo 'selected';?>>
                                                <?php echo $terminal->number;?></option>
                                        <?php }?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <label for="type" class="form-label">Тип корпусу</label>
                                </div>
                                <div class="card-body">
                                    <select class="form-select" id="type" aria-label="Default select example" name='body_type_id'>
                                        <?php foreach($bodytypes as $bodytype) {?>
                                            <option value="<?php echo $bodytype->id;?>" <?php if($body->body_type_id == $bodytype->id) echo 'selected';?>>
                                                <?php echo $bodytype->type. ' / ' .$bodytype->diagonal. '"';?></option>
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
                                        <textarea rows="3" type="tex" class="form-control" id="description" name='description'><?php echo $body->description;?></textarea>
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
                    <?php foreach($body->equipment as $equipment) {?>
                    <tr>
                    <th scope="row">
                        <a href="/equipment/<?php echo $equipment->id; ?>" class="link-primary link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover"><?php echo $equipment->inventory_number?>
                        </a>
                    </th>
                    <td><?php echo $equipment->equipment_type->type. ' / ' .$equipment->equipment_modification->modification;?></td>
                    <td>
                        <?php $dateTime = new DateTime($equipment->updated_at);
                                echo $dateTime->format('d.m.Y H:i:s')?>
                    </td>
                    </tr>
                    <?php }?>
                </tbody>
                </table>
        </div>
    </div>
</div>
