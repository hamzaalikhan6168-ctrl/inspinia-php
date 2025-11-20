   <nav class="navbar-default navbar-static-side" role="navigation">
     <div class="sidebar-collapse">
       <ul class="nav metismenu" id="side-menu">
         <li class="nav-header">
           <div class="dropdown profile-element">
             <img
               alt="image" class="rounded-circle" src="theme/img/profile_small.jpg" />
             <a data-toggle="dropdown" class="dropdown-toggle" href="#">
               <span class="block m-t-xs font-bold">David Williams</span>
               <span class="text-muted text-xs block">Art Director <b class="caret"></b></span>
             </a>
             <ul class="dropdown-menu animated fadeInRight m-t-xs">
               <li>
                 <a class="dropdown-item" href="profile.html">Profile</a>
               </li>
               <li>
                 <a class="dropdown-item" href="contacts.html">Contacts</a>
               </li>
               <li>
                 <a class="dropdown-item" href="mailbox.html">Mailbox</a>
               </li>
               <li class="dropdown-divider"></li>
               <li><a class="dropdown-item" href="backend/logout.php">Logout</a></li>
             </ul>
           </div>
           <div class="logo-element">IN+</div>
         </li>
         <li class="<?php if($pagetab == "dashboard"){echo "active";} ?>">
           <a href="dashboard.php"><i class="fa fa-th-large"></i>
             <span class="nav-label">Dashboards</span>
             <span class="fa arrow"></span></a> 

         <ul class="nav nav-second-level">
             <li><a href="index.html">Dashboard v.1</a></li> 
             <li class="">
               <a href="dashboard.php">Dashboard v.2</a>
             </li>
              <li><a href="dashboard_3.html">Dashboard v.3</a></li>
             <li><a href="dashboard_4_1.html">Dashboard v.4</a></li>
             <li><a href="dashboard_5.html">Dashboard v.5 </a></li>
           </ul>
          </li>

         <li class="<?php if($pagetab == "users"){echo "active";} ?>">
           <a href="index.html"><i class="fa fa-th-o"></i>
             <span class="nav-label">Users</span>
             <span class="fa arrow"></span></a>
           <ul class="nav nav-second-level collapse">
             <li class="<?php if($pagename == "add_user"){echo "active";} ?>">
              <a href="add-user.php">Add</a></li>
             <li class="<?php if($pagename == "edit_user"){echo "active";} ?>">
              <a href="edit-user.php">Edit</a></li>         
             <li class="<?php if($pagename == "list_user"){echo "active";} ?>">
              <a href="list-user.php">List</a></li>
           </ul>
         </li>

         <li class="<?php if($pagetab == "product"){echo "active";} ?>">
           <a href="index.html"><i class="fa fa-th-o"></i>
             <span class="nav-label">Product</span>
             <span class="fa arrow"></span></a>
           <ul class="nav nav-second-level collapse">
             <li class="<?php if($pagename == "add_product"){echo "active";} ?>">
              <a href="add-product.php">Add</a></li>
             <li class="<?php if($pagename == "edit_product"){echo "active";} ?>">
              <a href="edit-product.php">Edit</a></li>         
             <li class="<?php if($pagename == "list_product"){echo "active";} ?>">
              <a href="list-product.php">List</a></li>
           </ul>
         </li>

         <li class="<?php if($pagetab == "manage-product"){echo "active";} ?>">
           <a href="manage-product.php"><i class="fa fa-th-o"></i>
             <span class="nav-label">Manage Product</span>  </a>
         </li>
         <li class="<?php if($pagetab == "manage-user"){echo "active";} ?>">
           <a href="manage-user.php"><i class="fa fa-th-o"></i>
             <span class="nav-label">Manage User</span>  </a>
         </li>

         <li class="<?php if($pagetab == "payment"){echo "active";} ?>">
           <a href="payment.php"><i class="fa fa-th-o"></i>
             <span class="nav-label">Payment</span>
             <span class="fa arrow"></span></a>
           <ul class="nav nav-second-level collapse">
             <li class="<?php if($pagename == "payment_product"){echo "active";} ?>">
              <a href="payment.php">Card</a></li>
           </ul>
         </li>

       </ul>
     </div>
   </nav>