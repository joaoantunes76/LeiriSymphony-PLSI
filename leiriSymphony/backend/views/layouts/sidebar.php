<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="<?= $assetDir ?>/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">LeiriSymphony</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?= $assetDir ?>/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Administrador</a>
            </div>
        </div>

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
                    [
                        'label' => 'Administração',
                        'icon' => 'tachometer-alt',
                        'items' => [
                            ['label' => 'Home', 'url' => ['site/index'], 'iconStyle' => 'far'],
                            ['label' => 'Users', 'url' => ['user/index'], 'iconStyle' => 'far'],
                            ['label' => 'Eventos', 'url' => ['eventos/index'], 'iconStyle' => 'far'],
                        ]
                    ],
                    [
                        'label' => 'Gestão de loja',
                        'icon' => 'tachometer-alt',
                        'items' => [
                            ['label' => 'Home', 'url' => ['site/index'], 'iconStyle' => 'far'],
                            ['label' => 'Marcas', 'url' => ['marcas/index'], 'iconStyle' => 'far'],
                            ['label' => 'Categorias', 'url' => ['categorias/index'], 'iconStyle' => 'far'],
                            ['label' => 'SubCategorias', 'url' => ['subcategorias/index'], 'iconStyle' => 'far'],
                            ['label' => 'Produtos', 'url' => ['produtos/index'], 'iconStyle' => 'far'],
                            ['label' => 'Artistas', 'url' => ['#'], 'iconStyle' => 'far'],
                            ['label' => 'Álbuns', 'url' => ['#'], 'iconStyle' => 'far'],
                            ['label' => 'Músicas', 'url' => ['#'], 'iconStyle' => 'far'],
                            ['label' => 'Imagens', 'url' => ['imagens/index'], 'iconStyle' => 'far'],
                            ['label' => 'Encomendas', 'url' => ['encomendas/index'], 'iconStyle' => 'far'],
                        ]
                    ],
                    [
                        'label' => 'Apoio ao Cliente',
                        'icon' => 'tachometer-alt',
                        'items' => [
                            ['label' => 'Home', 'url' => ['site/index'], 'iconStyle' => 'far'],
                            ['label' => 'Pedidos de Contacto', 'url' => ['#'], 'iconStyle' => 'far'],
                            ['label' => 'Encomendas', 'url' => ['encomendas/index'], 'iconStyle' => 'far'],
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