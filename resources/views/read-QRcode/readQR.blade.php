@extends('queue-management.base')

<!-- @yield('content-wrapper') -->
<!-- @yield('script') -->

@section('content-wrapper')
<h2>อัปเดตสถานะการขนส่ง</h2><br />
<div class="col-md-12 grid-margin stretch-card">
  @foreach ($bill as $b)
  <div class="card">
    <div class="card-body">
      <div class="form-group row">
        <div class="col-lg-2"></div>
        <h3 class="col-sm-2 col-form-label">เลขที่บิล</h3>
        <div class="col-lg-6">
          <input type="text" class="form-control" style="font-size: 15px;" value="{{$b->trackNumber}}" readonly>
        </div>
        <div class="col-lg-2"></div>
      </div>
      <div class="form-group row">
        <div class="col-lg-2"></div>
        <h3 class="col-sm-2 col-form-label">ชื่อลูกค้า</h3>
        <div class="col-lg-6">
          <input type="text" class="form-control" style="font-size: 15px;" value="{{$name[0]->name}}" readonly>
        </div>
        <div class="col-lg-2"></div>
      </div>
      <div class="form-group row">
        <div class="col-lg-2"></div>
        <h3 class="col-sm-2 col-form-label">สถานะปัจจุบัน</h3>
        <div class="col-lg-6">
          <?php
          if ($b->status == 'order') {
            $status = 'รับออเดอร์เข้าระบบ';
          } elseif ($b->status == 'processing') {
            $status = "กำลังจัดเตรียมสินค้า";
          } elseif ($b->status == 'shipping') {
            $status = "อยู่ระหว่างการขนส่ง";
          } else {
            $status = "จัดส่งเรียบร้อยแล้ว";
          }
          ?>
          <input type="text" class="form-control" style="font-size: 15px;" value="{{$status}}" readonly>
        </div>
        <div class="col-lg-2"></div>
      </div>
      <form action="updateStatus" method="POST">
        <div class="row">
          <div class="col-lg-3"></div>

          @csrf
          <input type="hidden" name="billNum" value="{{$b->trackNumber}}" />
          <input type="hidden" name="billStatus" value="{{$b->status}}" />
          @if ($b->status != 'complete')
          <button type="submit" class="btn btn-gradient-primary btn-lg btn-block col-lg-6" style="font-size: 20px;"> อัปเดตสถานะ </button>
          @endif

          <div class="col-lg-3"></div>
        </div>
      </form>
    </div>
  </div>
  @endforeach
  @endsection

  @section('script')
  <!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
  <script type="text/javascript">
    function fncAction0(billNum,billStatus) {
      Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
          if (result.isConfirmed) {
            Swal.fire(
              'Deleted!',
              'Your file has been deleted.',
              'success'
            )
            setTimeout(function(billNum) {
              window.location.assign("{{URL::to('/updateStatus?billNum=')}}" + billNum)
              window.location.assign("{{URL::to('/updateStatus?billStatus=')}}" + billStatus);
            }, 2000);
            setTimeout(function(billStatus) {
              window.location.assign("{{URL::to('/updateStatus?billStatus=')}}" + billStatus);
            }, 2000);
          
        }
      })
    }
  </script> -->
  @endsection