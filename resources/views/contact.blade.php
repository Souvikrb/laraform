<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}" >
        <link rel="stylesheet" href="{{asset('css/style.css')}}" >
   
    </head>
    <body class="antialiased">
        <section class="container-fluid">
            <div class="row justify-content-md-center mt-3">
                <div class="col-md-6 m-auto">
                    <img class="img-fluid" src="{{asset('img/contact.png')}}">
                </div>
                <div class="col-md-6">
                    <form class="contact-form" method="post" action="{{url('/add')}}" enctype="multipart/form-data">
                      @csrf
                      <div class="form-group">
                        <label >Name*</label>
                        <input type="text" class="form-control" id="name"  placeholder="Enter your name" name="name" required="required">
                        <!-- <small id="emailHelp" class="form-text text-danger font-weight-bold">We'll never share your email with anyone else.</small> -->
                      </div>
                      <div class="form-group">
                        <label >Email*</label>
                        <input type="email" class="form-control" pattern="[a-zA-Z0-9.-_]{1,}@[a-zA-Z.-]{2,}[.]{1}[a-zA-Z]{2,}" id="email"  placeholder="Enter email" name="email" required="required">
                      </div>
                      <div class="form-group">
                        <label >Subject*</label>
                        <input type="text" class="form-control"  id="subject"  placeholder="Enter subject" name="subject" required="required">
                      </div>
                      <div class="form-group">
                        <label >Message*</label>
                        <textarea class="form-control"  id="message" placeholder="Enter you message" name="message" required="required"></textarea>
                      </div>
                      <div class="form-group">
                        <label >Date</label>
                        <input type="date" class="form-control" value="{{date('Y-m-d')}}"  id="date" name="date" >
                      </div>
                      <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label >Hour</label>
                                    <select class="form-control" name="hour" id="Hour">
                                        @for($i = 1;$i<=12;$i++)
                                            <option value="{{($i < 10)?'0'.$i:$i}}">{{($i < 10)?'0'.$i:$i}}</option>
                                        @endfor
                                    </select>
                                  </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label >Minute</label>
                                    <select class="form-control" name="minute" id="minute">
                                        @for($i = 0;$i<60;$i++)
                                            <option value="{{($i < 10)?'0'.$i:$i}}">{{($i < 10)?'0'.$i:$i}}</option>
                                        @endfor

                                    </select>
                                  </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label >&nbsp;</label>
                                    <select class="form-control" name="type" id="type">
                                        <option value="AM">AM</option>
                                        <option value="PM">PM</option>
                                    </select>
                                  </div>
                            </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label >Document</label>
                        <input type="file" class="form-control" id="file" name="file" >
                      </div>
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
                
            </div>
            
        </section>
    </body>
</html>
