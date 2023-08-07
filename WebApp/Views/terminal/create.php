<?php 
include($_SERVER['DOCUMENT_ROOT'] . '/WebApp/Views/layouts/components/header.php');
include($_SERVER['DOCUMENT_ROOT'] . '/WebApp/Views/layouts/components/backButton.php');
?>
<div class="wrapper m-5">
    <div class="content">
    <form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="POST">
            <div class="filter card border">
                <div class="card-header d-flex align-items-center">
                    <a href="<?php backButton('/terminal'); ?>">
                    <i class="bi bi-arrow-left-square h3 me-3 text-info btn btn-outline-secondary"></i>
                    </a>
                    <p class="mb-0 flex-grow-1 h3"><?php echo $title;?></p>
                    
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    
                    <button type="submit" class="btn btn-success">Зберегти</button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-2">
                            <div class="card">
                                <div class="card-header">
                                    <label for="number" class="form-label">Номер</label>
                                </div>
                                <div class="card-body">
                                    <input type="text" class="form-control" id="number"  name='number'>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="card">
                                <div class="card-header">
                                    <label for="settlement" class="form-label">Регіон \ Місто \ Село</label>
                                </div>
                                <div class="card-body">
                                    <select class="form-select" id="type" aria-label="Default select example" name='settlement_id'>
                                        <?php $this->viewForms->selectOptions($selectFormOptions['settlements'], 'settlements')?>
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
                                    <input type="text" class="form-control" id="address"  name='address'>
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
                                        <?php $this->viewForms->selectOptions($selectFormOptions['counterparties'], 'counterparties')?>
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
                                        <input type="radio" class="btn-check" name="is_active" value="1" id="success-outlined" autocomplete="off">
                                        <label class="btn btn-outline-success" for="success-outlined">Активний</label>

                                        <input type="radio" class="btn-check" name="is_active" value="0" id="danger-outlined" autocomplete="off">
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
                                        <input type="radio" class="btn-check" name="is_outdoor" value="1" id="primary-warning" autocomplete="off">
                                        <label class="btn btn-outline-warning" for="primary-warning">Вуличний</label>

                                        <input type="radio" class="btn-check" name="is_outdoor" value="0" id="danger-info" autocomplete="off">
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
                                        <?php $this->viewForms->selectOptions($selectFormOptions['bodies'], 'bodies')?>
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
                                    <input type="text" class="form-control" id="phone" value="" name='phone'>
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
                                        <textarea rows="3" type="tex" class="form-control" id="description" name='description'></textarea>
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
