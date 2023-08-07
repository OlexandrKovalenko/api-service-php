<?php 
include($_SERVER['DOCUMENT_ROOT'] . '/WebApp/Views/layouts/components/header.php');
include($_SERVER['DOCUMENT_ROOT'] . '/WebApp/Views/layouts/components/backButton.php');
$counterparty = $data['counterparty'];
$relations = $data['relations'];
?>
<div class="wrapper m-5">
    <div class="content">
        <form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="POST">
            <div class="filter card">
                <div class="card-header d-flex align-items-center">
                    <a href="<?php backButton('/counterparty/'.$counterparty->id); ?>">
                    <i class="bi bi-arrow-left-square h3 me-3 text-info btn btn-outline-secondary"></i>
                    </a>
                    <p class="mb-0 flex-grow-1"><?php echo $title;?></p>
                        
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <button type="submit" class="btn btn-success">Зберегти</button>
                    </div>
                </div>

                <div class="card-body">
                    <div class="row mb-3 d-flex align-items-center">
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-header">
                                    Ім`я / Повне ім`я
                                </div>
                                <div class="card-body">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Ім`я / Назва</label>
                                        <input type="text" class="form-control" id="name" name="name" value="<?php echo $counterparty->name?>">
                                    </div>
                                    <div class="mb-3">
                                        <label for="fullname" class="form-label">Повне ім`я / назва</label>
                                        <input type="text" class="form-control" id="fullname" name="full_name" value="<?php echo  $counterparty->full_name;?>">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-header">
                                <label for="relation" class="form-label">Тип відносин</label>
                                </div>
                                <div class="card-body">
                                    <select class="form-select" id="relation" aria-label="Default select example" name="counterparty_relation_id">
                                        <?php foreach($relations as $relation) {?>
                                            <option value="<?php echo $relation->id;?>" <?php if($counterparty->counterparty_relation_id == $relation->id) echo 'selected';?>>
                                                <?php echo $relation->name;?></option>
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
                                    <div class="mb-3">
                                        <input type="text" name="phone" class="form-control" id="phone" value="<?php echo $counterparty->phone;?>">
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
                                        <textarea name="description" rows="3" type="tex" class="form-control" id="description"><?php echo $counterparty->description;?></textarea>
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
