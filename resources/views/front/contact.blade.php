@extends('front.layouts.app')

@section('links')
  <link rel="stylesheet" href="{{ 'assets/front/css/components/contact.css' }}">
@endsection

@section('content')
<div class="dynamic-header">
    <h6>CONTACT</h6>
    <h4>Thoughts. Ideas. Opinion. News.</h4>
</div>
<x-front.contact></x-front.contact>
<div class="location">
  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3037.955360904597!2d49.861022274947224!3d40.40983967144069!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40307d2ac35434d3%3A0x6698e6d0c8f4de4a!2sCrazy%20Innovations!5e0!3m2!1sen!2saz!4v1691926600783!5m2!1sen!2saz" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</div>
@endsection