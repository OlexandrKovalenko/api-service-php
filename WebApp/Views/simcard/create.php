<?php 
include($_SERVER['DOCUMENT_ROOT'] . '/WebApp/Views/layouts/components/header.php');
include($_SERVER['DOCUMENT_ROOT'] . '/WebApp/Views/layouts/components/backButton.php');
?>
<div class="wrapper m-5">
    <div class="content">
    <form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="POST">
            <div class="filter card border">
                <div class="card-header d-flex align-items-center">
                    <a href="<?php backButton('/equipment'); ?>">
                    <i class="bi bi-arrow-left-square h3 me-3 text-info btn btn-outline-secondary"></i>
                    </a>
                    <p class="mb-0 flex-grow-1 h3"><?php echo $title;?></p>
                    
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    
                    <button type="submit" class="btn btn-success">Зберегти</button>
                    </div>
                </div>
                <div class="card-body">

                    <div class="row mb-3 d-flex justify-content-between">
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-header">
                                    <label for="type" class="form-label">Номер Sim</label>
                                </div>
                                <div class="card-body">
                                    <input type="text" class="form-control" id="number" name="number">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-header">
                                    <label for="counterparty" class="form-label">ICC Sim</label>
                                </div>
                                <div class="card-body">
                                    <input type="text" class="form-control" id="icc" name="icc">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-header">
                                    <label for="body" class="form-label">Корпус</label>
                                </div>
                                <div class="card-body">
                                    <p class="card-text text-center">
                                        <select class="form-select" id="body" aria-label="Default select example"  name="body_id">
                                            <?php $this->viewForms->selectOptions($selectFormOptions['bodies'], 'bodies')?>
                                        </select>
                                    </p>
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
                                        <textarea rows="3" type="tex" class="form-control" id="description"  name="description"></textarea>
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
