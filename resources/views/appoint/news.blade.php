@extends('template_nav')
@section('title','Appointment')
@section('content')
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap-news.css')}}">
  </head>
  <body>
<script src="{{ asset('js/news.js') }}"></script>
<div class="news-section"> 
    <div class="container"> 
        <div class="col-md-3 news-column">
                      <img class="img-responsive" src="image/1.jpg" title="name">
                      <h4>12 อาหารบำรุงเส้นผม</h4>
                      <p>เส้นผมของคนเรามีวงจรการงอกใหม่และผลัดผมเก่าออกวนเวียนกันอยู่ภายในช่วง 2 เดือน สำหรับกระบวนทั้งหมดของแต่ละเส้น เป็นเรื่องปกติที่คนเราจะมีผมร่วงทุกวัน แต่เราสามารถทำให้ผมกลับมายาวและสวยได้อย่างเดิมด้วยอาหาร 12 ชนิด</p>
                      <a class="news-btn" href="" data-toggle="modal" data-target="#myModal">อ่านต่อ</a>
                    </div>
        <div class="col-md-3 news-column">
                      <img class="img-responsive" src="image/2.jpg" title="name">
                      <h4>10 เมคอัพทริค</h4>
                      <p>Do & Don't 10 ข้อ ที่ควรรู้ เพราะการแต่งหน้าก็มีสิ่งที่ควรหลีกเลี่ยง สิ่งไหนควรทำ สิ่งไหนไม่ควรทำ ไปดูกันค่ะ</p>
                      <a class="news-btn" href="" data-toggle="modal" data-target="#myModal1">อ่านต่อ</a>
                    </div>
        <div class="col-md-3 news-column">
                      <img class="img-responsive" src="image/3.jpg" title="name">
                      <h4>ทาเล็บสีอะไรดี ให้เข้ากับสีผิวมากที่สุด</h4>
                      <p>เล็บถือเป็นเสน่ห์แบบหนึ่งเลยก็ว่าได้นะสำหรับสาวๆ อย่างเราๆ ค่ะ เพราะมันสามารถแต่งเติมสีสัน ลวดลายลงไปบนเล็บมือได้แต่ก็หลายครั้งนะเวลาจะทาสีเล็บทั้งทีก็ไม่รู้จะทาสีอะไรทาไปแล้วมันจะเข้ากับนิ้วมือเรา สีผิวเราไหม วันนี้ทางร้านมีเทคนิคการเลือกสีเล็บให้เข้ากับสีผิวมาฝากกันค่ะ</p>
                      <a class="news-btn" href="" data-toggle="modal" data-target="#myModal2">อ่านต่อ</a>
                    </div>
        <div class="col-md-3 news-column">
                      <img class="img-responsive" src="https://images.pexels.com/photos/7096/people-woman-coffee-meeting.jpg?w=940&h=650&auto=compress&cs=tinysrgb" title="name">
                      <h4>LOREM IPSUM DOLO</h4>
                      <p>here are many variations of passages of Lorem Ipsum available,</p>
                      <a class="news-btn" href="#">More info</a>
                    </div>
                    
  </div>      
  </div>




  <!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
        <h4 class="modal-title" id="myModalLabel">12 อาหารบำรุงเส้นผมให้สวยเงางาม หลังผมร่วง </h4>
      </div>
      <div class="modal hide" id="myModal">
         
            <button type="button" class="close" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i>
</button>
            
          </div>
          <div class="modal-body" >
          <li>ปลาแซลมอน </li>   
          <li>เม็ดอัลมอนด์</li>
          <li>ถั่วต่าง ๆ</li>
          <li>ผักใบเขียวเข้ม</li>
          <li>ธัญพืชต่างๆ</li>
          <li>ไข่</li>
          <li>เนื้อปลา</li>
          <li>นมและผลิตภัณฑ์จากนม</li>
          <li>หอยนางรม</li>
          <li>ส้ม</li>
          <li>แครอท</li>
          <li>ข้าวโอ๊ต</li>
          </div>
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i>
 Close</button>
       
      </div>
    </div>
  </div>
</div>



<div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
        <h4 class="modal-title" id="myModalLabel">10 เมคอัพทริค ที่สาวรักการแต่งหน้าห้ามพลาด</h4>
      </div>
      <div class="modal hide" id="myModal1">
         
            <button type="button" class="close" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i>
