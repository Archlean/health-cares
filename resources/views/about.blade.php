@extends('layouts.main')

@section('container')
    <div class="about-background">
        <div class="about-text-wrapper">
            <h1 class="about-text-header">About Us </h1>
            <h1></h1>
            <p class="about-text-body">
                Health Cares is a prescribing record online application for medicine record, we build this application to facilitate the patient to record their medicines to be purchased or ordered at a pharmacist or referral hospital. The application build with core function to record and print your medicine recipe, you also can make your own recipe based on our master signa medicine or select the available resep for each the symptoms of the disease you want.
                <br><br>
                Please contact us if you have something in mind
            </p>
            <div style="display: flex;">
                <div class="facebook-contact-picture">
                    <img src="{{ URL::to('/') }}/image/Facebook-Logo-Square-768x768.png" alt="facebook" width="40">
                </div>
                <p class="faceboot-contact-wrapper">Facebook:</p>
                <a style="margin: 10px; margin-left: 1px;" href="https://www.facebook.com">Visit us on Facebook!</a>
            </div>
            <div style="display: flex;">
                <div class="instagram-contact-picture">
                    <img src="{{ URL::to('/') }}/image/instagram-log.png" alt="instagram" width="40">
                </div>
                <p class="instagram-contact-wrapper">Instagram:</p>
                <a style="margin: 10px; margin-left: 1px;" href="https://www.instagram.com">Visit us on instagram!</a>
            </div>
            <div style="display: flex;">
                <div class="whatsapp-contact-picture">
                    <img src="{{ URL::to('/') }}/image/whatsapp_logo_icon_189219.png" alt="whatsapp" width="40">
                </div>
                <p class="whatsapp-contact-wrapper">WhatsApp: (+62) 822-8888-8888</p>
            </div>
        </div>
    </div>
@endsection