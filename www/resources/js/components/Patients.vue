<template>
<div class="main-content" >
    <div v-if="table">
   <div class="header bg-primary pb-6" >
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Liste des Patients</h6>
            </div>
            <div class="col-lg-6 col-5 text-right">
<button type="button" class="btn btn-default" data-toggle="modal" data-target="#exampleModal">
  Ajouter Patient
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ajouter les informations du patient</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
           <form role="form" @submit.prevent="AddPatient()">
      <div class="modal-body">

            <div class="form-group mb-3">
                <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="ni ni-circle-08"></i></span>
                    </div>
                    <input v-model="form.Nom" class="form-control" placeholder="Nom" type="text">
                </div>
            </div>
            <div class="form-group">
                <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="ni ni-circle-08"></i></span>
                    </div>
                    <input v-model="form.Prenom"  class="form-control" placeholder="Prenom" type="txt">
                </div>
            </div>

           <div class="form-group">
    <select v-model="form.Sex"  class="form-control" id="exampleFormControlSelect1">

      <option value="Homme">Homme</option>
      <option value="Femme">Femme</option>

    </select>
  </div>
        <div class="form-group">
        <input v-model="form.Tel" class="form-control" type="tel" placeholder="2-(16)-55-324-424" id="example-tel-input">
    </div>
    <div class="form-group">
        <input v-model="form.Date" class="form-control" type="date" placeholder="2018-11-23" id="example-date-input">
    </div>
       <div class="form-group">
        <input v-model="form.Heure" class="form-control" type="time" placeholder="2018-11-23" id="example-date-input">
    </div>



      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
        <button type="submit" class="btn btn-primary" >Enregistrer</button>
      </div>
       </form>
    </div>
  </div>
</div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6" >
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
                <input class="form-control" v-model="search" @keyup="fetch()"  placeholder="Chercher Par Num Telephone" type="text">
              </div>
            </div>

                      </div>
            <!-- Light table -->

            <div class="table-responsive">


              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr >
                    <th scope="col" class="sort" data-sort="name">NDossier</th>
                    <th scope="col" class="sort" data-sort="budget">Nom</th>
                    <th scope="col" class="sort" data-sort="status">Prenom</th>
                    <th scope="col">Sex</th>
                    <th scope="col" class="sort" data-sort="completion">Telephone</th>
                    <th scope="col" class="sort" data-sort="completion">Derniere consultaion</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody class="list">
                  <tr v-for="(patient,index) in Patients" :key="index.id" >
                    <th scope="row">
                      <div class="media align-items-center">
                        <div class="media-body">
                            <span class="h3 font-weight-bold mb-0">N {{patient.id}}  </span>

                        </div>
                      </div>
                    </th>
                    <td class="budget">
                                                    <span class="h3 font-weight-bold mb-0">{{patient.Nom}}  </span>


                    </td>
                    <td class="budget">
             <span class="h3 font-weight-bold mb-0">{{patient.Prenom}}</span>
                    </td>
                    <td>
                      <span class="badge badge-dot mr-4">
                        <i class="bg-warning"></i>
                        <span class="h3 font-weight-bold mb-0">{{patient.Sex}}</span>

                      </span>
                    </td>
                    <td>
                      <div class="avatar-group">
            <span class="h3 font-weight-bold mb-0">{{patient.Tel}}</span>
                      </div>
                    </td>
                    <td>
                      <div class="d-flex align-items-center">
            <span class="h3 font-weight-bold mb-0"> {{patient.Date}}</span>
                      </div>
                    </td>
                    <td class="text-right">


                        <div class="col-auto">


                <a  @click="EditPatient(patient)">
                  <div  class="icon icon-shape bg-gradient-info text-white rounded-circle shadow">
                  <i class="ni ni-archive-2"></i>
                  </div>
                  </a>
                  <a  @click="SupprimerPatient(patient.id)">
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


            <!-- Table -->


          </div>
        </div>
      </div>
      </div>
      </div>
      <Consultation v-if="shows" :data=Patients :alls=all :counts=counts></Consultation>

</div>
</template>

<script>
import Consultation from './Consultation'
import tables from './tables'
export default {
components:{Consultation,tables},

  data () {
    return {
        Catalina :'',
        search:'',
counts:"",
all:"",
      form: {
          Nom:'',
          Prenom:'',
          Sex:'',
          Tel:'',
          Date:'',
          Heure:'',
      },
      Patients:[''],
      shows:false,
      table:true,
    }
  },

  created(){

this.GetPatient()

  },
  computed:{

  },
  methods: {

      fetch(){
          axios.post('/api/fetch/',{'Tel':this.search}).then(
              res => {
                  this.Patients = res.data
              }
          ).catch()
      },
GetPatient(){
      axios.get('/api/Patient').then( response => {
         this.Patients = response.data ;
     }).catch(error => { console.log(error) ; })},

     AddPatient () {
      axios.post('/api/Patient',this.form).then(res =>
       this.GetPatient(),
this.form ={
  Nom:'',
  Prenom:'',
  Sex:'',
  Tel:'',
  Date:'',
}
        )
      .catch(error => { console.log(error) ; })
    },
    SupprimerPatient(id){
        axios.delete(`/api/Patient/${id}`).then(
            this.GetPatient(),
        ).catch()
    },
    EditPatient(patient){
    this.Patients=patient
    this.shows=true
    this.table=false
    axios.get(`/api/Patient/${patient.id}`).then(res => { this.counts = res.data.rendez
    this.all = res.data.all}).catch(console.log(error))

     }
  },



}
</script>

<style>


</style>