</button>
            
          </div>
          <div class="modal-body" >
            <li>รองพื้นควรทามอยเจอไรซ์เซอร์ก่อนลงรองพื้นไม่ควรลงรองพื้นหนักเกินไป และผิดเบอร์ เพราะจะทำให้หน้าดูหนาและลอย</li>
            <li>คอนซีลเลอร์ควรลงคอนซีลเลอร์ที่สว่างกว่ารองพื้น 1-2 เฉดไม่ควรใช้นิ้วถูคอนซีลเลอร์บริเวณถุงใต้ตา เพราะจะทิ้งริ้วรอยใต้ตา</li>
            <li>เฉดดิ้งควรเฉดแนวตั้งเพื่อให้ใบหน้าดูเรียวขึ้นไม่ควรเฉดเข้มไป เพราะกลางแจ้งจะทำให้ดูเข้มเกินงาม</li>
            <li>ไฮไลท์ควรลงไฮไลท์บริเวณหน้าผาก แก้มใต้ตา สันจมูก แก้ม จมูก และคางไม่ควรไฮไลท์บริเวณพวงแก้ม เพราะจะทำให้เห็นรูขุมขนกว้างขึ้น</li>
            <li>เขียนคิ้วควรใช้สีที่อ่อนกว่าสีผม 1-2 เฉดไม่ควรเขียนคิ้วหนาเพราะนอกจากไม่ได้รูปทรงแล้วยังกลายเป็นปลิง</li>
            <li>ขนตาควรดัดขนตาก่อนปัดมาสคาร่าไม่ควรใช้ขนตาปลอมที่เส้นใหญ่ เพราะไม่เป็นธรรมชาติและจะทำให้หนักตา</li>
            <li>อายแชร์โดว์ควรแต่งเงาที่เปลือกตาและเบลนด์สีให้เนียนไม่ควรทาชิมเมอร์บริเวณรอยพับตาเพราะจะทำให้ตามีรอยย่น
            </li>
            <li>อายไลเนอร์ควรกรีดเส้นเล็กชิดขอบตาไม่ควรลากหางตาลงเพราะจะทำให้ตาตก</li>
            <li>ลิปควรลงลิปไพรเมอร์หรือวาสลีนก่อนเพื่อปากที่เนียนทำให้ลิปไม่ตกร่องไม่ควรทาลิปโดยลงน้ำหนักแรงภายในครั้งเดียว ค่อย ๆ ทาทีละน้อย เพราะจะลบยากและทำให้ดูเลอะเทอะ</li>
            <li>แปรงแต่งหน้าควรใช้แปรงให้ถูกกับการใช้งานไม่ควรใช้แปรงที่สกปรก ให้ทำความสะอาดแปรงเป็นประจำ เพราะความสกปรกเป็นบ่อเกิดของสิว</li>
          </div>
          
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i>
 Close</button>
      </div>
    </div>
  </div>
</div>




<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
        <h4 class="modal-title" id="myModalLabel">10 เมคอัพทริค ที่สาวรักการแต่งหน้าห้ามพลาด</h4>
      </div>
      <div class="modal hide" id="myModa2">
         
            <button type="button" class="close" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i>
</button>
            
          </div>
          <div class="modal-body" >
            <li>รองพื้นควรทามอยเจอไรซ์เซอร์ก่อนลงรองพื้นไม่ควรลงรองพื้นหนักเกินไป และผิดเบอร์ เพราะจะทำให้หน้าดูหนาและลอย</li>
            <li>คอนซีลเลอร์ควรลงคอนซีลเลอร์ที่สว่างกว่ารองพื้น 1-2 เฉดไม่ควรใช้นิ้วถูคอนซีลเลอร์บริเวณถุงใต้ตา เพราะจะทิ้งริ้วรอยใต้ตา</li>
            <li>เฉดดิ้งควรเฉดแนวตั้งเพื่อให้ใบหน้าดูเรียวขึ้นไม่ควรเฉดเข้มไป เพราะกลางแจ้งจะทำให้ดูเข้มเกินงาม</li>
            <li>ไฮไลท์ควรลงไฮไลท์บริเวณหน้าผาก แก้มใต้ตา สันจมูก แก้ม จมูก และคางไม่ควรไฮไลท์บริเวณพวงแก้ม เพราะจะทำให้เห็นรูขุมขนกว้างขึ้น</li>
            <li>เขียนคิ้วควรใช้สีที่อ่อนกว่าสีผม 1-2 เฉดไม่ควรเขียนคิ้วหนาเพราะนอกจากไม่ได้รูปทรงแล้วยังกลายเป็นปลิง</li>
            <li>ขนตาควรดัดขนตาก่อนปัดมาสคาร่าไม่ควรใช้ขนตาปลอมที่เส้นใหญ่ เพราะไม่เป็นธรรมชาติและจะทำให้หนักตา</li>
            <li>อายแชร์โดว์ควรแต่งเงาที่เปลือกตาและเบลนด์สีให้เนียนไม่ควรทาชิมเมอร์บริเวณรอยพับตาเพราะจะทำให้ตามีรอยย่น
            </li>
            <li>อายไลเนอร์ควรกรีดเส้นเล็กชิดขอบตาไม่ควรลากหางตาลงเพราะจะทำให้ตาตก</li>
            <li>ลิปควรลงลิปไพรเมอร์หรือวาสลีนก่อนเพื่อปากที่เนียนทำให้ลิปไม่ตกร่องไม่ควรทาลิปโดยลงน้ำหนักแรงภายในครั้งเดียว ค่อย ๆ ทาทีละน้อย เพราะจะลบยากและทำให้ดูเลอะเทอะ</li>
            <li>แปรงแต่งหน้าควรใช้แปรงให้ถูกกับการใช้งานไม่ควรใช้แปรงที่สกปรก ให้ทำความสะอาดแปรงเป็นประจำ เพราะความสกปรกเป็นบ่อเกิดของสิว</li>
          </div>
          
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i>
 Close</button>
      </div>
    </div>
  </div>
</div>



  </body>
@endsection