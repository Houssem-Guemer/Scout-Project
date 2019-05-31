<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="bootstrap admin template">
    <meta name="author" content="">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

    <link rel="stylesheet" href="css/app.css"/>
    <script src = "https://code.jquery.com/jquery-1.10.2.js"></script>

    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
    <title>تكليف بمهمة</title>
    <style>
        *{
            font-size: 14px;
            font-family: "Alarabiya Font",'Segoe UI', Tahoma, Geneva, Verdana,sans-serif !important;
        }
        .text-align-right{
            margin-right:0px
        }
        @page {

            margin-top:200px;
            margin-right: 0px;
            margin-left: 0px;

            margin-bottom: 200px;
            header: page-header;
            footer: page-footer;

        }
    </style>
</head>
<body>
<htmlpageheader name="page-header" style="display:block;position:absolute;top:0;margin-right:-120px ;float:right;margin-top: -100px;padding-top:-60px">
    <img src= src="{{ public_path() .'/images/page_header.png' }}" width="100%" height="180px" style="margin-top: -35px;"/>


</htmlpageheader>
<div style="margin-right: 60px;margin-left: 60px">

<div class="text-align-right" style="margin-top:20px">

    <p style="text-align: right;margin-right:-25px"><span>  رقــم  :</span><span>{{$data['outing_mail']}}  / 2019  </span></p>

</div>

<div style="margin-right:-25px;margin-bottom:30px">
    <h3 style="text-align: right;">  الموضوع : تكليف بمهمة </h3>
</div>
<div>

    <div style="text-align:right;margin-right:-25px;">
      <p style="text-align:right;" dir="rtl"> تحية كشفية وبعد : </p>
        <p><span>أنا الممضي أسفله السيد: <b>{{$data['fullname']}}</b></span>&nbsp;&nbsp;&nbsp;<span>الوظيفة الكشفية: <b>{{$data['scout_job']}}</b></span></p>
        <p><span>أكلف: السيد  <b>{{$data['charged']}}</b></span></p>
        <p><span>الحامل ل   <b>{{$data['paper_name']}} رقم </b></span>&nbsp; <span><b>{{$data['paper_code']}}</b></span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span>الصادرة عن دائرة : </span><b>{{$data['issued_by']}}</b></p>
        <p><span><b> المهمـة الموكلــة : </b></span><span>{{$data['mission']}}</span></p>
       <p><span>الرقم التسلسلي للمركبة : </span> <b>{{$data['serial_number']}}</b></p>




    </div>
    <div style="text-align:center">
        <h3> . على السلطات المدنية والعسكرية تسهيل مهمة حامل هذه الوثيقة  </h3>
    </div>
    <div style="margin-top:50px;overflow: hidden"  >
        <table style="width: 100%">
            <tr style="width: 100%">
                <td style="width:50%;padding-left:40px">   <p class="pull-left" style="display: inline;"> :  محـــافظ الفوج  </p><p>{{$data['fullname']}}</p></td>
                <td style="text-align: right;width:50%"> <p style="text-align: right;float: right;display: inline">ختم الجهة المستقبلة  </p></td>

            </tr>
            <tr>
                <td style="width:50%;">
                    <div >
                        <img src= src="{{ public_path() .'/images/cachet.png' }}" width="200" height="200" />
                    </div>
                </td>
                <td></td>
            </tr>
        </table>


    </div>


</div>
</div>



<htmlpagefooter name="page-footer" >
    <img src= src="{{ public_path() .'/images/page_footer.png' }}" width="100%" height="180px" style="margin-bottom:-35px;" />
</htmlpagefooter>

<div>

</div>
</body>
</html>
