<template>
 
<div class="container flex-center position-ref full-height" style="margin:20px auto">
                <div class="content">

                  <p>

                    Welcome to the Ordinary Geeks Airline Auction Site.  This is the welcome and explanation page.
                    From here, anyone can add (and yes edit and delete) airplanes - for demo purposes.

                    If you register/login, you can see a listing of airplanes.  Logging in/Registering, Going to the Airplanes link, and clicking See More Info And Bid will show you a 
                    detailed view and let you update/delete/bid on the airplanes.

                    You can only see your bids.  You cannot delete/edit a bid.  The current high bid will be set
                    in addition to a notification if you successfully bid on an item.  There is no threading/redudancy/sanity checks.

                    The List Your Airplane site is on a vue SPA.  Everything else is on static laravel / php.

                    In future versions, Id like to add a search by part name, not allow editing/deletion of anyones airplanes but your own,
                    and some graphics.

                    Regards, Alecto (Nathaniel S)

                    </p>
        <div class="title m-b-md">
    Airplane
</div>
        <div class="alert alert-danger" role="alert" v-bind:class="{hidden: hasError}">
    All fields are required!
</div>
   

        <div class="form-group">
            <label for="name">Airplane Name</label>
            <input name="name" id="name" v-model="airplane.name" 
            required  type ="text" class="form-control" >
  
        </div>
        
        <div class="form-group">
            <label for="model">Airplane Model</label>
            <input name="model" id="model" type="text" v-model="airplane.model"  required
              class="form-control">
        </div>
        <div class="form-group">
            <label for="built">Airplane Creation Date</label>
            <input type="date" required v-model="airplane.built" name="built"
             id="built" class="form-control" 
            
            placeholder="Enter Date Built">
           
        </div>
        <div class="form-group">
            <label for="parts">Airplane Parts</label>
            <textarea name="parts" required id="parts" v-model="airplane.parts" 
            rows="4" class="form-control" placeholder="Enter Airplane Parts">
            </textarea>
           
        </div>
        <div class="form-group">
            <label for="current">Airplane Current High Bid</label>
            <input name="current" v-model="airplane.current" required
              id="current"   class="form-control" >
          
        </div>
                
        <div class="form-group">
            <label for="increment">Airplane Minimum Increase</label>
            <input name="increment" v-model="airplane.increment" required 
             id="increment"   class="form-control" >
           
        </div>
                
        <div class="form-group">
            <label for="outright">Airplane Outright Buy</label>
            <input name="outright" v-model="airplane.outright"  required 
            id="outright"  class ="form-control">
          
        </div>
        <button @click.prevent="createAirplane(); " class="btn btn-primary">Create</button>
        
        <table class="table table-striped" id="table">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Model</th>
                        <th scope="col">Built</th>
                        <th scope="col">Parts</th>
                        <th scope="col">Current</th>
                        <th scope="col">Increment</th>
                        
                        <th scope="col">Outright</th>
                       
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for ="airplane in airplanes" :key="airplane.id">
                        <th scope="row">@{{airplane.id}}</th>
                        <td>@{{airplane.name}}</td>
                        <td>@{{airplane.model}}</td>
                        <td>@{{airplane.built}}</td>
                        <td>@{{airplane.parts}}</td>
                        <td>@{{airplane.current2}}</td>

                        <td>@{{airplane.increment2}}</td>
                        <td>@{{airplane.outright2}}</td>
                        <td @click="setVal(airplane.id, airplane.name, airplane.model,
                        airplane.built, airplane.parts, airplane.current2, airplane.increment2,
                        airplane.outright2)" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal"><i class="fa fa-pencil"></i>
                        Edit
                        </td>
                        <td  @click.prevent="deleteAirplane(airplane)" class="btn btn-danger"> 
                        <i class="fa fa-trash"></i>
                        Delete
                        </td>
                        </tr>
                    </tbody>
                </table>

                    <!-- Modal -->
                    <div id="myModal" class="modal fade" role="dialog">
                    <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Edit airplane</h4>
                        </div>
                        <div class="modal-body">
                            
                        <input type="hidden" disabled class="form-control" id="e_id" name="id" required  :value="this.e_id">
                        Name: <input type="text" class="form-control" id="e_name" name="name"  required  :value="this.e_name">
                        Model: <input type="text" class="form-control" id="e_model" name="model"  required  :value="this.e_model">
                        Built: <input type="date" class="form-control" id="e_built" name="built"  required  :value="this.e_built">
                        Parts: <textarea row="4" class="form-control" id="e_parts" name="parts"  required  :value="this.e_parts"/>
                        Current High Bid: <input type="number" class="form-control" id="e_current" name="current" required  :value="this.e_current">
                        Increment Minimum: <input type="number" class="form-control" id="e_increment" name="increment"  required  :value="this.e_increment">
                        Outright Buy Price: <input type="number" class="form-control" id="e_outright" name="outright"  required  :value="this.e_outright">
                                            
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-primary" @click="editAirplane()" data-dismiss="modal">Save changes</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                        </div>

                    </div>
                    </div>
                </div>
            </div>
       
        
