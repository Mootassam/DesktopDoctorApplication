<template>


        <!-- Main content -->
        <div class="main-content">
          <!-- Header -->
          <div class="header bg-gradient-primary py-7 py-lg-8 pt-lg-9">
            <div class="container">
              <div class="header-body text-center mb-7">
                <div class="row justify-content-center">
                  <div class="col-xl-5 col-lg-6 col-md-8 px-5">
                    <h1 class="text-white">Bienvenue A Cabinet <br> Faycel Boughdiri</h1>
                  </div>
                </div>
              </div>
            </div>
            <div class="separator separator-bottom separator-skew zindex-100">
              <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
                <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
              </svg>
            </div>
          </div>
          <!-- Page content -->
          <div class="container mt--8 pb-5">



  <div class="row justify-content-center">
    <div class="col-lg-5 col-md-7">
      <div class="card bg-secondary border-0 mb-0">

          <div class="card-body px-lg-5 py-lg-5">
          <div class="text-center text-muted mb-4">
          <small>Connectez-vous avec vos identifiants</small>
          </div>
          </div>
<form>

  <div class="form-group mb-3">
    <div class="input-group input-group-merge input-group-alternative">
      <div class="input-group-prepend">
        <span class="input-group-text"><i class="ni ni-email-83"></i></span>
      </div>
      <input v-model="username" placeholder="Email Utilisateur" id="email" type="text" class="form-control" name="email" value="">
    </div>
  </div>
  <div class="form-group">
    <div class="input-group input-group-merge input-group-alternative">
      <div class="input-group-prepend">
        <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
      </div>
      <input v-model="password" placeholder="Password Utilisateur" id="password" type="password" class="form-control" name="password" required autocomplete="current-password">

    </div>
  </div>

  <div class="text-center">
    <button type="submit" class="btn btn-primary my-4" @click="To()" >Se connecter</button>
  </div>
</form>
</div>
</div>

</div>


          </div>
        </div>

</template>

<script>
export default {

data() {
  return {
    form : { 
      username : null, 
      password :null, 
    }
  }
},
created: { 
  }, 

methods : {

    To(){
     
       this.$router.push({name: 'Homes'})
         }


}
}
</script>

<style>

</style>
