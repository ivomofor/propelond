<template>
    <div class="">
        <div class="row">
            <div class="bg-white rounded-3 shadow-sm p-3">
                <!-- cover image -->
                <div class="bg-danger rounded-3 cover-img">
                    <img
                        src="/images/cover.jpg"
                        class="img-fluid rounded-3"
                        alt="cover image"
                    />
                </div>
                <!-- profile image -->
                <div
                    class="d-flex align-items-center justify-content-center flex-column"
                >
                    <img
                        src="/images/profile.jpg"
                        class="img-thumbnail profile-img d-block"
                        alt="profile image"
                    />

                    <!-- user details -->
                    <div class="user-details mt-3">
                        <h1 class="user-name text-center">Max Bravis</h1>
                        <h3 class="user-location text-center">City, Country</h3>
                    </div>
                </div>

                <!-- user details action -->
                <div
                    class="user-action d-flex aligne-items-center justify-content-between py-3 mt-3"
                >
                    <div class="d-flex align-items-center">
                        <div class="d-flex aligne-items-center">
                            <button class="user-action-btn btn">
                                Publications
                            </button>
                            <button class="user-action-btn btn">
                                information
                            </button>
                            <div class="user-action-btn dropdown">
                                <button
                                    class="btn dropdown-toggle"
                                    type="button"
                                    id="dropdownMenuButton1"
                                    data-bs-toggle="dropdown"
                                    aria-expanded="false"
                                >
                                    More
                                </button>
                                <ul
                                    class="dropdown-menu"
                                    aria-labelledby="dropdownMenuButton1"
                                >
                                    <li>
                                        <a class="dropdown-item" href="#"
                                            >Action</a
                                        >
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="#"
                                            >Another action</a
                                        >
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="#"
                                            >Something else here</a
                                        >
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex aligne-items-center">
                        <button
                            class="user-action-btn btn btn-primary rounded-pill mx-1"
                        >
                            Add Story
                        </button>
                        <button
                            class="user-action-btn edit-profile-btn btn rounded-pill btn-light mx-1"
                        >
                            Edit Profile
                        </button>
                    </div>
                </div>
            </div>
            <!-- recomended users -->
            <div class="bg-white rounded-3 shadow-sm p-3 mt-3 h-auto overflow-hidden">
                <p class="">Recomended Users</p>
                <div class="d-flex align-items-center justify-content-center pb-3 mb-3">
                    <div
                        class="mx-1 rounded-3 border-1 shadow-sm"
                        v-for="user in users"
                        :key="user.name">
                        <div class="recomended-users-card">
                            <img :src="user.image_src" class="card-img-top" alt="recomded-users" />
                            <div class="p-2 card-body"> 
                                <p class="card-text text-center">
                                    {{user.name}}
                                </p>
                        
                            </div>
                        </div>
                    </div>
                </div>
                <p class="text-white">ffffffffffffffffffff</p>
            </div>
            
        </div>
    </div>
</template>
<script>
export default {
    name: "Cover",
    data() {
        return {
            users: [
                // { name: "Sam Gug", image_src: "/images/user-1.jpg" },
                { name: "Lina Gray", image_src: "/images/user-2.jpg" },
                { name: "Kelly Storm", image_src: "/images/user-3.jpg" },
                { name: "Andy Brams", image_src: "/images/user-4.jpg" },
                { name: "Janet L. ", image_src: "/images/user-5.jpg" },
                { name: "Gary L. Dingus", image_src: "/images/user-6.jpg" },
                   {name:'Willie B. Pease',image_src: '/images/user-7.jpg'},
            ],
            profile_image: "/img/profile.jpg",
        };
        
    },
};
</script>
<style scoped>

/* --------- user-profile -------- */
.cover-img{
    height: 40vh;
    overflow: hidden;
}
.profile-img{
    width: 8.2rem;
    height: 8rem;
    border-radius: 100px;
    margin-top: -4rem;
}

/* user-details */
.user-name{
    font-weight: bold;
    font-family: 'roboto','sans-serif';
    font-size: 2rem;
}
.user-location{
    font-size: 1rem;
    font-family: 'roboto','sans-serif';
    font-weight: 400;
}


/* user-deatails-action */
.user-action{
    border-bottom: #EEEEEE 2px solid;
    border-top: #EEEEEE 2px solid;
}
.user-action-btn{
    border-bottom: #fff;
    outline: none;
}
.user-action-btn:focus{
    border-bottom: #0066FA 4px solid;
    outline: none;
}

.edit-profile-btn{
    background-color: #D2E3FF;
}

.recomended-users-card{
    height: 6rem;
   
}
.card-body{
 background-color: #F6F8FC;
 border: #cbd9f0 1px solid;
}
.card-img-top{
    height: 8rem;
    width: 7.5rem;
}
</style>
