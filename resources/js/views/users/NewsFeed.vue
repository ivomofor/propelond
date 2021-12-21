<template>
    <div class="px-2">
        <div class="rounded-3 bg-white p-3 shadow-sm my-2">
            <div class="d-flex align-items-center">
               <div class="d-flex align-content-center align-items-center px-2 py-2 pencil-icon">
                    <svg class="text-primary" width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m15.232 5.232 3.536 3.536m-2.036-5.036a2.5 2.5 0 1 1 3.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/></svg>
               </div>
                <span class="mx-1 create-post-text">Create Post</span>
            </div>
            <!-- create post box -->
            <div class="d-flex align-items-center px-1 mt-3 create-post-box py-1">
                <img
                    src="/images/profile.jpg"
                    class="profile-img d-block"
                    alt="profile image"
                />
                <!-- <input type="text" class="mx-2 input-box flex-grow-1" placeholder="What's on your mind?"> -->
                <textarea
                    name
                    id
                    cols="30"
                    rows="1"
                    class="mx-2 input-box flex-grow-1"
                    placeholder="What's on your mind?"
                ></textarea>
            </div>
            <div class="d-flex align-items-center mt-2">
                 <div class="d-flex align-items-center py-2 me-2">
                     <button class="like-btn d-flex align-items-center justify-content-center">
                         <svg class="text-danger" width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m15 10 4.553-2.276A1 1 0 0 1 21 8.618v6.764a1 1 0 0 1-1.447.894L15 14M5 18h8a2 2 0 0 0 2-2V8a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2z"/>
                         </svg>
                     </button>
                     <span class="">Live Video</span>
                 </div>
                 <div class="d-flex align-items-center py-2 me-2">
                     <button class="like-btn d-flex align-items-center justify-content-center">
                        <svg class="text-success" width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m4 16 4.586-4.586a2 2 0 0 1 2.828 0L16 16m-2-2 1.586-1.586a2 2 0 0 1 2.828 0L20 14m-6-6h.01M6 20h12a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2H6a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2z"/></svg>
                     </button>
                     <span class="">Photo/Video</span>
                 </div>
                 <div class="d-flex align-items-center py-2 me-2">
                     <button class="like-btn d-flex align-items-center justify-content-center">
                        <svg class="text-warning" width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 0 1 2-2h.93a2 2 0 0 0 1.664-.89l.812-1.22A2 2 0 0 1 10.07 4h3.86a2 2 0 0 1 1.664.89l.812 1.22A2 2 0 0 0 18.07 7H19a2 2 0 0 1 2 2v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V9z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/></svg>
                     </button>
                     <span class="">Feeling/Activity</span>
                 </div>
            </div>
        </div>
        <!-- browse news feed -->
        <div class="mt-2">
            <div class="rounded-3 bg-white p-3 shadow-sm mt-3" 
             v-for="post in posts" :key="post.poster_name">
                <div class="d-flex align-items-center justify-content-between">
                    <div class="d-flex align-items-center">
                        <img :src="post.poster_image" class="poster-img" alt="poster-image" />
                        <div class="px-3 mt-2">
                            <p class="poster-name">{{post.poster_name}}</p>
                            <p class="post-time">{{post.time}}</p>
                        </div>
                    </div>
                    <button class="option-btn btn p-2 ">
                        <svg style="color:#a5a5a5;"  width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/></svg>
                    </button>
                </div>
                <p class="my-2">{{post.post_description}}</p>
                <img :src="post.post_img" class="rounded-3 mt-2 post-image" />
                <div class="d-flex align-items-center justify-content-between py-2" style="border-bottom:1px solid #E8EAED ">
                    <div class="d-flex align-items-center">
                        <div class="d-flex align-items-center py-2 me-2">
                            <button class="like-btn d-flex align-items-center justify-content-center">
                                <svg  
                                class="like-icon" style="color:#a5a5a5;"  width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 10h4.764a2 2 0 0 1 1.789 2.894l-3.5 7A2 2 0 0 1 15.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 0 0-2-2h-.095c-.5 0-.905.405-.905.905a3.61 3.61 0 0 1-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 0 1-2-2v-6a2 2 0 0 1 2-2h2.5"/>
                                </svg>
                            </button>
                            <span class="like-text">{{post.post_likes}}</span>
                        </div>
                        <div class="d-flex align-items-center py-2 ms-2">
                            <button class="like-btn d-flex align-items-center justify-content-center">
                                <svg  class="like-icon" style="color:#a5a5a5;"  width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 0 1-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/></svg>
                            </button>
                            <span class="like-text">{{post.post_comments}}</span>
                        </div>
                    </div>
                    <div class="ms-auto">
                         <div class="d-flex align-items-center py-2 me-2">
                            <button class="like-btn d-flex align-items-center justify-content-center">
                                <svg class="like-icon" style="color:#a5a5a5;"  width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 1 1 0-2.684m0 2.684 6.632 3.316m-6.632-6 6.632-3.316m0 0a3 3 0 1 0 5.367-2.684 3 3 0 0 0-5.367 2.684zm0 9.316a3 3 0 1 0 5.368 2.684 3 3 0 0 0-5.368-2.684z"/></svg>
                            </button>
                            <span class="like-text ms-2">share</span>
                         </div>
                    </div>
                </div>
                 <!-- comment  box -->
                <div class="d-flex align-items-center px-1 mt-3">
                    <img
                        src="/images/profile.jpg"
                        class="profile-img d-block"
                        alt="profile image"
                    />
                    <div class="d-flex align-items-center comment-box flex-grow-1 border rounded-pill px-2 py-1 ms-2">
                        <textarea
                        name
                        id
                        cols="45"
                        rows="1"
                        class="me-auto comment-input"
                        placeholder="Your Comment"></textarea>
                        <div class="d-flex align-items-center">
                            <button class="btn px-1 py-0">
                                <svg style="color:#a5a5a5;"  width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 0 1 2-2h.93a2 2 0 0 0 1.664-.89l.812-1.22A2 2 0 0 1 10.07 4h3.86a2 2 0 0 1 1.664.89l.812 1.22A2 2 0 0 0 18.07 7H19a2 2 0 0 1 2 2v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V9z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/></svg>
                            </button>
                            <button class="btn px-1 py-0">
                                <svg style="color:#a5a5a5;"  width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 0 1-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0z"/></svg>
                            </button>
                        </div>
                    </div>
                </div>
                


            </div>
            
        </div>
    </div>
