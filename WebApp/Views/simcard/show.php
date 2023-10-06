<?php 
include($_SERVER['DOCUMENT_ROOT'] . '/WebApp/Views/layouts/components/header.php');
include($_SERVER['DOCUMENT_ROOT'] . '/WebApp/Views/layouts/components/backButton.php');
?>

<div class="wrapper m-5">
    <div class="content">
        <div class="filter card">
            <div class="card-header d-flex align-items-center">
                <a href="/sim-card">
                <i class="bi bi-arrow-left-square h3 me-3 text-info btn btn-outline-secondary"></i>
                </a>
                <p class="mb-0 flex-grow-1"><?php echo $title;?></p>
                    
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <a href="edit/<?php echo $simcard->id;?>" class="btn btn-primary">Редагувати</a>
                </div>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                Sim Номер
                            </div>
                            <div class="card-body">
                                <p class="card-text text-center"><?php echo $simcard->number;?></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                ICC
                            </div>
                            <div class="card-body">
                                <p class="card-text text-center"><?php echo $simcard->icc;?></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                Корпус
                            </div>
                            <div class="card-body">
                                <p class="card-text text-center">
                                    <?php echo '<a href="/case/'.$simcard->body->id.'" class="link-underline-info">'.$simcard->body->inventory_number.'</a>';?>
                                </p>
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
                                <p class="card-text text-center"><?php echo $simcard->description;?></p>
                            </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
