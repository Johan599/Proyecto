<aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="../index.php" class="brand-link">
          <img
            src="../html/dist/img/AdminLTELogo.png"
            alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3"
            style="opacity: 0.8"
          />
          <span class="brand-text font-weight-light">Uniminuto</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
          <!-- Sidebar user (optional) -->
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
              <img
                src="../HTML/dist/"
                class="img-circle elevation-2"
                alt="User Image"
              />
            </div>
            <div class="info" style="color: white;">
            <input type="hidden" id="usu_idx" value="<?php echo $_SESSION["usu_id"] ?>">
            <input type="hidden" id="rol_id" value="<?php echo $_SESSION["rol_id"] ?>">
    <?php echo $_SESSION["nombre"] ." ". $_SESSION["ape_paterno"] ?>

            </div>
          </div>

          <!-- SidebarSearch Form -->
          <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
              <input
                class="form-control form-control-sidebar"
                type="search"
                placeholder="Search"
                aria-label="Search"
              />
              <div class="input-group-append">
                <button class="btn btn-sidebar">
                  <i class="fas fa-search fa-fw"></i>
                </button>
              </div>
            </div>
          </div>

          <!-- Sidebar Menu -->
          <nav class="mt-2">
            <ul
              class="nav nav-pills nav-sidebar flex-column"
              data-widget="treeview"
              role="menu"
              data-accordion="false"
            >
              <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
              <li class="nav-item">
                <a href="../views/inicio.php" class="nav-link">
                  <i class="nav-icon fas fa-home"></i>
                  <p>
                    INICIO
                </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../views/perfil.php" class="nav-link">
                  <i class="nav-icon fas fa-user"></i>
                  <p>
                    PERFIL
                </p>
                </a>
              </li>

              <?php
                       if ($_SESSION["rol_id"]==1){

                       
                      ?>

                </p>
                </a>
              </li>

              <?php
                       }else{

                        
                      ?>


              <li class="nav-item">
                <a href="../views/usuario.php" class="nav-link">
                  <i class="nav-icon fas fa-users"></i>
                  <p>
                    USUARIO
                </p>
                </a>
              </li>
              
              <?php } 
                      ?>

              <li class="nav-item">
                <a href="../views/socialMedia.php" class="nav-link">
                  <i class="nav-icon fas fa-users"></i>
                  <p>
                    SocialMedia
                </p>
                </a>
              </li>

              <li class="nav-item">
                <a href="../views/Estudios.php" class="nav-link">
                  <i class="nav-icon fas fa-users"></i>
                  <p>
                    Estudios
                </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../views/Experiencia.php" class="nav-link">
                  <i class="nav-icon fas fa-users"></i>
                  <p>
                    Experiencia
                </p>
                </a>
              </li>

              <li class="nav-item">
                <a href="../controller/cerrar_sesion.php" class="nav-link">
                  <i class="nav-icon fa fa-unlock"></i>
                  <p>
                    Salir
                  </p>
                </a>
              </li>
              
            </ul>
          </nav>
          <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
      </aside>