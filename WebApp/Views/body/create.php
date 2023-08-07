<?php 
include($_SERVER['DOCUMENT_ROOT'] . '/WebApp/Views/layouts/components/header.php');
include($_SERVER['DOCUMENT_ROOT'] . '/WebApp/Views/layouts/components/backButton.php');
?>
<div class="wrapper m-5">
    <div class="content">
        <form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="POST">
            <div class="filter card border">
                <div class="card-header d-flex align-items-center">
                    <a href="<?php backButton('/case/'); ?>">
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
                                        <?php $this->viewForms->selectOptions($selectFormOptions['terminals'], 'terminals')?>
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
                                        <?php $this->viewForms->selectOptions($selectFormOptions['bodytypes'], 'bodytypes')?>
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
