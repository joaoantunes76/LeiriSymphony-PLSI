<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?= \yii\helpers\Url::toRoute('site/index') ?>" class="brand-link">
        <img src="<?=  \Yii::getAlias('@web') ?>/logo.png" alt="AdminLTE Logo" class="brand-image ">
        <br>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- SidebarSearch Form -->
        <!-- href be escaped -->
        <!-- <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div> -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <?php
            echo \hail812\adminlte\widgets\Menu::widget([
                'items' => [
                    ['label' => 'Home', 'url' => ['site/index'], 'iconStyle' => 'far'],
                    [
                        'label' => 'Administração',
                        'icon' => 'tachometer-alt',
                        'items' => [
                            ['label' => 'Users', 'url' => ['user/index'], 'iconStyle' => 'far'],
                            ['label' => 'Eventos', 'url' => ['eventos/index'], 'iconStyle' => 'far'],
                        ]
                    ],
                    [
                        'label' => 'Gestão de loja',
                        'icon' => 'tachometer-alt',
                        'items' => [
                            ['label' => 'Marcas', 'url' => ['marcas/index'], 'iconStyle' => 'far'],
                            ['label' => 'Categorias', 'url' => ['categorias/index'], 'iconStyle' => 'far'],
                            ['label' => 'SubCategorias', 'url' => ['subcategorias/index'], 'iconStyle' => 'far'],
                            ['label' => 'Produtos', 'url' => ['produtos/index'], 'iconStyle' => 'far'],
                            ['label' => 'Artistas', 'url' => ['artistas/index'], 'iconStyle' => 'far'],
                            ['label' => 'Álbuns', 'url' => ['albuns/index'], 'iconStyle' => 'far'],
                            ['label' => 'Encomendas', 'url' => ['encomendas/index'], 'iconStyle' => 'far'],
                        ]
                    ],
                    [
                        'label' => 'Apoio ao Cliente',
                        'icon' => 'tachometer-alt',
                        'items' => [
                            ['label' => 'Pedidos de Contacto', 'url' => ['pedidosdecontacto/index'], 'iconStyle' => 'far'],
                            ['label' => 'Tipos de Contacto', 'url' => ['tipoinformacoes/index'], 'iconStyle' => 'far'],
                        ]
                    ],
                    ['label' => 'Yii2 PROVIDED', 'header' => true],
                    ['label' => 'Login', 'url' => ['site/login'], 'icon' => 'sign-in-alt', 'visible' => Yii::$app->user->isGuest],
                    ['label' => 'Gii',  'icon' => 'file-code', 'url' => ['/gii'], 'target' => '_blank'],
                    ['label' => 'Debug', 'icon' => 'bug', 'url' => ['/debug'], 'target' => '_blank'],
                ],
            ]);
            ?>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>