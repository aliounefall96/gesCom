  <div data-active-color="white" data-background-color="crystal-clear" data-image="assets/img/sidebar-bg/08.jpg" class="app-sidebar">
            <div class="sidebar-header">
                <div class="logo clearfix">
                    <a href="index.html" class="logo-text float-left">
                        <div class="logo-img">
                            <img src="storage/images/{{config('app.logo')}}" alt="Logo"/>
                        </div>
                        <span class="text align-middle text-lowercase">{{config('app.name')}}</span>
                    </a>
                    <a id="sidebarToggle" href="javascript:;" class="nav-toggle d-none d-sm-none d-md-none d-lg-block">
                        <i data-toggle="expanded" class="ft-disc toggle-icon"></i>
                    </a>
                    <a id="sidebarClose" href="javascript:;" class="nav-close d-block d-md-block d-lg-none d-xl-none">
                        <i class="ft-circle"></i>
                    </a>
                </div>
            </div>
            <div class="sidebar-content">
            <div class="nav-container">
                <ul id="main-menu-navigation" data-menu="menu-navigation" class="navigation navigation-main">
                    <li class=" nav-item @if($page === 'home')active @endif "><a href="{{route('home')}}"><i class="icon-home"></i><span class="menu-title">Accueil</span></a>
                    </li>
                    <li class=" nav-item @if($page === 'staticData')active @endif "><a href="{{route('staticData')}}"><i class="fas fa-database"></i><span class="menu-title">Données statiques</span></a>
                    </li>
                    <li class=" nav-item @if($page === 'employe')active @endif "><a href="{{route('employe')}}"><i class="icon-users"></i><span class="menu-title">Employés</span></a>
                    </li>
                    <li class=" nav-item @if($page === 'product')active @endif"><a href="{{route('product')}}"><i class="fab fa-product-hunt"></i><span class="menu-title">Produits/Services</span></a>
                    </li>
                    <li class=" nav-item @if($page === 'task')active @endif"><a href="{{route('task')}}"><i class="fas fa-edit"></i><span class="menu-title">Tâches</span></a>
                    </li>
                    <li class=" nav-item @if($page === 'reunion')active @endif"><a href="{{route('reunion')}}"><i class="fa fa-handshake"></i><span class="menu-title">Réunions</span></a>
                    </li>
                    <li class=" nav-item @if($page === 'historique')active @endif"><a href="{{route('historique')}}"><i class="fas fa-history"></i><span class="menu-title">Historiques</span></a>
                    </li>
                    <li class=" nav-item @if($page === 'client')active @endif"><a href="{{route('client')}}"><i class="fas fa-users"></i><span class="menu-title">Clients</span></a>
                    </li>
                    <li class=" nav-item @if($page === 'fournisseur')active @endif"><a href="{{route('fournisseur')}}"><i class="fas fa-street-view"></i><span class="menu-title">Fournisseurs</span></a>
                    </li>
                    <li class=" nav-item @if($page === 'prospect')active @endif"><a href="{{route('prospect')}}"><i class="fa fa-tty"></i><span class="menu-title">Prospects</span></a>
                    </li>
                    <li class=" nav-item @if($page === 'devis')active @endif"><a href="{{route('devis')}}"><i class="fas fa-file-invoice"></i><span class="menu-title">Devis</span></a>
                    </li>
                    <li class=" nav-item @if($page === 'vente')active @endif"><a href="{{route('vente')}}"><i class="icon-basket-loaded"></i><span class="menu-title">Ventes</span></a>
                    </li>
                    <li class=" nav-item @if($page === 'depense')active @endif"><a href="{{route('depense')}}"><i class="fa fa-file"></i><span class="menu-title">Dépenses</span></a>
                    </li>
                    <li class=" nav-item @if($page === 'rapport')active @endif"><a href="{{route('rapport')}}"><i class="fas fa-chart-bar"></i><span class="menu-title">Rapports</span></a>
                    </li>
                    <li class=" nav-item @if($page === 'setting')active @endif"><a href="{{route('setting')}}"><i class="icon-settings"></i><span class="menu-title">Paramètres</span></a>
                    </li>
                </ul>
            </div>
            </div>
            <div class="sidebar-background"></div>
        </div>
