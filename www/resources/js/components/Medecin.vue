<template>
<div class="main-content" >
   <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Liste des medecins</h6>
            </div>
            <div class="col-lg-6 col-5 text-right">
<button type="button" class="btn btn-default" data-toggle="modal" data-target="#exampleModal">
  Ajouter Medecin
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

  <div class="modal-dialog modal-dialog-centered" role="document">
        <form role="form" @submit.prevent="AddDoctor()">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ajouter les informations du medecin</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

            <div class="form-group mb-3">
                <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="ni ni-circle-08"></i></span>
                    </div>
                    <input v-model="form.nom" class="form-control" placeholder="Nom du medecin" type="text">
                </div>
            </div>
            <div class="form-group">
                <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="ni ni-paper-diploma"></i></span>
                    </div>
                    <input v-model="form.Specialite" class="form-control" placeholder="Specilaite" type="text">
                </div>
            </div>
               <div class="form-group">
                <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="ni ni-mobile-button"></i></span>
                    </div>
                    <input v-model="form.N2" class="form-control" placeholder="Tapr le numero de medecin 2" type="text">
                </div>
            </div>
               <div class="form-group">
                <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="ni ni-mobile-button"></i></span>
                    </div>
                    <input v-model="form.N1" class="form-control" placeholder="Taper le numero de medecin 2" type="text">
                </div>
            </div>
               <div class="form-group">
                <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                    </div>
                    <input v-model="form.email" class="form-control" placeholder="Email du medecin" type="email">
                </div>
            </div>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
    </div>
          </form>
  </div>
</div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
      <div class="row">
        <div class="col">
          <div class="card">
            <!-- Card header -->
            <div class="card-header border-0">

            <div class="form-group mb-0">
              <div class="input-group input-group-alternative input-group-merge">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-search"></i></span>
                </div>
                <input class="form-control" placeholder="Chercher Par Nom" v-model="nom"  @keyup="fetch" type="text">
              </div>
            </div>

                  </div>
            <!-- Light table -->
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col" class="sort" data-sort="name">Nom Complet</th>
                    <th scope="col" class="sort" data-sort="budget">Specialite</th>
                    <th scope="col" class="sort" data-sort="budget">N telphone 1</th>
                    <th scope="col" class="sort" data-sort="status">N telphone 2</th>
                    <th scope="col">Email</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody class="list">
                  <tr v-for="med in Doctor" :key="med.id">
                    <th scope="row">
                      <div class="media align-items-center">

                        <div class="media-body">
                                        <span class="h3 font-weight-bold mb-0"> {{med.nom}}</span>
                        </div>
                      </div>
                    </th>
                    <td class="budget">
              <span class="h3 font-weight-bold mb-0"> {{med.Specialite}}</span>


                    </td>
                    <td>
                      <span class="badge badge-dot mr-4">
                      <span class="h3 font-weight-bold mb-0">{{med.N1}}</span>
                      </span>
                    </td>
                    <td>
                      <div class="avatar-group">
          <span class="h3 font-weight-bold mb-0">{{med.N2}}</span>

                      </div>
                    </td>
                    <td>
                      <div class="d-flex align-items-center">
                                    <span class="h3 font-weight-bold mb-0">{{med.email}}</span>


                      </div>
                    </td>
                    <td class="text-right">
                           <div class="col-auto">



                  <a  @click="DeleteDoctor(med.id)">
                      <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                        <i class="ni ni-basket"></i>
                      </div>
                      </a>
                    </div>
                    </td>
                  </tr>

                                 </tbody>
              </table>
            </div>
            <!-- Card footer -->
            <div class="card-footer py-4">
              <nav aria-label="...">
                <ul class="pagination justify-content-end mb-0">
                  <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1">
                      <i class="fas fa-angle-left"></i>
                      <span class="sr-only">Previous</span>
                    </a>
                  </li>
                  <li class="page-item active">
                    <a class="page-link" href="#">1</a>
                  </li>
                  <li class="page-item">
                    <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                  </li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item">
                    <a class="page-link" href="#">
                      <i class="fas fa-angle-right"></i>
                      <span class="sr-only">Next</span>
                    </a>
                  </li>
                </ul>
              </nav>
            </div>
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
            Doctor:[''],
            nom:'',
            form:{
                nom:'',
                Specialite:'',
                N1:'',
                N2:'',
                email:'',
            }
        }
    },

    methods:{

        fetch(){
            axios.post('/api/Doctor/fetch/',{'nom':this.nom}).then(res => {
                this.Doctor = res.data
            }).catch()
         },
        GetDoctor(){
            axios.get('/api/Doctor').then(res => {
                this.Doctor=res.data
            }).catch()
        },
        AddDoctor(){
            axios.post('/api/Doctor',this.form).then(
                res => {
                    this.GetDoctor()
                    this.form ={
                    nom:'',
                    Specialite:'',
                    N1:'',
                    N2:'',
                    email:'',
                    }
                }
            )
         },
        DeleteDoctor(id){
            axios.delete(`/api/Doctor/${id}`).then(res => { this.GetDoctor()})
        },
    },
         created () {
      this.GetDoctor();
  },


}
</script>

<style>

</style>
