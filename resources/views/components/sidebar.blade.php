<div class="sidebar-wrapper">
         <div class="sidebar sidebar-collapse" id="sidebar">
            <div class="sidebar__menu-group">
               <ul class="sidebar_nav">
                  <li>
                     <a href="{{route('dashboard')}}" class="">
                        <span class="nav-icon uil uil-create-dashboard"></span>
                        <span class="menu-text">Tableau de bord</span>
                     </a>
                  </li>
                  <li class="menu-title mt-30">
                    <span>Ventes</span>
                 </li>
                 <li class="">
                    <a href="{{route('sales.create')}}">
                       <span class="nav-icon uil uil-signin"></span>
                       <span class="menu-text">Effectuer une vente</span>
                    </a>
                 </li>
                 <li class="">
                    <a href="{{route('sales.list')}}">
                       <span class="nav-icon uil uil-sign-out-alt"></span>
                       <span class="menu-text">Liste des ventes</span>
                    </a>
                 </li>
                 <li class="menu-title mt-30">
                    <span>Achats</span>
                 </li>
                 <li class="">
                    <a href="{{route('purchases.create')}}">
                       <span class="nav-icon uil uil-signin"></span>
                       <span class="menu-text">Effectuer un achat</span>
                    </a>
                 </li>
                 <li class="">
                    <a href="{{route('purchases.list')}}">
                       <span class="nav-icon uil uil-sign-out-alt"></span>
                       <span class="menu-text">Liste des achats</span>
                    </a>
                 </li>
                  <li class="menu-title mt-30">
                     <span>Partenaires</span>
                  </li>
                  <li class="">
                    <a href="{{route('partners.create')}}">
                       <span class="nav-icon uil uil-signin"></span>
                       <span class="menu-text">Ajouter un partenaire</span>
                    </a>
                 </li>
                 <li class="">
                    <a href="{{route('partners.list')}}">
                       <span class="nav-icon uil uil-sign-out-alt"></span>
                       <span class="menu-text">Liste des partenaires</span>
                    </a>
                 </li>
                  <li class="menu-title mt-30">
                     <span>Articles</span>
                  </li>
                  <li class="">
                    <a href="{{route('articles.create')}}">
                       <span class="nav-icon uil uil-signin"></span>
                       <span class="menu-text">Ajouter un article</span>
                    </a>
                 </li>
                 <li class="">
                    <a href="{{route('articles.list')}}">
                       <span class="nav-icon uil uil-sign-out-alt"></span>
                       <span class="menu-text">Liste des articles</span>
                    </a>
                 </li>
                  <li class="menu-title mt-30">
                    <span>Paramètrages</span>
                 </li>
                 <li class="">
                    <a href="{{route('profiles.show', 1)}}">
                       <span class="nav-icon uil uil-signin"></span>
                       <span class="menu-text">Profil</span>
                    </a>
                 </li>
                 <li class="">
                    <a href="#">
                       <span class="nav-icon uil uil-signin"></span>
                       <span class="menu-text">Se déconnecter</span>
                    </a>
                 </li>
               </ul>
            </div>
         </div>
      </div>
