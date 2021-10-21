@php
    $prefix = Request::route()->getPrefix();
    $route = Route::current()->getName();
@endphp
<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
       <li class="nav-item has-treeview {{ $prefix == '/admin' ? 'menu-open' : '' }}">
          <a href="#" class="nav-link">
             <i class="nav-icon fas fa-copy"></i>
             <p>
                 Manage User
                <i class="fas fa-angle-left right"></i>
             </p>
          </a>
          <ul class="nav nav-treeview">
             <li class="nav-item">
                <a href="{{ route('admin.users.index') }}" class="nav-link {{ $route == 'admin.users.index' ? 'active' : '' }}">
                   <i class="far fa-circle nav-icon"></i>
                   <p>View User</p>
                </a>
             </li>
          </ul>
       </li>
       <li class="nav-item has-treeview {{ $prefix == 'admin/user' ? 'menu-open' : '' }}">
        <a href="#" class="nav-link">
           <i class="nav-icon fas fa-copy"></i>
           <p>
               Manage Profile
              <i class="fas fa-angle-left right"></i>
           </p>
        </a>
        <ul class="nav nav-treeview">
           <li class="nav-item">
              <a href="{{ route('admin.user.profile.show') }}" class="nav-link {{ $route == 'admin.user.profile.show' ? 'active' : '' }}">
                 <i class="far fa-circle nav-icon"></i>
                 <p>View Profile</p>
              </a>
           </li>
           <li class="nav-item">
            <a href="{{ route('admin.user.password.change') }}" class="nav-link {{ $route == 'admin.user.password.change' ? 'active' : '' }}">
               <i class="far fa-circle nav-icon"></i>
               <p>Change Password</p>
            </a>
         </li>
        </ul>
     </li>
     <li class="nav-item has-treeview {{ $prefix == 'admin/supplier' ? 'menu-open' : '' }}">
        <a href="#" class="nav-link">
           <i class="nav-icon fas fa-copy"></i>
           <p>
               Manage Supplier
              <i class="fas fa-angle-left right"></i>
           </p>
        </a>
        <ul class="nav nav-treeview">
           <li class="nav-item">
              <a href="{{ route('admin.supplier.list') }}" class="nav-link {{ $route == 'admin.supplier.list' ? 'active' : '' }}">
                 <i class="far fa-circle nav-icon"></i>
                 <p>View Supplier</p>
              </a>
           </li>
        </ul>
     </li>
     <li class="nav-item has-treeview {{ $prefix == 'admin/customer' ? 'menu-open' : '' }}">
        <a href="#" class="nav-link">
           <i class="nav-icon fas fa-copy"></i>
           <p>
               Manage Customer
              <i class="fas fa-angle-left right"></i>
           </p>
        </a>
        <ul class="nav nav-treeview">
           <li class="nav-item">
              <a href="{{ route('admin.customer.list') }}" class="nav-link {{ $route == 'admin.customer.list' ? 'active' : '' }}">
                 <i class="far fa-circle nav-icon"></i>
                 <p>View Customer</p>
              </a>
           </li>
        </ul>
     </li>
     <li class="nav-item has-treeview {{ $prefix == 'admin/unit' ? 'menu-open' : '' }}">
        <a href="#" class="nav-link">
           <i class="nav-icon fas fa-copy"></i>
           <p>
               Manage Unit
              <i class="fas fa-angle-left right"></i>
           </p>
        </a>
        <ul class="nav nav-treeview">
           <li class="nav-item">
              <a href="{{ route('admin.unit.list') }}" class="nav-link {{ $route == 'admin.unit.list' ? 'active' : '' }}">
                 <i class="far fa-circle nav-icon"></i>
                 <p>View Unit</p>
              </a>
           </li>
        </ul>
     </li>
     <li class="nav-item has-treeview {{ $prefix == 'admin/categories' ? 'menu-open' : '' }}">
        <a href="#" class="nav-link">
           <i class="nav-icon fas fa-copy"></i>
           <p>
               Manage Category
              <i class="fas fa-angle-left right"></i>
           </p>
        </a>
        <ul class="nav nav-treeview">
           <li class="nav-item">
              <a href="{{ route('admin.categories.list') }}" class="nav-link {{ $route == 'admin.categories.list' ? 'active' : '' }}">
                 <i class="far fa-circle nav-icon"></i>
                 <p>View Category</p>
              </a>
           </li>
        </ul>
     </li>
     <li class="nav-item has-treeview {{ $prefix == 'admin/products' ? 'menu-open' : '' }}">
      <a href="#" class="nav-link">
         <i class="nav-icon fas fa-copy"></i>
         <p>
             Manage Product
            <i class="fas fa-angle-left right"></i>
         </p>
      </a>
      <ul class="nav nav-treeview">
         <li class="nav-item">
            <a href="{{ route('admin.products.list') }}" class="nav-link {{ $route == 'admin.products.list' ? 'active' : '' }}">
               <i class="far fa-circle nav-icon"></i>
               <p>View Product</p>
            </a>
         </li>
      </ul>
   </li>
   <li class="nav-item has-treeview {{ $prefix == 'admin/roles' ? 'menu-open' : '' }}">
    <a href="#" class="nav-link">
       <i class="nav-icon fas fa-copy"></i>
       <p>
           Manage Role & Permission
          <i class="fas fa-angle-left right"></i>
       </p>
    </a>
    <ul class="nav nav-treeview">
       <li class="nav-item">
          <a href="{{ route('admin.roles.rolePermission.index') }}" class="nav-link {{ $route == 'admin.roles.rolePermission.index' ? 'active' : '' }}">
             <i class="far fa-circle nav-icon"></i>
             <p>View Role & Permission</p>
          </a>
       </li>
    </ul>
 </li>
    </ul>
 </nav>
