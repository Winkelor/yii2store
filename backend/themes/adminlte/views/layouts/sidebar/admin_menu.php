<?php
use yii\helpers\Url;
?>
<li class="header">Admin</li>
<!-- Optionally, you can add icons to the links -->
<li <!--class="active"-->><a href="<?= Url::to(['/admin/default/index']) ?>"><i class="fa fa-folder"></i> <span>Admin</span></a></li>
<li><a href="<?= Url::to(['/rbac/default/index']) ?>"><i class="fa fa-folder"></i> <span>RBAC GUI</span></a></li>
<li><a href="<?= Url::to(['/admin/rbac']) ?>"><i class="fa fa-folder"></i> <span>RBAC</span></a></li>
<li><a href="<?= Url::to(['/gii']) ?>"><i class="fa fa-gg"></i> <span>gii</span></a></li>
<li><a href="https://almsaeedstudio.com/themes/AdminLTE/"><i class="fa fa-cubes"></i> <span>Admin LTE</span></a></li>
<li class="treeview">
    <a href="#"><i class="fa fa-folder"></i> <span>Users</span>
        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
    </a>
    <ul class="treeview-menu">
        <li><a href="#">Account types</a></li>
        <li><a href="#">Admins</a></li>
        <li><a href="#">Clients</a></li>
    </ul>
</li>