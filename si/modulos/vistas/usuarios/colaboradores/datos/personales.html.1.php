<div class="form-row mx-4">
<div class="col mb-3">
  <h6 class="form-text m-0">General</h6>
  <p class="form-text text-muted m-0">Setup your general profile details.</p>
</div>
</div>
<div class="form-row mx-4">
<div class="col-lg-8">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="firstName">First Name</label>
      <input type="text" class="form-control" id="firstName" value="Sierra">
    </div>
    <div class="form-group col-md-6">
      <label for="lastName">Last Name</label>
      <input type="text" class="form-control" id="lastName" value="Brooks">
    </div>
    <div class="form-group col-md-6">
      <label for="userLocation">Location</label>
      <div class="input-group input-group-seamless">
        <div class="input-group-prepend">
          <div class="input-group-text">
            <i class="material-icons">&#xE0C8;</i>
          </div>
        </div>
        <input type="text" class="form-control" value="Remote">
      </div>
    </div>
    <div class="form-group col-md-6">
      <label for="phoneNumber">Phone Number</label>
      <div class="input-group input-group-seamless">
        <div class="input-group-prepend">
          <div class="input-group-text">
            <i class="material-icons">&#xE0CD;</i>
          </div>
        </div>
        <input type="text" class="form-control" id="phoneNumber" value="+40 1234 567 890">
      </div>
    </div>
    <div class="form-group col-md-6">
      <label for="emailAddress">Email</label>
      <div class="input-group input-group-seamless">
        <div class="input-group-prepend">
          <div class="input-group-text">
            <i class="material-icons">&#xE0BE;</i>
          </div>
        </div>
        <input type="email" class="form-control" id="emailAddress">
      </div>
    </div>
    <div class="form-group col-md-6">
      <label for="displayEmail">Display Email Publicly</label>
      <select class="custom-select">
        <option value="1" selected>Yes, display my email</option>
        <option value="2">No, do not display my email.</option>
      </select>
    </div>
  </div>
</div>
<div class="col-lg-4">
  <label for="userProfilePicture" class="text-center w-100 mb-4">Profile Picture</label>
  <div class="edit-user-details__avatar m-auto">
    <img src="images/avatars/0.jpg" alt="User Avatar">
    <label class="edit-user-details__avatar__change">
      <i class="material-icons mr-1">&#xE439;</i>
      <input type="file" id="userProfilePicture" class="d-none">
    </label>
  </div>
  <button class="btn btn-sm btn-white d-table mx-auto mt-4"><i class="material-icons">&#xE2C3;</i> Upload Image</button>
</div>
</div>
<div class="form-row mx-4">
<div class="form-group col-md-6">
  <label for="userBio">Bio</label>
  <textarea style="min-height: 87px;" id="userBio" name="userBio" class="form-control">I'm a design focused engineer.</textarea>
</div>
<div class="form-group col-md-6">
  <label for="userTags">Tags</label>
  <input id="userTags" name="userTags" value="User Experience,UI Design, React JS, HTML & CSS, JavaScript, Bootstrap 4" class="d-none">
</div>
</div>
<hr>
<div class="form-row mx-4">
<div class="col mb-3">
  <h6 class="form-text m-0">Social</h6>
  <p class="form-text text-muted m-0">Setup your social profiles info.</p>
</div>
</div>
<div class="form-row mx-4">
<div class="form-group col-md-4">
  <label for="socialFacebook">Facebook</label>
  <div class="input-group input-group-seamless">
    <div class="input-group-prepend">
      <div class="input-group-text">
        <i class="fab fa-facebook-f"></i>
      </div>
    </div>
    <input type="text" class="form-control" id="socialFacebook">
  </div>
</div>
<div class="form-group col-md-4">
  <label for="socialTwitter">Twitter</label>
  <div class="input-group input-group-seamless">
    <div class="input-group-prepend">
      <div class="input-group-text">
        <i class="fab fa-twitter"></i>
      </div>
    </div>
    <input type="email" class="form-control" id="socialTwitter">
  </div>
</div>
<div class="form-group col-md-4">
  <label for="socialGitHub">GitHub</label>
  <div class="input-group input-group-seamless">
    <div class="input-group-prepend">
      <div class="input-group-text">
        <i class="fab fa-github"></i>
      </div>
    </div>
    <input type="text" class="form-control" id="socialGitHub">
  </div>
</div>
</div>
<div class="form-row mx-4">
<div class="form-group col-md-4">
  <label for="socialSlack">Slack</label>
  <div class="input-group input-group-seamless">
    <div class="input-group-prepend">
      <div class="input-group-text">
        <i class="fab fa-slack"></i>
      </div>
    </div>
    <input type="email" class="form-control" id="socialSlack">
  </div>
</div>
<div class="form-group col-md-4">
  <label for="socialDribbble">Dribbble</label>
  <div class="input-group input-group-seamless">
    <div class="input-group-prepend">
      <div class="input-group-text">
        <i class="fab fa-dribbble"></i>
      </div>
    </div>
    <input type="email" class="form-control" id="socialDribbble">
  </div>
</div>
<div class="form-group col-md-4">
  <label for="socialGoogle">Google Plus+</label>
  <div class="input-group input-group-seamless">
    <div class="input-group-prepend">
      <div class="input-group-text">
        <i class="fab fa-google-plus-g"></i>
      </div>
    </div>
    <input type="email" class="form-control" id="socialGoogle">
  </div>
</div>
</div>
<hr>
<div class="form-row mx-4">
<div class="col mb-3">
  <h6 class="form-text m-0">Notifications</h6>
  <p class="form-text text-muted m-0">Setup which notifications would you like to receive.</p>
</div>
</div>
<div class="form-row mx-4">
<label for="conversationsEmailsToggle" class="col col-form-label"> Conversations <small class="form-text text-muted"> Sends notification emails with updates for the conversations you are participating in or if someone mentions you. </small>
</label>
<div class="col d-flex">
  <div class="custom-control custom-toggle ml-auto my-auto">
    <input type="checkbox" id="conversationsEmailsToggle" class="custom-control-input" checked>
    <label class="custom-control-label" for="conversationsEmailsToggle"></label>
  </div>
</div>
</div>
<div class="form-row mx-4">
<label for="newProjectsEmailsToggle" class="col col-form-label"> New Projects <small class="form-text text-muted"> Sends notification emails when you are invited to a new project. </small>
</label>
<div class="col d-flex">
  <div class="custom-control custom-toggle ml-auto my-auto">
    <input type="checkbox" id="newProjectsEmailsToggle" class="custom-control-input">
    <label class="custom-control-label" for="newProjectsEmailsToggle"></label>
  </div>
</div>
</div>
<div class="form-row mx-4">
<label for="vulnerabilitiesEmailsToggle" class="col col-form-label"> Vulnerability Alerts <small class="form-text text-muted"> Sends notification emails when everything goes down and there's no hope left whatsoever. </small>
</label>
<div class="col d-flex">
  <div class="custom-control custom-toggle ml-auto my-auto">
    <input type="checkbox" id="vulnerabilitiesEmailsToggle" class="custom-control-input" checked>
    <label class="custom-control-label" for="vulnerabilitiesEmailsToggle"></label>
  </div>
</div>
</div>
