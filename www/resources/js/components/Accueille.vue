

<template>
<div class="main-content"  >
  <div class="header bg-primary pb-6">
    <div class="container-fluid">
      <div class="header-body">
        <div class="row align-items-center py-4">


        </div>
        <!-- Card stats -->
        <div class="row">



          <div class="col-xl-4 col-md-6">
            <div class="card card-stats">
              <div class="card-body">
                <div class="row">
                  <div class="col">
                    <h5 class="card-title text-uppercase text-muted mb-0">Rendez-Vous</h5>
                    <span class="h2 font-weight-bold mb-0">{{count}}</span>
                  </div>
                  <div class="col-auto">
                    <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                      <i class="ni ni-calendar-grid-58"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-4 col-md-6">
            <div class="card card-stats">
              <!-- Card body -->
              <div class="card-body">
                <div class="row">
                  <div class="col">
                    <h5 class="card-title text-uppercase text-muted mb-0">Nouveau Patient</h5>
                    <span class="h2 font-weight-bold mb-0">{{countsP}} </span>
                  </div>
                  <div class="col-auto">
                    <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                      <i class="ni ni-single-02"></i>
                    </div>
                  </div>
                </div>

              </div>
            </div>
          </div>
          <div class="col-xl-4 col-md-6">
            <div class="card card-stats">
              <!-- Card body -->
              <div class="card-body">
                <div class="row">
                  <div class="col">
                    <h5 class="card-title text-uppercase text-muted mb-0">Salle D'attente </h5>
                    <span class="h2 font-weight-bold mb-0">{{count+countsP}}</span>
                  </div>
                  <div class="col-auto">
                    <div class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
                      <i class="ni ni-single-02"></i>
                    </div>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="container-fluid mt--6">

  <div class="row">
    <div class="col-xl-12">
      <div class="card">
        <div class="card-header border-0">
          <div class="row align-items-center">
            <div class="col">
              <h3 class="mb-0">Les Consultation et les controles daujourdhui </h3>
            </div>
            <div class="col text-right">
              <a href="#!" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#exampleModal" >Ajouter Patient </a>


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
        <input  class="form-control" v-model="form.Date" type="date" placeholder="2018-11-23" id="example-date-input">
    </div>
      <div class="form-group">
        <input  class="form-control" v-model="form.Heure" type="time" placeholder="2018-11-23" id="example-date-input">
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
        <div class="table-responsive">
          <!-- Projects table -->
          <table class="table align-items-center table-flush">
            <thead class="thead-light">
              <tr>
                <th scope="col"><h5 class="card-title text-uppercase text-muted mb-0"> Nom</h5></th>
                <th scope="col"><h5 class="card-title text-uppercase text-muted mb-0">Prenom</h5></th>
                <th scope="col"><h5 class="card-title text-uppercase text-muted mb-0">Telephone</h5></th>
                <th scope="col"><h5 class="card-title text-uppercase text-muted mb-0">Date</h5></th>
                <th scope="col"><h5 class="card-title text-uppercase text-muted mb-0">Heure</h5></th>
                <th scope="col"><h5 class="card-title text-uppercase text-muted mb-0">Etat</h5></th>
                <th scope="col"><h5 class="card-title text-uppercase text-muted mb-0">Presence</h5></th>
              </tr>
            </thead>
            <tbody>

              <tr v-for="(patient,index) in Patients" :key="index.id">
                <th scope="row">
                    <span class="h3 font-weight-bold mb-0">{{patient.Nom}}  </span>
                 </th>
                <td>
                    <span class="h3 font-weight-bold mb-0">{{patient.Prenom}} </span>
                 </td>
                <td>
                    <span class="h3 font-weight-bold mb-0"> {{patient.Tel}} </span>
                </td>
                <td>
                    <span class="h3 font-weight-bold mb-0">{{patient.Date}}</span>
                </td>
                  <td>
                      <span class="h3 font-weight-bold mb-0">{{patient.Heure}} </span>
                </td>
                 <td v-if="patient.presence == 'En attente'">
                <div>
                <div class="media-body">
                <span class="badge badge-pill badge-danger">{{patient.presence}}</span>
                </div>
                </div>
                </td>

                   <td v-else-if="patient.presence = 'Terminer'">
                <div>
                <div class="media-body">
                <span class="badge badge-pill badge-success">{{patient.presence}}</span>
                </div>
                </div>
                </td>


                 <td v-if="patient.presence == 'En attente'" >

                   <button type="submit" @click='modify(patient.id)'  class="btn btn-success">
                Terminer
                </button>

                </td>
                 <td v-else-if="patient.presence = 'Terminer'">
                   <button type="submit"  @click='cancel(patient.id)'  class="btn btn-danger">
                Cancel
                </button>
                 </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

</div>
</div>

</template>


<script>
import Consultation from './Consultation'
import tables from './tables'
export default {
components:{Consultation,tables},

  data () {
    return {
        search:'',
     Patients:[''],
      shows:false,
      table:true,
      count:'',
      countsP:'',
      acctuallypatient:'',
      absence:'Terminer',
      cancels :'En attente',
      all:'',
      form: {
          Nom:'',
          Prenom:'',
          Sex:'',
          Tel:'',
          Date:'',
          Heure:'',
      },

    }
  },
  methods: {
         cancel(id){
        axios.put(`/api/Patient/${id}`,{'presence':this.cancels}).then(
            res=> {
            Vue.toasted.success('La modification fait avec succès',{
            duration:'3000'
                 });
                 this.GetPatient();
}
        ).catch(error => {
             console.log(error)

         })
    },

         modify(id){
        axios.put(`/api/Patient/${id}`,{'presence':this.absence}).then(
            res=> {
            Vue.toasted.success('La modification fait avec succès',{
            duration:'3000'
                 });
                 this.GetPatient();
                 }
        ).catch(error => {
             console.log(error)

         })
    },
      CountPatient(){
          axios.get('/api/counts').then(res => {
              this.countsP= res.data.count
              this.acctuallypatient= res.data.all
          })
      },
CountRendez(){
    axios.get('/api/now').then( res => {
        this.count = res.data.count
        this.all =res.data.all
    }).catch()



},
    GetPatient () {
     axios.get('/api/accuille').then( response => {
         this.Patients = response.data ;
         this.CountPatient();
     }).catch(error => { console.log(error) ; })
    },
     AddPatient () {
      axios.post('/api/Patient',this.form).then(res =>
       this.GetPatient(),
   Vue.toasted.success('La Patient Ajoute avec succès',{
            duration:'3000'
                 }),
this.form ={
  Nom:'',
  Prenom:'',
  Sex:'',
  Tel:'',
  Date:'',
},
      )

      .catch(error => { console.log(error) ; })
    },
    SupprimerPatient(id,index){
        axios.delete(`/api/Patient/${id}`).then(
            this.GetPatient(),
        ).catch()
    },
    EditPatient(patient){
    this.Patients=patient
    this.shows=true
    this.table=false
     }
  },

  created(){
      this.GetPatient();
      this.CountRendez();
      this.CountPatient();
  },
  computed() {
          this.GetPatient();
      this.CountRendez();
      this.CountPatient();
  },


}
</script>

