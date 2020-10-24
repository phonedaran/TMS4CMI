@extends('queue-management.base')

<!-- @yield('content-wrapper') -->
<!-- @yield('script') -->
 
@section('content-wrapper')
<div class="row">
  <div class="col-lg-6">
    <h3>จัดคิวรถขนส่ง</h3>
  </div>
  <div class="col-lg-6 template-demo">
    <form action="queueManagement" method="post">
      <div class="form-group row">
        <div class="col-lg-8">
          <input type="text" name="search" class="form-control" placeholder="ค้นหาข้อมูล">
        </div>
        <div class="col-lg-2">
          <button type="submit" class="btn btn-inverse-dark btn-fw">ค้นหา</button>
        </div>
      </div>
    </form>
  </div>
  <div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <table class="table table-striped">
          <thead>
            <tr>
              <th>ลำดับ</th>
              <th>ชื่อพนักงานขับรถ</th>
              <th>ประเภทรถ</th>
              <th>หมายเลขรถ</th>
              <th>สถานที่</th>
              <th>เลขที่บิล</th>
            </tr>
          </thead>
          <tbody>
            {{$drivers}}
            {{$cars}}
            {{$bills}}
            <!-- @foreach($scheds as $row) -->
            @foreach($drivers as $driver)
            @foreach($cars as $car)
            @foreach($bills as $bill)
            <tr>
              <td>{{$row->id}}</td>
              <td>{{$driver->name}}</td>
              <td>{{$car->type}}</td>
              <td>{{$car->number}}</td>
              <td>{{$bill->dest}}</td>
              <td>{{$bill->trackNumber}}</td>
            </tr>
            @endforeach
            @endforeach
            @endforeach
            <!-- @endforeach -->
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <div class="row col-lg-12">
    <div class="col-lg-4"></div>
    <div class="col-lg-4">
      <button type="button" style="width:100%;font-size:20px;" class="btn btn-gradient-danger btn-icon-append" onclick="window.location.href = '{{url('/queueManagementInput')}}';">
        <i class="mdi mdi-note-plus"></i> เพิ่มคิวรถ
      </button>
    </div>
    <div class="col-lg-4"></div>
    <div class="col-lg-12"> <br /></div>
    <div class="col-lg-4"></div>
    <div class="col-lg-4">
      <button type="button" style="width:100%;font-size:20px;" class="btn btn-gradient-primary btn-icon-text">
        <i class="mdi mdi-file-check btn-icon-prepend"></i> ยืนยัน
      </button>
    </div>
    <div class="col-lg-4"></div>
  </div>
 
</div>

@endsection
@section('script')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script type="text/javascript">
  function fncAction0(billNum) {
    Swal.fire({
      title: 'ยืนยันข้อมูลการจัดคิวรถ?',
      icon: 'info',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'ใช่',
      cancelButtonText: 'ไม่'
    }).then((result) => {
      if (result.isConfirmed) {
        Swal.fire(
          'Deleted!',
          'Your file has been deleted.',
          'success'
        )
        setTimeout(function() {
          window.location.assign("/TMS4CMI/public/updateStatus?billNum=" + billNum);
        }, 2000);
      }
    });
  }
</script>
@endsection