<?php 
$currentUrl = $_SERVER['REQUEST_URI'];
foreach($this->menu as $el){
    if($currentUrl == $el['url'])
        $el['active'] = 'active';
}
?>
<header class="p-3 text-bg-dark">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
            <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"/></svg>
        </a>

        <ul class="nav nav-underline col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-1">
            <?php 
                foreach($this->menu as $el) { 
                    $currentUrl == $el['url'] ? $el['active'] = 'active' : null;
            ?>
                <li><a href="<?php echo $el['url']?>" class="nav-link px-2 text-light <?php echo $el['active'] ?>"><?php echo $el['name']?></a></li>
            <?php }?>
        </ul>
        <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" role="search">
            <input id="search-form" type="search" class="form-control form-control-dark text-bg-dark" placeholder="Search..." aria-label="Search" list="search-list">
        </form>

        <div class="text-end d-flex">
            <button id="search-button" type="button" class="btn btn-outline-light me-3">Пошук</button>
            <form action="/logout" method="post">
                <button type='submit' class="btn btn-warning ">Вийти</button>
            </form>
        </div>
        </div>
    </div>
</header>
<datalist id="search-list">
    <option value="Подсказка 1">
    <option value="Подсказка 2">
    <option value="Подсказка 3">
</datalist>