</template>

<script>
const default_layout = "default";
export default{
  
  data(){
return{
    hasError:true,
      airplane:{'name':'', 'model':'', 'built':'',
       'parts':'', 'current':'',
    'increment' :'', 'outright':''},
   
    airplanes:[],
    e_id: 0,
    e_name:'',
    e_model:'',
    e_built:null,
    e_parts:'',
    e_current:0,
    e_increment:0,
    e_outright:0
}
  },
  mounted: function mounted(){
      this.getAirplanes();
  },
  methods:{
      getAirplanes: function getAirplanes(){
          var _this = this;
          axios.get('/getAirplanes').then(function(response){
              _this.airplanes = response.data;
          }).catch(error => {console.log("Get All: "+error);});
        },
        createAirplane: function createAirplane(){

            var input = this.airplane;
            input[window.csrfTokenName] = window.csrfTokenValue;
            var _this = this;
            if(input['name'] == '' || input['model'] == '' || input['parts'] == '' || input['built'] == ''
            || input['current'] == '' || input['outright'] == '' || input['increment'] == '')
            {this.hasError = false;
            }
            else{

                this.hasError = true;
                axios.post('/storeAirplane', input).then(function(response)
                {_this.airplane = {'name':'', 'model':'', 'parts':'',
            'built':null, 'increment':0, 'current':0, 'outright':0}
        _this.getAirplanes();}).catch(error=>{
            console.log("Insert: " +error);
        });
            }
        },
        deleteAirplane: function deleteAirplane(airplane){
            var _this = this;
            axios.post('/deleteAirplane/'+airplane.id).then(function(response){

                _this.getAirplanes();
            }).catch(error=>{ console.log("Delete airplane: " + error);
        });
        },
        setVal(    e_id,
            e_name,
            e_model,
            e_built,
            e_parts,
            e_current,
            e_increment,
            e_outright)
            {
                this.e_id= e_id,
                this.e_name=e_name,
                this.e_model=e_model,
                this.e_built=e_built,
                this.e_parts=e_parts,
                this.e_current=e_current,
                this.e_increment=e_increment,
                this.e_outright=e_outright
            },
        editAirplane: function(){

            var _this = this;
            var idval = document.getElementById('e_id');
            var nameval= document.getElementById('e_name');
            var modelval = document.getElementById('e_model');
            var builtval = document.getElementById('e_built');
            var partsval= document.getElementById('e_parts');
            var currentval= document.getElementById('e_current');
            var incrementval= document.getElementById('e_increment');
            var outrightval= document.getElementById('e_outright');
            var model = document.getElementById('myModal').nodeValue;
          
            axios.post('editAirplane/' + idval.value, 
            {val_1:nameval.value, val_2:modelval.value, 
                val_3:builtval.value,
            val_4:partsval.value, val_5 : currentval.value, 
            val_6:incrementval.value, val_7:outrightval.value,csrfTokenName: window.csrfTokenValue  }).then(
                response=>{_this.getAirplanes();});},
                }
};
</script>



