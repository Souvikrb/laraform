<form class="contact-form" method="post" action="{{url('/add')}}" enctype="multipart/form-data">
  @csrf
  <div class="form-group">
    <label >Name*</label>
    <input type="text" class="form-control" id="name"  placeholder="Enter your name" name="name" required="required">
    @error('name')
    <small id="emailHelp" class="form-text text-danger font-weight-bold">{{ $message }}</small>
    @enderror
  </div>
  <div class="form-group">
    <label >Email*</label>
    <input type="email" class="form-control" pattern="[a-zA-Z0-9.-_]{1,}@[a-zA-Z.-]{2,}[.]{1}[a-zA-Z]{2,}" id="email"  placeholder="Enter email" name="email" value="{{old('email')}}" required="required">
    @error('email')
    <small id="emailHelp" class="form-text text-danger font-weight-bold">{{ $message }}</small>
    @enderror
  </div>
  <div class="form-group">
    <label >Subject*</label>
    <input type="text" class="form-control"  id="subject"  placeholder="Enter subject" name="subject" required="required" value="{{old('subject')}}">
    @error('subject')
    <small id="emailHelp" class="form-text text-danger font-weight-bold">{{ $message }}</small>
    @enderror
  </div>
  <div class="form-group">
    <label >Message*</label>
    <textarea class="form-control"  id="message" placeholder="Enter you message" name="message" required="required">{{old('message')}}</textarea>
    @error('message')
    <small id="emailHelp" class="form-text text-danger font-weight-bold">{{ $message }}</small>
    @enderror
  </div>
  <div class="form-group">
    <label >Date</label>
    @php $olddate = old('date') @endphp
    @php $date = ($olddate != '')?$olddate:date('Y-m-d') @endphp
    <input type="date" class="form-control" value="{{ $date }}"  id="date" name="date" >
    @error('date')
    <small id="emailHelp" class="form-text text-danger font-weight-bold">{{ $message }}</small>
    @enderror
  </div>
  <div class="form-group">
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label >Hour</label>
                <select class="form-control" name="hour" id="Hour">
                    @php $oldhour = old('hour') @endphp
                    @for($i = 1;$i<=12;$i++)
                        @php $hour = ($i < 10)?'0'.$i:$i @endphp
                        <option  <?=($oldhour == $hour)?'selected':''?> value="{{ $hour }}">{{ $hour }}</option>
                    @endfor
                </select>
                @error('hour')
                <small id="emailHelp" class="form-text text-danger font-weight-bold">{{ $message }}</small>
                @enderror
              </div>

        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label >Minute</label>
                @php $oldminute = old('minute') @endphp
                <select class="form-control" name="minute" id="minute">
                    @for($i = 0;$i<60;$i++)
                        @php $minute = ($i < 10)?'0'.$i:$i @endphp
                        <option <?=($oldminute == $minute)?'selected':''?> value="{{ $minute }}">{{ $minute }}</option>
                    @endfor

                </select>
                @error('minute')
                <small id="emailHelp" class="form-text text-danger font-weight-bold">{{ $message }}</small>
                @enderror
              </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label >&nbsp;</label>
                @php $oldtype = old('type') @endphp
                <select class="form-control" name="type" id="type">
                    <option <?=($oldtype == 'AM')?'selected':''?> value="AM">AM</option>
                    <option <?=($oldtype == 'PM')?'selected':''?> value="PM">PM</option>
                </select>
                @error('type')
                <small id="emailHelp" class="form-text text-danger font-weight-bold">{{ $message }}</small>
                @enderror
              </div>
        </div>
    </div>
  </div>
  <div class="form-group">
    <label >Document</label>
    <input type="file" class="form-control" id="file" name="file" >
    @error('file')
    <small id="emailHelp" class="form-text text-danger font-weight-bold">{{ $message }}</small>
    @enderror
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>