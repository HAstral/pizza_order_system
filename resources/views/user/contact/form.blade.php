@extends('user.layouts.master')

@section('content')
  <div class="contact-form py-5 ">
    <div class="container-lg">
      <div class="row">
        <div class="">
            <h2>Contact Page</h2>
        </div>
        <div class="col-md-12">
            <form action="{{route('user#contact')}}" method="post">
                @csrf
                <div class="row mb-3">
                    <div class="col-lg-6">
                      <input type="text" name="name" value="{{Auth::user()->name}}" placeholder="Eစnter Your Name" class="  form-control mb-3 mb-lg-0 form-control-lg bg-white fs-6 border-2">
                    </div>
                    <div class="col-lg-6">
                      <input type="text" name="email" value="{{Auth::user()->email}}" placeholder="Your Email" class="  form-control  form-control-lg bg-white fs-6 border-2">
                    </div>
                  </div>
                  <div class="row mb-3">
                    <div class="col-lg-12">
                      <textarea name="message" class="form-control form-control-lg  bg-whitefs-6 border-2" placeholder="Text anything you want to say..." cols="30" rows="10"></textarea>
                    </div>
                  </div>
                  <button type="submit" class="btn btn-primary col-3 offset-9">Send Message <i class="fa-solid fa-paper-plane ms-2"></i></button>
            </form>
        </div>
      </div>
    </div>
  </div>


@endsection
