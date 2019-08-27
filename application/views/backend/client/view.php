<?php
$this->title = 'Просмотр пользователя';
?>
<div class="content-wrapper">
    <div class="container-fluid">
        <div class="card mb-3">
            <div class="card-header"><?= $this->title ?></div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-4">
                        <table class="table">
							<img src="/./<?= $data->img ?>" class="card-img ">            
                            <tr>
                                <th>Логин</th>
                                <td><?= $data->login ?></td>
                            </tr>
                            <tr>
                                <th>E-mail</th>
                                <td><?= $data->email ?></td>                                
                            </tr>
                            <tr>
                                <th>Страна</th>
                                <td><?= $data->country ?></td>                                
                            </tr>                   
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
