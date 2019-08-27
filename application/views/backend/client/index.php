<?php
$this->title = 'Список пользователей';
?>
<div class="content-wrapper">
    <div class="container-fluid">
        <div class="card mb-3">
            <div class="card-header"><?= $this->title ?></div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-4">
                        <?php if (empty($list)): ?>
                            <p>Список пользователей пуст</p>
                        <?php else: ?>
                            <table class="table">
                                <tr>
                                    <th>
                                        <a href="/backend/client/index?page=<?= $page ?>&sort=<?= $sort ?>&order=<?= $order ?>">Логин</a>
                                    </th>
                                    <th>
                                        <a href="/backend/client/index?page=<?= $page ?>&sort=<?= $sort ?>&order=<?= $order ?>">E-mail</a>
                                    </th>
                                    <th>
                                        <a href="/backend/client/index?page=<?= $page ?>&sort=<?= $sort ?>&order=<?= $order ?>">Страна</a>
                                    </th>
                                    <th colspan="1">Аватар</th>         
                                    <th colspan="4">Действие</th>
                                </tr>
                                <?php foreach ($list as $val): ?>
                                    <tr>                                	
                                        <td><?php echo htmlspecialchars($val['login'], ENT_QUOTES); ?></td>
                                        <td><?php echo htmlspecialchars($val['email'], ENT_QUOTES); ?></td>
                                        <td><?php echo htmlspecialchars($val['country'], ENT_QUOTES); ?></td>
                                        <td><img src="/./<?php echo htmlspecialchars($val['img'], ENT_QUOTES); ?>" class="card-img"></td>
                                        <td>
                                            <a href="/backend/client/view/<?php echo $val['id']; ?>"
                                               class="btn btn-info">
                                                <span class="fa fa-eye"></span>
                                                Просмотр
                                            </a>
                                        </td>                                      
                                    </tr>
                                <?php endforeach; ?>
                            </table>
                            <?php echo $pagination; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

