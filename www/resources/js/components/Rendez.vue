<template>
<div class="main-content" >
    <div v-if="table">
   <div class="header bg-primary pb-6" >
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-5 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Liste des Rendez-Vous</h6>
            </div>
            <div class="col-lg-7 col-5 text-right">
                       <button type="button" class="btn btn-round btn-default disabled" @click="CeJour">
 Ce jour
</button>
       <button type="button" class="btn btn-success" @click="GetConsultation">
 Consultation
</button>
<button type="button" class="btn btn-warning" @click="GetControle" >
Controle
</button>
<button type="button" class="btn btn-neutral" @click="GetRendez" >
Tous
</button>



<!-- Modal -->

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


        <div class="row">
        <div class="col-lg-8">
              <FullCalendar :options="calendarOptions"  />

        </div>
        <div class="col-lg-4">
<form role="form" @submit.prevent="AddPatient()">
                    <div class="form-group">
                  <label for="">Nom of client</label>
                    <select   v-model="form.patient_id"  class="form-control" >
           <option v-for="patients in patient" :key="patients.id" :value="patients.id">{{patients.Nom}}_{{patients.Prenom}}</option>
        </select>
                  <small id="helpId" class="text-muted">Help text</small>
                </div>
                    <div class="form-group">
                  <label for="">title</label>
                  <select name="" class="form-control" id="" v-model="form.title">

                      <option value="Consultation" selected >Consultation</option>
                      <option value="Controle">Controle</option>

                  </select>
                  <small id="helpId" class="text-muted">Help text</small>
                </div>

                    <div class="form-group">
                  <label for="">Start </label>

                  <datetime type="datetime" class="form-control" v-model="form.Date"></datetime>
                  <small id="helpId" class="text-muted">Help text</small>

                </div>



                <button type="submit" class="btn btn-primary">Ajouter</button>
                 <button type="reset" class="btn btn-danger">Cancel</button>


            </form>
        </div>
    </div>

            <div class="form-group mb-0">
              <div class="input-group input-group-alternative input-group-merge">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-search"></i></span>
                </div>
                <input class="form-control" v-model="search" @keyup="fetch()" placeholder="Chercher avec numero de telephone" type="text">
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
                                        <th scope="col" class="sort" data-sort="budget">Prenom</th>
                                        <th scope="col" class="sort" data-sort="budget">Tel</th>

                    <th scope="col" class="sort" data-sort="status">title</th>
                    <th scope="col" class="sort" data-sort="completion">Date de rendez-Vous</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody class="list">
                  <tr v-for="(Rende,index) in Rendez" :key="Rende.id" >
                    <th scope="row">
                      <div class="media align-items-center">
                        <div class="media-body">
     <span class="h3 font-weight-bold mb-0">  {{Rende.id}} </span>
                        </div>
                      </div>
                    </th>
                    <td class="budget">
     <span class="h3 font-weight-bold mb-0">  {{Rende.Nom}} </span>


                    </td>
                    <td class="budget">
     <span class="h3 font-weight-bold mb-0"> {{Rende.Prenom}} </span>



                    </td>
                                        <td class="budget">
     <span class="h3 font-weight-bold mb-0"> {{Rende.Tel}} </span>



                    </td>

   <td>
       <div v-if="Rende.title=='Consultation'"  role="alert">
<span class="h3 badge badge-pill badge-success">{{Rende.title}}</span>


              </div>

 <div  v-if="Rende.title=='Controle'"  >
                <span class="alert-icon"></span>
<span class="h3 badge badge-pill badge-warning">{{Rende.title}}</span>
              </div>
                    </td>


                    <td>
                            <span class="h3 font-weight-bold mb-0">{{Rende.date}} </span>
                    </td>
                    <td class="text-right">


                        <div class="col-auto">


                <a  @click="EditPatient(Rende)">
                  <div  class="icon icon-shape bg-gradient-info text-white rounded-circle shadow">
                  <i class="ni ni-archive-2"></i>
                  </div>
                  </a>

                  <a  @click="SupprimerPatient(Rende.id,index)">
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
      <Consultation v-if="shows" :data=Rendez></Consultation>


</div>
</template>

<script>
import { Datetime } from 'vue-datetime';
import FullCalendar from "@fullcalendar/vue"
import dayGridPlugin from "@fullcalendar/daygrid"
import timeGridPlugin from "@fullcalendar/timegrid"
import interactionPlugin from "@fullcalendar/interaction"


import Consultation from './Consultation'
export default {
components:{Consultation,FullCalendar,Datetime},


  data () {
    return {
 calendarOptions: {
        plugins: [
          dayGridPlugin,
          timeGridPlugin,
          interactionPlugin // needed for dateClick
        ],
              eventSources: [
            {
            events(start, callback) {
            axios.get('/api/Rendez/').then(response => {
              callback(response.data.all)
            })
          },
          color: 'yellow',
          textColor: 'black',

            }
          ],
        headerToolbar: {
          left: 'prev,next today',
          center: 'title',
          right: 'dayGridMonth,timeGridWeek,timeGridDay'
        },
        initialView: 'dayGridMonth',

        weekends: true,

      },
        search:'',

    form: {
        patient_id:'',
        title:'',
        Date:'',
      },
      Rendez:[''],
      patient:[''],
      shows:false,
      table:true,
    }
  },
  methods: {

        handleDateClick(e) {
            this.form = e.dateStr
            let endTime = (new Date(e.dateStr)).toISOString()
            this.form.date = e.dateStr
        },

      fetch(){
          axios.post('/api/Rendez/fetch/',{'Tel':this.search}).then( res=> {
         this.Rendez = res.data ;
     }).catch(error => { console.log(error) ; })
       },

 GetPatient () {
     axios.get('/api/Patient').then( response => {
         this.patient = response.data ;
     }).catch(error => { console.log(error) ; })
    },
    GetRendez (){
     axios.get('/api/Rendez').then( response => {
         this.Rendez = response.data.all ;
     }).catch(error => { console.log(error) ; })
    },
      CeJour (){
     axios.get('/api/Rendez').then( response => {
         this.Rendez = response.data.jour ;
     }).catch(error => { console.log(error) ; })
    },
      GetConsultation (){
     axios.get('/api/Rendez').then( response => {
         this.Rendez = response.data.Consultation ;
     }).catch(error => { console.log(error) ; })
    },
      GetControle (){
     axios.get('/api/Rendez').then( response => {
         this.Rendez = response.data.Controle ;
     }).catch(error => { console.log(error) ; })
    },
     AddPatient () {
      axios.post('/api/Rendez',this.form).then(res =>
       this.GetRendez(),

this.form ={
  patient_id:'',
  title:'',
  Date:'',
},
   Vue.toasted.success('La modification fait avec succès',{
            duration:'3000'
                 })
        )
      .catch(error => { console.log(error) ; })
    },
    SupprimerPatient(id,index){
        axios.delete(`/api/Rendez/${id}`).then(
            this.GetRendez(),
        ).catch()
    },
    EditPatient(patient){
    this.Rendez=patient
    this.shows=true
    this.table=false
     }
  },

  created(){
      this.GetRendez();
      this.GetPatient();
  }


}
</script>

<style>

</style>
