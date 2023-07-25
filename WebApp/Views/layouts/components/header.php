<header class="p-3 text-bg-dark">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
            <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"/></svg>
        </a>

        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
            <li><a href="/" class="nav-link px-2 text-secondary">Головна</a></li>
            <li><a href="/counterparty" class="nav-link px-2 text-white">Контрагенти</a></li>
            <li><a href="/terminal" class="nav-link px-2 text-white">Термінали</a></li>
            <li><a href="/equipment" class="nav-link px-2 text-white">Інвентар</a></li>
            <li><a href="/case" class="nav-link px-2 text-white">Корпуси</a></li>
            <li><a href="/sim-card" class="nav-link px-2 text-white">Sim-Карти</a></li>
        </ul>

        <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" role="search">
            <input type="search" class="form-control form-control-dark text-bg-dark" placeholder="Search..." aria-label="Search">
        </form>

        <div class="text-end d-flex">
            <button type="button" class="btn btn-outline-light me-3">Пошук</button>
            <form action="/logout" method="post">
                <button type='submit' class="btn btn-warning ">Вийти</button>
            </form>
        </div>
        </div>
    </div>
</header>