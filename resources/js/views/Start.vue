<template>
  <div class="px-2">
    <div class="row">
      <div class="col-md-2">
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
                <svg
                  style="color: #a5a5a5"
                  width="20"
                  height="20"
                  fill="none"
                  viewBox="0 0 24 24"
                  stroke="currentColor"
                >
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M16 7a4 4 0 1 1-8 0 4 4 0 0 1 8 0zm-4 7a7 7 0 0 0-7 7h14a7 7 0 0 0-7-7z"
                  />
                </svg>
                <span class="like-text ms-2">My Profile</span>
              </div>
              <div class="d-flex align-items-start mb-2">
                <svg
                  style="color: #a5a5a5"
                  width="20"
                  height="20"
                  fill="none"
                  viewBox="0 0 24 24"
                  stroke="currentColor"
                >
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M12 4.354a4 4 0 1 1 0 5.292M15 21H3v-1a6 6 0 0 1 12 0v1zm0 0h6v-1a6 6 0 0 0-9-5.197M13 7a4 4 0 1 1-8 0 4 4 0 0 1 8 0z"
                  />
                </svg>
                <span class="like-text ms-2">Friends</span>
              </div>
              <div class="d-flex align-items-center mb-2">
                <svg
                  style="color: #a5a5a5"
                  width="20"
                  height="20"
                  fill="none"
                  viewBox="0 0 24 24"
                  stroke="currentColor"
                >
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="m15 10 4.553-2.276A1 1 0 0 1 21 8.618v6.764a1 1 0 0 1-1.447.894L15 14M5 18h8a2 2 0 0 0 2-2V8a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2z"
                  />
                </svg>
                <span class="like-text ms-2">Videos</span>
              </div>
              <div class="d-flex align-items-center mb-2">
                <svg
                  style="color: #a5a5a5"
                  width="20"
                  height="20"
                  fill="none"
                  viewBox="0 0 24 24"
                  stroke="currentColor"
                >
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M3.055 11H5a2 2 0 0 1 2 2v1a2 2 0 0 0 2 2 2 2 0 0 1 2 2v2.945M8 3.935V5.5A2.5 2.5 0 0 0 10.5 8h.5a2 2 0 0 1 2 2 2 2 0 1 0 4 0 2 2 0 0 1 2-2h1.064M15 20.488V18a2 2 0 0 1 2-2h3.064M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0z"
                  />
                </svg>
                <span class="like-text ms-2">Groups</span>
              </div>
              <div class="d-flex align-items-center mb-2">
                <svg
                  style="color: #a5a5a5"
                  width="20"
                  height="20"
                  fill="none"
                  viewBox="0 0 24 24"
                  stroke="currentColor"
                >
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M17 8h2a2 2 0 0 1 2 2v6a2 2 0 0 1-2 2h-2v4l-4-4H9a1.994 1.994 0 0 1-1.414-.586m0 0L11 14h4a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h2v4l.586-.586z"
                  />
                </svg>
                <span class="like-text ms-2">Chats</span>
              </div>
            </div>
          </div>
        </div>
      </div>
     
      <!-- friends -->
      <div class="col-md-2">
        <div>
       <div class="bg-white rounded-3 shadow-sm">
           <div class="d-flex align-items-center justify-content-between p-3 border-bottom">
                <h1 class="about-text">Friend Request</h1>
                <h1 class="edit-text text-primary">See All</h1>
            </div>
          <div class="">
               <div class="d-flex align-items-center justify-content-between px-2">
              <div class="d-flex align-items-center">
                <img
                 src="/images/user-2.jpg"
                  class="profile-img"
                  alt="poster-image"
                />
                <div class="px-3 mt-2">
                  <p class="poster-name">
                   Lina Gray
                  </p>
                  <p class="post-time">12 mutual friends</p>
                </div>
              </div>
            </div>
            <div class="d-flex px-2">
                <button class="btn btn-primary rounded-pill px-2 me-2">Friend Request</button>
                <button class="btn btn-light rounded-pill px-2">Delete</button>
            </div>
          </div>
          <div class="my-2">
               <div class="d-flex align-items-center justify-content-between px-2">
              <div class="d-flex align-items-center">
                <img
                 src="/images/user-2.jpg"
                  class="profile-img"
                  alt="poster-image"
                />
                <div class="px-3 mt-2">
                  <p class="poster-name">
                   Lina Gray
                  </p>
                  <p class="post-time">12 mutual friends</p>
                </div>
              </div>
            </div>
            <div class="d-flex px-2">
                <button class="btn btn-primary rounded-pill px-2 me-2">Friend Request</button>
                <button class="btn btn-light rounded-pill px-2">Delete</button>
            </div>
          </div>
          <div class="my-2 py-2">
               <div class="d-flex align-items-center justify-content-between px-2">
              <div class="d-flex align-items-center">
                <img
                 src="/images/user-2.jpg"
                  class="profile-img"
                  alt="poster-image"
                />
                <div class="px-3 mt-2">
                  <p class="poster-name">
                   Lina Gray
                  </p>
                  <p class="post-time">12 mutual friends</p>
                </div>
              </div>
            </div>
            <div class="d-flex px-2">
                <button class="btn btn-primary rounded-pill px-2 me-2">Friend Request</button>
                <button class="btn btn-light rounded-pill px-2">Delete</button>
            </div>
          </div>
           
       </div>
       </div>
      </div>
      <!-- contacts -->
      <div class="col-md-2">
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
      </div>
    </div>
  </div>
</template>
<script>
export default {
  name: "Start",
  data() {
    return {
     
    };
  },
};
</script>
<style scoped>
.about-text {
  font-size: 0.8rem;
}
.edit-text {
  font-size: 0.8rem;
}
.like-text {
  color: #a5a5a5;
}
create-post-text {
  color: rgb(189, 188, 188);
  font-size: 0.8rem;
}
.option-btn {
  background-color: rgba(223, 223, 223, 0.801);
  border-radius: 100px;
  width: 2.5rem;
}
.pencil-icon {
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
.poster-name {
  font-weight: bold;
  margin-bottom: -0.1rem;
}
.post-time {
  font-size: 0.8rem;
  color: #c7ccd1;
}
.post-image {
  width: 39.2rem;
}
.like-btn {
  outline: none;
  border: none;
  background-color: #fff;
}
.like-text {
  color: #a5a5a5;
}
/* .comment-box {
    border: 1px solid rgb(238, 238, 238);
    border-radius: 15px;
} */
.comment-box {
  background-color: #eeeeee;
}
.comment-input {
  background-color: #eeeeee;
  border: none;
  outline: none;
}

/* contacts */
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
