@extends('components.layout')

@section('content')

<div class="container-fluid">
    <div class="profile-content mb-50">
       <div class="row">
          <div class="col-lg-12">

             <div class="breadcrumb-main">
                <h4 class="text-capitalize breadcrumb-title">My profile</h4>
                <div class="breadcrumb-action justify-content-center flex-wrap">
                   <nav aria-label="breadcrumb">
                      <ol class="breadcrumb">
                         <li class="breadcrumb-item"><a href="#"><i class="uil uil-estate"></i>Home</a></li>
                         <li class="breadcrumb-item active" aria-current="page">My profile</li>
                      </ol>
                   </nav>
                </div>
             </div>

          </div>
          <div class="col-lg-12 col-md-4  ">
             <aside class="profile-sider">
                <!-- Profile Acoount -->
                <div class="card mb-25">
                   <div class="card-body text-center pt-sm-30 pb-sm-0  px-25 pb-0">

                      <div class="account-profile">
                         <div class="ap-img w-100 d-flex justify-content-center">
                            <!-- Profile picture image-->
                            <img class="ap-img__main rounded-circle mb-3  wh-120 d-flex bg-opacity-primary" src="{{asset('img/author/profile.png')}}" alt="profile">
                         </div>
                         <div class="ap-nameAddress pb-3 pt-1">
                            <h5 class="ap-nameAddress__title">Duran Clayton</h5>
                            <p class="ap-nameAddress__subTitle fs-14 m-0">UI/UX Designer</p>
                            <p class="ap-nameAddress__subTitle fs-14 m-0">
                               <img src="{{asset('img/svg/map-pin.svg')}}" alt="map-pin" class="svg">London, England
                            </p>
                         </div>
                         <div class="ap-button button-group d-flex justify-content-center flex-wrap mb-4">
                            <button type="button" class="border text-capitalize px-25 color-gray transparent radius-md">
                               <img class="svg" src="{{asset('img/svg/mail.svg')}}" alt="mail">message</button>


                            <button class="btn btn-primary btn-default btn-squared text-capitalize  px-25"><img src="{{asset('img/svg/user-plus.svg')}}" alt="user-plus" class="svg">
                               follow
                            </button>
                         </div>
                      </div>
                   </div>
                </div>
                <!-- Profile Acoount End -->

                <!-- Profile User Bio -->
                <div class="card mb-25">
                   <div class="user-bio border-bottom">
                      <div class="card-header border-bottom-0 pt-sm-30 pb-sm-0  px-md-25 px-3">
                         <div class="profile-header-title">
                            User Bio
                         </div>
                      </div>
                      <div class="card-body pt-md-1 pt-0">
                         <div class="user-bio__content">
                            <p class="m-0">Nam malesuada dolor tellus pretium amet was hendrerit facilisi id
                               vitae enim
                               sed ornare
                               there suspendisse sed orci neque ac sed aliquet risus faucibus in pretium
                               molestie nisl
                               tempor quis odio habitant.</p>
                         </div>
                      </div>
                   </div>
                   <div class="user-info border-bottom">
                      <div class="card-header border-bottom-0 pt-sm-25 pb-sm-0  px-md-25 px-3">
                         <div class="profile-header-title">
                            Contact info
                         </div>
                      </div>
                      <div class="card-body pt-md-1 pt-0">
                         <div class="user-content-info">
                            <p class="user-content-info__item">
                               <img class="svg" src="{{asset('img/svg/mail.svg')}}" alt="mail">Clayton@example.com
                            </p>
                            <p class="user-content-info__item">
                               <img src="{{asset('img/svg/phone.svg')}}" alt="phone" class="svg">+44 (0161) 347
                               8854
                            </p>
                            <p class="user-content-info__item mb-0">
                               <img src="{{asset('img/svg/globe.svg')}}" alt="globe" class="svg">www.example.com
                            </p>
                         </div>
                      </div>
                   </div>
                   <div class="user-skils border-bottom">
                      <div class="card-header border-bottom-0 pt-sm-25 pb-sm-0  px-md-25 px-3">
                         <div class="profile-header-title">
                            Skills
                         </div>
                      </div>
                      <div class="card-body pt-md-1 pt-0">
                         <ul class="user-skils-parent">
                            <li class="user-skils-parent__item">
                               <a href="#">UI/UX</a>
                            </li>
                            <li class="user-skils-parent__item">
                               <a href="#">Branding</a>
                            </li>
                            <li class="user-skils-parent__item">
                               <a href="#">product design</a>
                            </li>
                            <li class="user-skils-parent__item">
                               <a href="#">Application</a>
                            </li>
                            <li class="user-skils-parent__item mb-0">
                               <a href="#">web design</a>
                            </li>
                         </ul>
                      </div>
                   </div>
                </div>
                <!-- Profile User Bio End -->
             </aside>
          </div>
       </div>
    </div>
 </div>

@endsection
