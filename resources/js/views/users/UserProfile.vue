<template>
    <div class="px-3">
       <div class="row py-3">
           <div class="col-md-2 p-0">
               <Actions/>
           </div>
           <div class="col-md-8 px-4">
               <Cover/>
               <div class="row mt-4">
                   <div class="col-md-4">
                       <Bio/>
                   </div>
                   <div class="col-md-8">
                       <NewsFeed/>
                   </div>
               </div>
           </div>
           <div class="col-md-2 p-0">
               <Contacts/>
           </div>
       </div>
        
    </div>
</template>
<script>
import Cover from './Cover'
import NewsFeed from './NewsFeed'
import Contacts from './Contacts'
import Bio from './Bio.vue'

   export default{
       name:"UserProfile",
       components:{
           Cover,
           NewsFeed,
           Bio,
           Contacts,
           Actions
       }
   }
</script>
<style>


</style>