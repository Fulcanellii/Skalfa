<div class="container">
    <div class="card card-login mx-auto mt-5">
        <div class="card-header text-center">Регистрация</div>
        <div class="card-body">
            <form action="/auth/reg" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="login">Логин</label>
                    <input class="form-control" id="login" type="text" name="login" placeholder="Введите логин">
                    <div class="invalid-feedback"></div>
                </div>
                <div class="form-group">
                    <label>Пароль</label>
                    <input class="form-control" id="password" type="password" name="password" placeholder="Введите пароль">
                    <div class="invalid-feedback"></div>
                </div>
                <div class="form-group">       
                    <label>E-mail</label>
                    <input class="form-control" id="email" type="email" name="email" placeholder="Введите E-mail">
                    <div class="invalid-feedback"></div>
                </div>         
                <div class="form-group">
                    <label>Страна</label>
                    <select name="country" id="country" class="form-control">
                    	<?php foreach ($list as $key => $val): ?>
                    	<option name="country"><?php echo htmlspecialchars($val, ENT_QUOTES); ?></option>
                    	<?php endforeach; ?>
                    </select>
                    <div class="invalid-feedback"></div>
                </div>
            	
                <div class="form-group">
                <input class="form-control-file" id="img" type="file" name="img">
                <div class="invalid-feedback"></div>
                </div>              
                <button type="submit" class="btn btn-primary btn-block" value="Регистрация">Регистрация</button>
            </form>
        </div>
    </div>
</div>
