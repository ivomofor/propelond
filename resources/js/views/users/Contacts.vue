<template lang="">
    <div>
       <div class="bg-white rounded-3 shadow-sm p-2">
           <p class="like-text">Contacts</p>
           <div class="d-flex align-items-center justify-content-between mt-3">
               <div class="d-flex align-items-center">
                    <img
                    src="/images/user-2.jpg"
                    class="profile-img d-block"
                    alt="profile image"
                   />
                    <span class="mx-2">Lina Gray</span>
               </div>
               <div class="d-flex align-items-center justify-content-center bg-primary rounded-pill px-2 py-1 message-count">
                    <h3 class="text-white text-center message-number mt-2">3</h3>
                </div>
           </div>
           <div class="d-flex align-items-center justify-content-between mt-3">
               <div class="d-flex align-items-center">
                    <img
                    src="/images/user-2.jpg"
                    class="profile-img d-block"
                    alt="profile image"
                   />
                    <span class="mx-2">Lina Gray</span>
               </div>
               <div class="d-flex align-items-center justify-content-center bg-primary rounded-pill px-2 py-1 message-count">
                    <h3 class="text-white text-center message-number mt-2">3</h3>
                </div>
           </div>
           <div class="d-flex align-items-center justify-content-between mt-3">
               <div class="d-flex align-items-center">
                    <img
                    src="/images/user-3.jpg"
                    class="profile-img d-block"
                    alt="profile image"
                   />
                    <span class="mx-2">Sam Gray</span>
               </div>
               <div class="d-flex align-items-center justify-content-center bg-primary rounded-pill px-2 py-1 message-count">
                    <h3 class="text-white text-center message-number mt-2">3</h3>
                </div>
           </div>
           <div class="d-flex align-items-center justify-content-between mt-3">
               <div class="d-flex align-items-center">
                    <img
                    src="/images/user-2.jpg"
                    class="profile-img d-block"
                    alt="profile image"
                   />
                    <span class="mx-2">Lina Gray</span>
               </div>
               <div class="d-flex align-items-center justify-content-center bg-warning p-1 rounded-pill message-indicator">
                    <!-- <h3 class="text-white text-center message-number mt-2">3</h3> -->
                </div>
           </div>
           <div class="d-flex align-items-center justify-content-between mt-3">
               <div class="d-flex align-items-center">
                    <img
                    src="/images/user-2.jpg"
                    class="profile-img d-block"
                    alt="profile image"
                   />
                    <span class="mx-2">Lina Gray</span>
               </div>
               <div class="d-flex align-items-center justify-content-center bg-success p-1 rounded-pill message-indicator">
                    <!-- <h3 class="text-white text-center message-number mt-2">3</h3> -->
                </div>
           </div>
           <div class="d-flex align-items-center justify-content-between mt-3">
               <div class="d-flex align-items-center">
                    <img
                    src="/images/user-2.jpg"
                    class="profile-img d-block"
                    alt="profile image"
                   />
                    <span class="mx-2">Lina Gray</span>
               </div>
               <div class="d-flex align-items-center">
                    <h3 class="last-seen mt-2">6:04pm</h3>
                </div>
           </div>
       </div>
    </div>
</template>
<script>
export default {
    name:'Contacts',
    data() {
        return {
            
        }
    },
}
</script>
<style scoped>
.like-text{
    color: #a5a5a5;
}
.last-seen{
    color: #a5a5a5;
    font-size: 0.7rem;
}
.profile-img {
    width: 2.2rem;
    height: 2.2rem;
    border-radius: 100px;
}
.message-count{
    height: 25px;
}
.message-indicator{
    height: 10px;
    width: 10px;
}
.message-number{
    font-size: 0.8rem;
}
</style>