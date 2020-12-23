
<template>
  <nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
        <div class="scrollbar-inner">
          <!-- Brand -->
          <div class="sidenav-header  align-items-center">
          <router-link to="/">   <a class="navbar-brand" href="" >
              Cabinet
              <img  class="navbar-brand-img" alt="...">
            </a></router-link>
          </div>
          <div class="navbar-inner">
            <!-- Collapse -->
            <div class="collapse navbar-collapse" id="sidenav-collapse-main">
              <!-- Nav items -->
              <ul class="navbar-nav">
                <li class="nav-item">
                  <router-link to="/Patients"> <a  href="" class="nav-link" >
                    <i class="ni ni-badge"></i>
                    <span class="nav-link-text">Dossier Medicale</span>
                  </a> </router-link>
                </li>
                <li class="nav-item">
                  <router-link to="/Medecin"> <a  href="" class="nav-link" >
                    <i class="ni ni-planet text-orange"></i>
                    <span class="nav-link-text">Medecins</span>
                  </a> </router-link>
                </li>
                <li class="nav-item">
                   <router-link to="/Rendez"><a  href="" class="nav-link" >
                    <i class="ni ni-calendar-grid-58"></i>
                    <span class="nav-link-text">Rendez Vous</span>
                  </a></router-link>
                </li>


                 <li class="nav-item">
                 <router-link to="/Document">  <a  href="" class="nav-link" >
                    <i class="ni ni-user-run text-orange"></i>
                    <span class="nav-link-text">Deconnecter</span>
                  </a></router-link>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </nav>

      <!-- Main content -->


</template>

<script>
export default {

}
</script>

<style>

</style>
