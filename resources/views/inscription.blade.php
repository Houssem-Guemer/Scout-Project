@extends('layouts.new_template')
@section('content')
<link rel="stylesheet" type="text/css" href="/css/inscription.css" />
<section class="body-section" dir="rtl">
    <div class="main" >
        <div class="container">
            <div class="signup-content">
                <div class="signup-img">
                    <img src="images/bg.png" alt="">
                </div>
                <div class="signup-form">
                    <form method="POST" class="register-form" id="register-form">
                        <h2>تسجيلات سنة 2019-2020</h2>
                        <div class="form-row">
                            <div class="form-group">
                                <label for="name">الاسم :</label>
                                <input type="text" name="first_name" id="name" required oninvalid="this.setCustomValidity('يرجى ادخال هذه المعلومة')"/>
                            </div>
                            <div class="form-group">
                                <label for="last_name">اللقب :</label>
                                <input type="text" name="last_name" id="father_name" required oninvalid="this.setCustomValidity('يرجى ادخال هذه المعلومة')"/>
                            </div>
                        </div>
                      
                        <div class="form-row">
                            <div class="form-group">
                                <label for="first_lname"> الاسم باللاتينية   :</label>
                                <input type="text" name="first_lname" id="first_lname" required oninvalid="this.setCustomValidity('يرجى ادخال هذه المعلومة')"/>
                            </div>
                            <div class="form-group">
                                <label for="last_lname">اللقب باللاتينية:</label>
                                <input type="text" name="last_lname" id="last_lname" required oninvalid="this.setCustomValidity('يرجى ادخال هذه المعلومة')"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="address">العنوان :</label>
                            <input type="text" name="address" id="address" required oninvalid="this.setCustomValidity('يرجى ادخال هذه المعلومة')"/>
                        </div>
                 
                          <div class="form-row">
                            <div class="form-group">
                            <label for="birth_date">تاريخ الميلاد :</label>
                            <input type="date" name="birth_date" id="birth_date" dir="rtl">
                        </div>
                            <div class="form-group">
                                <label for="place_of_birth">مكان الميلاد :</label>
                                <input type="text" name="place_of_birth" id="place_of_birth" required oninvalid="this.setCustomValidity('يرجى ادخال هذه المعلومة')"/>
                            </div>
                        </div>
                
                        
                      
                        <div class="form-group">
                            <label for="phone">الهاتف :</label>
                            <input type="text" name="phone" id="phone" required oninvalid="this.setCustomValidity('يرجى ادخال هذه المعلومة')">
                        </div>
                    
                        <div class="form-group">
                            <label for="email"> البريد الالكتروني :</label>
                            <input type="email" name="email" id="email" />
                        </div>
                        <div class="form-submit">
                           
                            <input type="submit" value="تسجيل" class="submit" name="submit" id="submit" />
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</section>

    @endsection
@section('styles')
    <link rel="stylesheet" href="/css/main.css">
@endsection
@section('og')
    <meta property="og:title" content="الموقع الرسمي لفوج الفلاح" />
    <meta property="og:image" content="https://scontent-cdg2-1.xx.fbcdn.net/v/t1.0-9/18835730_1701449486822767_2312127021052390335_n.jpg?_nc_cat=110&_nc_ht=scontent-cdg2-1.xx&oh=cd825a0c4d827b279c38b8729d706544&oe=5C4062E0" />
    <meta property="og:description" content="تربية النشأ و تحقيق استمرارية الفوج و الأفراد من أجل الانتشار الأوسع في المجتمع من خلال تأسيس كشفية جديدة" />
    <meta property="og:type" content="website" />
@endsection
@section('title')
    <title> تسجيلات سنة 2019-2020 </title>
    <meta name="description" content="تربية النشأ و تحقيق استمرارية الفوج و الأفراد من أجل الانتشار الأوسع في المجتمع من خلال تأسيس كشفية جديدة">
@endsection
@section('icon')
    <link rel="icon" href="{{{ asset('/images/landing_page_Logo.png') }}}" >
@endsection