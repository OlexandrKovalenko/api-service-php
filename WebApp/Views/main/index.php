<?php include($_SERVER['DOCUMENT_ROOT'] . '/WebApp/Views/layouts/components/header.php')?>
<div class="wrapper m-5">
    <div class="content">
        <div class="filter card">
            <div class="card-header">
              Featured
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3">
                        <label for="lastName" class="form-label">Last name</label>
                            <select class="form-select" id="country" required>
                                <option value="">Choose...</option>
                                <option>United States</option>
                            </select>
                    </div>
                    <div class="col-md-3">
                        <label for="lastName" class="form-label">Last name</label>
                        <select class="form-select" id="country" required>
                            <option value="">Choose...</option>
                            <option>United States</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="lastName" class="form-label">Last name</label>
                        <select class="form-select" id="country" required>
                            <option value="">Choose...</option>
                            <option>United States</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="lastName" class="form-label">Last name</label>
                        <select class="form-select" id="country" required>
                            <option value="">Choose...</option>
                            <option>United States</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="table card mt-3">
            <div class="card-header">
                Таблиця
            </div>
            <table class="table table-hover table-bordered">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">First</th>
                    <th scope="col">Last</th>
                    <th scope="col">Handle</th>
                  </tr>
                </thead>
                <tbody class="table-group-divider">
                  <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                  </tr>
                  <tr>
                    <th scope="row">2</th>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>@fat</td>
                  </tr>
                  <tr>
                    <th scope="row">3</th>
                    <td colspan="2">Larry the Bird</td>
                    <td>@twitter</td>
                  </tr>
                </tbody>
              </table>
        </div>
    </div>
</div>