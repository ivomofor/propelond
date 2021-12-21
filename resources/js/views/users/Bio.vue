<template lang="">
    <div class="px-0">
        <div class="bg-white rounded-3 shadow-sm px-3 py-3">
            <div class="d-flex align-items-center justify-content-between">
                <h1 class="about-text">About</h1>
                <h1 class="edit-text text-primary">Edit</h1>
            </div>
            <p class="bio-paragraph mt-3">
                Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean
                commodo ligula eget dolor.Aenean.Cum sociis natoque penatibus et
                magnis dis parturient montes, nascetur ridiculus mus.Donec pede
            </p>
            <div class="mt-3">
                <div class="d-flex align-items-center mb-2">
                    <svg style="color:#a5a5a5;"  width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0 1 12 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v2m4 6h.01M5 20h14a2 2 0 0 0 2-2V8a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2z"/></svg>
                    <span class="like-text ms-2">Place of work</span>
                </div>
                <div class="d-flex align-items-start mb-2">
                   <svg style="color:#a5a5a5;"  width="35" height="35" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                     <path d="m12 14 9-5-9-5-9 5 9 5z"/><path d="m12 14 6.16-3.422a12.083 12.083 0 0 1 .665 6.479A11.952 11.952 0 0 0 12 20.055a11.952 11.952 0 0 0-6.824-2.998 12.078 12.078 0 0 1 .665-6.479L12 14z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m12 14 9-5-9-5-9 5 9 5zm0 0 6.16-3.422a12.083 12.083 0 0 1 .665 6.479A11.952 11.952 0 0 0 12 20.055a11.952 11.952 0 0 0-6.824-2.998 12.078 12.078 0 0 1 .665-6.479L12 14zm-4 6v-7.5l4-2.222"/>
                   </svg>
                    <span class="like-text ms-2">Studied at the Academy of International Relations</span>
                </div>
                <div class="d-flex align-items-center mb-2">
                   <svg style="color:#a5a5a5;"  width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657 13.414 20.9a1.998 1.998 0 0 1-2.827 0l-4.244-4.243a8 8 0 1 1 11.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/></svg>
                    <span class="like-text ms-2">City</span>
                </div>
                <div class="d-flex align-items-center mb-2">
                   <svg style="color:#a5a5a5;"  width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 0 1 2 2v1a2 2 0 0 0 2 2 2 2 0 0 1 2 2v2.945M8 3.935V5.5A2.5 2.5 0 0 0 10.5 8h.5a2 2 0 0 1 2 2 2 2 0 1 0 4 0 2 2 0 0 1 2-2h1.064M15 20.488V18a2 2 0 0 1 2-2h3.064M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0z"/></svg>
                    <span class="like-text ms-2">Country</span>
                </div>
            </div>
        </div>
        <div class="bg-white rounded-3 shadow-sm px-3 py-3 mt-3">
            <div class="d-flex align-items-center justify-content-between">
                <h1 class="about-text">Photo</h1>
                <h1 class="edit-text text-primary">Edit</h1>
            </div>
        </div>
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
