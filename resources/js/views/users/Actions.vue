<template lang="">
    <div class="px-0">
        <div class="bg-white rounded-3 shadow-sm px-3 py-3">
            <div class="d-flex align-items-center justify-content-between">
                <h1 class="about-text">News Feed</h1>
                <!-- <h1 class="edit-text text-primary">Edit</h1> -->
            </div>
            <!-- <p class="bio-paragraph mt-3">
                Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean
                commodo ligula eget dolor.Aenean.Cum sociis natoque penatibus et
                magnis dis parturient montes, nascetur ridiculus mus.Donec pede
            </p> -->
            <div class="mt-3">
                <div class="d-flex align-items-center mb-2">
                   <svg style="color:#a5a5a5;"  width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 1 1-8 0 4 4 0 0 1 8 0zm-4 7a7 7 0 0 0-7 7h14a7 7 0 0 0-7-7z"/></svg>
                    <span class="like-text ms-2">My Profile</span>
                </div>
                <div class="d-flex align-items-start mb-2">
                   <svg style="color:#a5a5a5;"  width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 1 1 0 5.292M15 21H3v-1a6 6 0 0 1 12 0v1zm0 0h6v-1a6 6 0 0 0-9-5.197M13 7a4 4 0 1 1-8 0 4 4 0 0 1 8 0z"/></svg>
                    <span class="like-text ms-2">Friends</span>
                </div>
                <div class="d-flex align-items-center mb-2">
                   <svg style="color:#a5a5a5;"  width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m15 10 4.553-2.276A1 1 0 0 1 21 8.618v6.764a1 1 0 0 1-1.447.894L15 14M5 18h8a2 2 0 0 0 2-2V8a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2z"/></svg>
                    <span class="like-text ms-2">Videos</span>
                </div>
                <div class="d-flex align-items-center mb-2">
                   <svg style="color:#a5a5a5;"  width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 0 1 2 2v1a2 2 0 0 0 2 2 2 2 0 0 1 2 2v2.945M8 3.935V5.5A2.5 2.5 0 0 0 10.5 8h.5a2 2 0 0 1 2 2 2 2 0 1 0 4 0 2 2 0 0 1 2-2h1.064M15 20.488V18a2 2 0 0 1 2-2h3.064M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0z"/></svg>
                    <span class="like-text ms-2">Groups</span>
                </div>
                <div class="d-flex align-items-center mb-2">
                   <svg style="color:#a5a5a5;"  width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8h2a2 2 0 0 1 2 2v6a2 2 0 0 1-2 2h-2v4l-4-4H9a1.994 1.994 0 0 1-1.414-.586m0 0L11 14h4a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h2v4l.586-.586z"/></svg>
                    <span class="like-text ms-2">Chats</span>
                </div>
            </div>
        </div>
        <!-- <div class="bg-white rounded-3 shadow-sm px-3 py-3 mt-3">
            <div class="d-flex align-items-center justify-content-between">
                <h1 class="about-text">Photo</h1>
                <h1 class="edit-text text-primary">Edit</h1>
            </div>
        </div> -->
    </div>
</template>
<script>
export default {
    name: "Bio",
    data() {
        return {
            bio:[
                {

                }
            ],
        }
    },
};
</script>
<style scoped>
.about-text {
    font-size: 1rem;
}
.edit-text {
    font-size: 1rem;
}
.like-text{
    color: #a5a5a5;
}
</style>
