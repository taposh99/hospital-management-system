@extends('visitor.layout.master')


@section('content')

 <!-- single-ambulence area -->
 <div class="single-ambu">

   <div class="container">
     <div class="row">
       <div class="col-md-12">
         <div class="single-ambu-header">
           <div class="ambu-img">
             <img src="assets/img/ambu1.jpg" alt="">
           </div>
           <div class="pera">
             <p>এ্যাম্বুলেন্স একটি জরুরী সেবামূলক ব্যবস্থা। রোগীকে দ্রুত হাসপাতালে স্থানান্তর, মৃত দেহ পরিবহনে এ্যাম্বুলেন্সের প্রয়োজন সবার আগে। ঢাকা শহরে বেশ কয়েকটি বেসরকারী প্রতিষ্ঠান মানব সেবার লক্ষ্যে এ্যাম্বুলেন্স সার্ভিস পরিচালনা করছে। আলিফ এ্যাম্বুলেন্স সার্ভিস তাদের মধ্যে অন্যতম। ১৯৯০ সাল থেকে প্রতিষ্ঠানটি রোগী পরিবহন ও মৃত দেহ স্বজনদের কাছে পৌছে দেওয়ার কাজে নিয়োজিত। বর্তামানে এসি ও নন এসি মিলিয়ে মোট ১৪ টি এ্যাম্বুলেন্স দিয়ে আলিফ এ্যাম্বুলেন্স সার্ভিস  তাদের সেবা কার্যক্রম পরিচালনা করছে।</p>
           </div>
         </div>
       </div>
     </div>
     <div class="row">
       <div class="col-md-8">
          <div class="single-ambu-bottom">
           <h2>ভাড়ার হার</h2>
           <li><b>ক)</b>দূরত্ব ভেদে ঢাকার শহরের বিভিন্ন এলাকার ভাড়া বিভিন্ন রকম হয় এবং ঢাকার বাইরে ও দূরত্ব ভেদে ভিন্ন রকম হয়। এক সাথে মোট ভাড়া নির্ধারিত হয় বলে তেল বা গ্যাস, অক্সিজেন ও এসি ইত্যাদির খরচ আলাদা ভাবে দিতে হয় না।</li>
           <li><b>খ)</b> ঢাকার ভিতরের এ্যাম্বুলেন্সের ভাড়া তালিকা নিচে দেয়া হল</li>
           <table>
             <tr><th>স্থানের নাম</th><th>এসি ভাড়া</th><th>নন এসি ভাড়া</th></tr>
             <tr><td>গুলশান</td><td>১,০০০ টাকা</td><td>১,০০০ টাকা</td></tr>
             <tr><td>গুলশান</td><td>১,০০০ টাকা</td><td>১,০০০ টাকা</td></tr>
             <tr><td>গুলশান</td><td>১,০০০ টাকা</td><td>১,০০০ টাকা</td></tr>
             <tr><td>গুলশান</td><td>১,০০০ টাকা</td><td>১,০০০ টাকা</td></tr>
             <tr><td>গুলশান</td><td>১,০০০ টাকা</td><td>১,০০০ টাকা</td></tr>
             <tr><td>গুলশান</td><td>১,০০০ টাকা</td><td>১,০০০ টাকা</td></tr>
             <tr><td>গুলশান</td><td>১,০০০ টাকা</td><td>১,০০০ টাকা</td></tr>
           </table>
         </div>
       </div>
       <div class="col-md-4">
         <!-- book an appoinment -->
         <div class="appoinment-area " id="ambu-book">
            <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#demo">জরুরী বুকিং</button>
            <div id="demo" class="collapse">
              <form action="">
                <table>
                <tr><td>You can  hire ambulenc by call </td></tr>
                 <tr><td>+880177-2488816</td></tr>
                <tr><td><input type="text" placeholder="+8801xxxxxxxx"></td></tr>
                <tr><td><input type="submit" value="Requst for Book"></td></tr>
              </table>
              </form>
            </div>
             </div>
             <div class="ambu-area">
                 <div class="single-doc-lb text-center">
                 <h2><i class="fa fa-location-arrow" aria-hidden="true"></i>ঠিকানা ও অবস্থান</h2>
                 <h3>ঠিকানা- ৭৬/এ, নিচতলা এ-১, পশ্চিম পান্থপথ, ঢাকা- ১২১৫।</h3>
                 <p>পান্থপথের বসুন্ধরা সিটি শপিং মল থেকে পশ্চিম দিকে শমরিতা হাসপাতালের পূর্ব দিকে ১০০ গজ দূরে পান্থপথ চৌরাস্তা থেকে পশ্চিম দিকে ২০০ গজ দূরে ডান দিকে অবস্থিত।</p>
                 <li>Minimum <span>500tk</span></li>
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
<!-- footer-area -->
@stop
