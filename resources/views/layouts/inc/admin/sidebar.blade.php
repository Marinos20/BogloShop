<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('dashboard') }}">
                <i class="mdi mdi-view-dashboard menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('orders.index') }}">
                <i class="mdi mdi-cash-register menu-icon"></i>
                <span class="menu-title">Commandes</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('users.index') }}">
                <i class="mdi mdi-account-multiple menu-icon"></i>
                <span class="menu-title">Utilisateurs</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic-category" aria-expanded="false" aria-controls="ui-basic-category">
                <i class="mdi mdi-folder-outline menu-icon"></i>
                <span class="menu-title">Categories</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic-category">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('category.index') }}">Voir la catégorie</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('category.create') }}">Ajouter une catégorie</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic-products" aria-expanded="false" aria-controls="ui-basic-products">
                <i class="mdi mdi-package-variant menu-icon"></i>
                <span class="menu-title">Products</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic-products">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('product.index') }}">Voir le Produit</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('product.create') }}">Ajouter un Produit</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('color.index') }}">
                <i class="mdi mdi-view-carousel menu-icon"></i>
                <span class="menu-title">Couleur</span>
            </a>
        </li>

        <li class="nav-item">
    <a class="nav-link" data-toggle="collapse" href="#ui-basic-blog" aria-expanded="false" aria-controls="ui-basic-blog">
        <i class="mdi mdi-newspaper menu-icon"></i>
        <span class="menu-title">Blog</span>
        <i class="menu-arrow"></i>
    </a>
    <div class="collapse" id="ui-basic-blog">
        <ul class="nav flex-column sub-menu">
            <li class="nav-item"> 
                <a class="nav-link" href="{{ route('admin.blog.index') }}">Voir les articles</a>
            </li>
            <li class="nav-item"> 
                <a class="nav-link" href="{{ route('admin.blog.create') }}">Ajouter un article</a>
            </li>
        </ul>
    </div>
</li>




        <li class="nav-item">
            <a class="nav-link" href="javascript:void(0)">
                <i class="mdi mdi-cog menu-icon"></i>
                <span class="menu-title">Paramètres du site</span>
            </a>
        </li>
        
    </ul>
</nav>
