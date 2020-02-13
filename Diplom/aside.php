<aside class="sidebar">
    <h2 class="name"><?php echo $name = ($employee_id !== null) ? $query->data_employeers->$employee_id->name : null ?></h2>
    <span class="employee"><?php echo $employeeName = ($employee === MANAGER) ? 'Менеджер' : 'Переводчик' ?></span>
    <ul>
        <li><a href="./index.php">Все</a></li>
        <li><a href="./index.php?filter=new">Новые</a></li>
        <li><a href="./index.php?filter=check">На проверке</a></li>
        <li><a href="./index.php?filter=finalize">На доработке</a></li>
        <li><a href="./index.php?filter=done">Готовые</a></li>
        <?php echo $createTask ?>
        <li><a href="./index.php?exit=true">Выход</a></li>
    </ul>
</aside>