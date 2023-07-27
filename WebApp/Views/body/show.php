<?php include($_SERVER['DOCUMENT_ROOT'] . '/WebApp/Views/layouts/components/header.php')?>
<div class="wrapper m-5">
    <div class="content">
        <div class="filter card border">
            <div class="card-header d-flex align-items-center">
                <a href="/body">
                <i class="bi bi-arrow-left-square h3 me-3 text-info btn btn-outline-secondary"></i>
                </a>
                <p class="mb-0 flex-grow-1 h3"><?php echo $title;?></p>
                
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                
                <a href="edit/<?php echo $body->id;?>" class="btn btn-primary">Редагувати</a>
                </div>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                Термінал
                            </div>
                            <div class="card-body">
                                <p class="card-text text-center">    
                                    <a href="/terminal/<?php echo $body->terminal->id;?>" class="link-primary link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">
                                        <?php echo $body->terminal->number?>
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                Тип корпусу
                            </div>
                            <div class="card-body">
                                <p class="card-text text-center"><?php echo $body->bodytype->type. ' / '.$body->bodytype->diagonal;?>"</p>
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
                                <p class="card-text text-center"><?php echo $body->description;?></p>
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
                    <?php foreach($body->equipment as $equipment) {?>
                    <tr>
                    <th scope="row">
                        <a href="/equipment/<?php echo $equipment->id; ?>" class="link-primary link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover"><?php echo $equipment->inventory_number?>
                        </a>
                    </th>
                    <td><?php echo $equipment->equipment_type->type. ' / ' .$equipment->equipment_modification->modification;?></td>
                    <td>
                        <?php 
                        if($equipment->updated_at !== null) {
                            $dateTime = new DateTime($equipment->updated_at);
                            echo $dateTime->format('d.m.Y H:i:s');
                        }
                        ?>
                    </td>
                    </tr>
                    <?php }?>
                </tbody>
                </table>
        </div>
    </div>
</div>
