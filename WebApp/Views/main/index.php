<?php 
include($_SERVER['DOCUMENT_ROOT'] . '/WebApp/Views/layouts/components/header.php');
?>
<div class="wrapper m-5">
    <div class="content">
        <div class="card">
            <div class="card-header">
                <ul class="nav nav-underline">
                    <li class="nav-item">
                        <a class="nav-link  active" aria-current="page" href="#historySection">Історія</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="#dataVerificationSection">Дані для перевірки</a>
                    </li>
                </ul>
            </div>
            <div class="card-body" id="historySection">
                <div class="row">
                    <table class="table table-hover table-bordered">
                        <thead>
                            <tr>
                                <th class="col-2" scope="col">#</th>
                                <th class="col-2" scope="col">Контрагент</th>
                                <th class="col-6" scope="col">Опис</th>
                                <th class="col-2" scope="col">Дата</th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider table-body">
                            <?php foreach($history as $row) {?>
                            <th scope="row">
                                <?php 
                                echo '<a href="/equipment/'.$row->equipment_id.'" class="link-primary link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover table-cell-number">'.$row->equipment->inventory_number.'</a>';
                                ?>
                                <i class="bi bi-arrow-right"></i>
                                <?php 
                                    echo '<a href="/case/'.$row->body_id.'" class="link-info link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover table-cell-number">'.$row->body->inventory_number.'</a>';
                                    if($row->body->terminal_id)
                                        echo ' / <a href="/terminal/'.$row->body->terminal_id.'" class="link-info link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover table-cell-number">'.$row->body->terminal->number.'</a>';
                                ?>
                            </th>
                            <td>
                                <i class="bi bi-arrow-right"></i>
                                <?php 
                                echo '<a href="/counterparty/'.$row->counterparty_id.'" class="link-primary link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover table-cell-number">'.$row->counterparty->name.'</a>';
                                ?>
                            </td>
                            <td><?php echo $row->description;?></td>
                            <td>
                            <?php $dateTime = new DateTime($row->updated_at); echo $dateTime->format('Y-m-d H:i:s'). ' (<span class="text-success">'.$row->user->name.'</span>)';?>
                            </td>
                            </tr>
                            <?php }; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="card mt-3" id="dataVerificationSection">
            <div class="card-header">
                <ul class="nav nav-underline">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="#historySection">Історія</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#dataVerificationSection">Дані для перевірки</a>
                    </li>
                </ul>
            </div>
            <div class="card-body">
                <div class="row">
                    <table class="table table-hover table-bordered">
                        <thead>
                            <tr>
                                <th class="col-1" scope="col">#</th>
                                <th class="col-2" scope="col">Адреса</th>
                                <th class="col-6" scope="col">Опис</th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider table-body">
                            <?php foreach($dataVerification as $row) {?>
                            <th scope="row">
                                <?php echo $row->terminal_number;?>
                            </th>
                            <td>
                                <?php echo $row->terminal_address;?>
                            </td>
                            <td>
                                <?php echo $row->descr;?>
                            </td>
                            </tr>
                            <?php }; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>