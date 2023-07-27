<?php include($_SERVER['DOCUMENT_ROOT'] . '/WebApp/Views/layouts/components/header.php')?>
<div class="wrapper m-5">
    <div class="content">
        <div class="filter card border
            <?php $border = $terminal->is_active ? 'border-success' : 'border-danger'; echo  $border;?>
        ">
            <div class="card-header d-flex align-items-center 
            <?php $border = $terminal->is_active ? 'border-bottom border-success-subtle' : 'border-bottom border-danger-subtle'; echo  $border;?> 
            ">
                <a href="/terminal">
                <i class="bi bi-arrow-left-square h3 me-3 text-info btn btn-outline-secondary"></i>
                </a>
                <p class="mb-0 flex-grow-1"><?php echo $title;?></p>
                
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <form action = '/terminal/activate/<?php echo $terminal->id;?>' method="POST">
                    <?php $activeteBtn = $terminal->is_active
                        ? '<button class="btn btn-outline-danger me-md-2" type="submit">Деактивувати</button><input type="text" name="is_active" value="0" value hidden>'
                        : '<button class="btn btn-outline-success me-md-2" type="submit">Активувати</button><input type="text" name="is_active" value = "1" hidden>';
                        echo $activeteBtn;
                        ?>
                </form>
                <a href="edit/<?php echo $terminal->id;?>" class="btn btn-primary">Редагувати</a>
                </div>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                Регіон \ Місто \ Село
                            </div>
                            <div class="card-body">
                                <p class="card-text text-center"><?php echo $terminal->settlement->region->name. ' \ '.$terminal->settlement->name;?></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                Адреса
                            </div>
                            <div class="card-body">
                                <p class="card-text text-center"><?php echo $terminal->address;?></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                Контрагент
                            </div>
                            <div class="card-body">
                                <p class="card-text text-center"><?php echo '<a href="/counterparty/'.$terminal->counterparty_id.'" class="link-primary link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">'.$terminal->counterparty->name. ' \ '.$terminal->counterparty->counterparty_relation->name.'</a>';?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                Тип корпусу
                            </div>
                            <div class="card-body">
                                <p class="card-text text-center"><?php echo $terminal->body[0]->bodytype->type. ' \ '.$terminal->body[0]->bodytype->diagonal.'"'?></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                Корпус
                            </div>
                            <div class="card-body">
                                <p class="card-text text-center"><?php echo '<a href="/case/'.$terminal->body[0]->id.'" class="link-primary link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">'.$terminal->body[0]->inventory_number.'</a>';?></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                Телефон
                            </div>
                            <div class="card-body">
                                <p class="card-text text-center"><?php echo $terminal->phone;?></p>
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
                                <p class="card-text text-center"><?php echo $terminal->description;?></p>
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
