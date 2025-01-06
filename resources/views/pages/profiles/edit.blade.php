@extends('components.layout')

@section('content')

   <div class="container-fluid">
            <div class="row">
               <div class="col-lg-12">
                  <div class="d-flex align-items-center user-member__title mb-30 mt-30">
                     <h4 class="text-capitalize">Modifier son profile</h4>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-lg-12">
                  <div class="user-info-tab w-100 bg-white global-shadow radius-xl mb-50">
                     <div class="tab-content" id="v-pills-tabContent">
                        <div class="tab-pane fade  show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                           <div class="row justify-content-center">
                              <div class="col-xxl-4 col-10">
                                 <div class="mt-sm-40 mb-sm-50 mt-20 mb-20">
                                    <div class="user-tab-info-title mb-sm-40 mb-20 text-capitalize">
                                       <h5 class="fw-500">Informations personnelles</h5>
                                    </div>
                                    <div class="account-profile d-flex align-items-center mb-4 ">
                                       <div class="ap-img pro_img_wrapper">
                                          <input id="file-upload" type="file" name="fileUpload" class="d-none">
                                          <!-- Profile picture image-->
                                          <label for="file-upload">
                                             <img class="ap-img__main rounded-circle wh-120 bg-lighter d-flex" src="{{asset('img/author/profile.png')}}" alt="profile">
                                             <span class="cross" id="remove_pro_pic">
                                                <img src="{{asset('img/svg/camera.svg')}}" alt="camera" class="svg">
                                             </span>
                                          </label>
                                       </div>
                                       <div class="account-profile__title">
                                          <h6 class="fs-15 ms-20 fw-500 text-capitalize">Photo</h6>
                                       </div>
                                    </div>
                                    <div class="edit-profile__body">
                                       <form>
                                          <div class="form-group mb-25">
                                             <label for="name1">Nom complet</label>
                                             <input type="text" class="form-control" id="name1" placeholder="DIENG Ibrahima">
                                          </div>
                                          <div class="form-group mb-25">
                                             <label for="name2">Email</label>
                                             <input type="email" class="form-control" id="name2" placeholder="ibrahima.dieng150@gmail.com">
                                          </div>
                                          <div class="form-group mb-25">
                                             <label for="phoneNumber5">Contact</label>
                                             <input type="tel" class="form-control" id="phoneNumber5" placeholder="+225 07 78 08 7378">
                                          </div>
                                          <div class="form-group mb-25">
                                             <label for="name3">Adresse</label>
                                             <input type="text" class="form-control" id="name3" placeholder="Abidjan, Treichville">
                                          </div>
                                          <div class="button-group d-flex pt-sm-25 justify-content-md-end justify-content-start ">
                                             <button class="btn btn-light btn-default btn-squared fw-400 text-capitalize radius-md btn-sm">Annuler</button>
                                             <button class="btn btn-primary btn-default btn-squared text-capitalize radius-md shadow2 btn-sm">Modifier</button>
                                          </div>
                                       </form>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>

@endsection
