<template>
  <div class="main-content" id="panel">

    <div class="header pb-6 d-flex align-items-center" style="min-height: 500px; background-image: url(../assets/img/theme/profile-cover.jpg); background-size: cover; background-position: center top;">
      <!-- Mask -->
      <span class="mask bg-gradient-default opacity-8"></span>
      <!-- Header container -->
      <div class="container-fluid d-flex align-items-center">
        <div class="row">
          <div class="col-lg-12 col-md-10">
            <h1 class="display-2 text-white">{{data.Nom}}_{{data.Prenom}}</h1>
            <p class="text-white mt-0 mb-5">Ceci est le Dossier Medicale </p>
          </div>
        </div>
      </div>
    </div>

<div class="container-fluid mt--6">
      <div class="row">
        <div class="col-xl-4 order-xl-2">
          <div class="card card-profile">
            <div class="row justify-content-center">
              <div class="col-lg-3 order-lg-2">
                <div class="card-profile-image">
                  <a href="#">
                  </a>
                </div>
              </div>
            </div>

            <div class="card-body pt-0">
              <div class="row">
                <div class="col">
                  <div class="card-profile-stats d-flex justify-content-center">
                    <div>
                      <span class="heading">{{counts}}</span>
                      <span class="description">Consultations</span>
                    </div>

                  </div>
                </div>
              </div>
              <div class="text-center">


               <div class="row">
        <div class="col">
          <div class="card">
            <!-- Card header -->
            <div class="card-header border-0">
              <h3 class="mb-0">Derniere Consultation</h3>
            </div>
            <!-- Light table -->
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col" class="sort" data-sort="name">Status</th>
                    <th scope="col" class="sort" data-sort="status">Date</th>
                    <th scope="col" class="sort" data-sort="status"></th>


                  </tr>
                </thead>
                <tbody class="list">
                  <tr v-for="Rende in alls" :key="Rende.id">
                    <th scope="row">
                      <div class="media align-items-center">

                        <div class="media-body">
                          <span class="name mb-0 text-sm">{{Rende.title}}</span>
                        </div>
                      </div>
                    </th>

                    <td>
                      <span class="badge badge-dot mr-4">
                        <i class="bg-warning"></i>
                        <span class="status">{{Rende.date | yymmdd}}</span>
                      </span>
                    </td>
 <td>
                      <span class="badge badge-dot mr-4">
                      <a class="btn btn-success btn-sm"> Afficher plus </a>
                      </span>
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
          </div>
        </div>
        <div class="col-xl-8 order-xl-1">
                                        <form  @submit.prevent="modify()">

          <div class="card">

            <div class="card-header">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">Information du patient </h3>
                </div>
                  <div class="col-4 text-right">
                <button type="submit"  class="btn btn-primay">
                Modifier
                </button>
                </div>
              </div>
            </div>
            <div class="card-body">
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Nom</label>
                        <input type="text" id="input-username"  class="form-control" placeholder="Nom" v-model="data.Nom" value="lucky.jesse">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">Prenom</label>
                        <input type="text" placeholder="Prenom" id="input-email" class="form-control" v-model="data.Prenom">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-first-name">Telephone</label>
                        <input type="text" id="input-first-name" v-model="data.Tel" class="form-control" placeholder="Telephone" >
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-last-name">Derniere Consultation</label>
                        <input type="date" id="input-last-name" class="form-control" v-model="data.Date" placeholder="Derniere Consultation" >
                      </div>
                    </div>
                  </div>
                </div>
                <hr class="my-4" />
                <!-- Address -->




                <!-- Description -->
                <h6 class="heading-small text-muted mb-4">A propos </h6>
                <div class="pl-lg-4">
                  <div class="form-group">
                    <label class="form-control-label">À propos de patient</label>
                        <vue-editor   v-model="data.propos"></vue-editor>
                  </div>
                </div>
            </div>
          </div>
                    </form>

        </div>
      </div>
      <!-- Footer -->

     </div>
    </div>
</template>
  <script>
  import { VueEditor, Quill } from "vue2-editor";
import vue2Dropzone from 'vue2-dropzone'
import "vue2-dropzone/dist/vue2Dropzone.min.css";
export default {
    props :['data','alls','counts'],
      components: {VueEditor
  },
data() {
    return {

        countCons:'',
        allCons:''
    }
},

methods: {

    getPatient(){
      axios.get(`/api/Patient/${this.data.id}`).then(
        this.countCons= response.data.rendez,
        this.allCons= response.data.all,

        ).catch()
    },
    modify(){
        axios.put('/api/Patient/:data.id',this.data).then(
            res=> {
            Vue.toasted.success('La modification fait avec succès',{
            duration:'3000'
                 });
}
        ).catch(error => {
             console.log(error)

         })
    }

},
filters:{

    // cut yyyy-mm-dd format and return date as string
    'yymmdd': function (date) {
      var newDay = new Date(date),
          currentDate = ('0'+newDay.getDate()).slice(-2),
          currentMonth = ('0'+ (newDay.getMonth() + 1) ).slice(-2),
          currentYear = newDay.getFullYear();

      var day = '';
      day = currentYear + '-' + currentMonth + '-' + currentDate;

      return day;
    }

},
mounted(){ this.getPatient();}


}
</script>

<style>

</style>

