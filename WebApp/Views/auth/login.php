<div class="login-wrapper d-flex align-items-center py-4 bg-body-tertiary">
    <main class="form-signin w-100 m-auto bg-warning-subtle">
      <form action="/login" method="post">
        <img class="mb-4" src="#" alt="" width="72" height="57">
        <h1 class="h3 mb-3 fw-normal">Вхід</h1>
    
        <div class="form-floating mb-2">
          <input type="text" name="email" class="form-control" id="floatingInput" placeholder="name@example.com">
          <label for="floatingInput">Email address</label>
        </div>
        <div class="form-floating">
          <input type="text" name="password" class="form-control" id="floatingPassword" placeholder="Password">
          <label for="floatingPassword">Password</label>
        </div>
    
<!--         
        <div class="form-check text-start my-3">
          <input class="form-check-input" type="checkbox" value="remember-me" id="flexCheckDefault">
          <label class="form-check-label" for="flexCheckDefault">
            Запам`ятати мене
          </label>
        </div> 
-->
        <button class="btn btn-primary w-100 py-2 mt-2" type="submit">Увійти</button>
      </form>
      <?php if(isset($errors)) {
        echo '<div class="alert alert-danger mt-3" role="alert">';
        foreach($errors as $err){
          echo '- ' .$err. '<br>';
        }
        echo '</div>';
      }
      ?>
    </main>
  </div>