</template>
<script>
export default {
    name: "NewsFeed",
    data() {
        return {
            posts: [
                {
                    poster_name: "Lina Gray", poster_image: "/images/user-2.jpg", time:"2 hours ago",
                    post_img:"/images/post-1.jpg",
                    post_likes:"1.3K",
                    post_comments:"12",
                    post_description: "Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.Aenean.Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu.In enim justo, rhoncus ut, imperdiet venenatis vitae, justo."
                },
                {
                    poster_name: "Lina Gray", poster_image: "/images/user-2.jpg", time:"10 min ago",
                    post_img:"",
                    post_likes:"1.3K",
                    post_comments:"21",
                    post_description: "Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.Aenean.Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu.In enim justo, rhoncus ut, imperdiet venenatis vitae, justo."
                },
                {
                    poster_name: "Lina Gray", poster_image: "/images/user-2.jpg", time:"10 min ago",
                    post_img:"/images/post-1.jpg",
                    post_likes:"1.3K",
                    post_comments:"12",
                    post_description:"Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.Aenean.Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu.In enim justo, rhoncus ut, imperdiet venenatis vitae, justo."
                },
            ]
        };
    },
};
</script>
<style scoped>
.create-post-text {
    color: rgb(189, 188, 188);
    font-size: 0.8rem;
}
.option-btn{
    background-color: rgba(223, 223, 223, 0.801);
    border-radius: 100px;
    width: 2.5rem;
}
.pencil-icon{
    background-color: rgba(133, 122, 228, 0.24);
    border-radius: 100px;
}
/* create post box */
.profile-img {
    width: 2.2rem;
    height: 2.2rem;
    border-radius: 100px;
}
.create-post-box {
    border: 1px solid rgb(238, 238, 238);
    border-radius: 15px;
}
.input-box {
    border: none;
    outline: none;
}
/* browse news feed  */
.poster-img {
    width: 3.2rem;
    height: 3.2rem;
    border-radius: 100px;
}
.poster-name{
    font-weight: bold;
    margin-bottom: -0.1rem;
}
.post-time{
    font-size: 0.8rem;
    color: #C7CCD1;
}
.post-image{
    width: 32rem;
}
.like-btn{
    outline: none;
    border: none;
    background-color: #fff;
}
.like-text{
    color: #a5a5a5;
}
/* .comment-box {
    border: 1px solid rgb(238, 238, 238);
    border-radius: 15px;
} */
.comment-box{
    background-color: #EEEEEE;
}
.comment-input{
    background-color: #EEEEEE;
    border: none;
    outline: none;
}

</style>
