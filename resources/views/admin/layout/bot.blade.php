<div id="music-notify"></div>
<script src="{{asset('assets/admin/bundles/libscripts.bundle.js')}}"></script>
<script src="{{asset('assets/admin/bundles/vendorscripts.bundle.js')}}"></script>
<script src="{{asset('assets/admin/bundles/mainscripts.bundle.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/async/3.1.0/async.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.js"></script>

<script type="text/javascript">
    $(document).ready(function () {
       @if(Session:: has('fail'))
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        });
        Toast.fire({
        type: 'error',
        title: '{{ Session:: get('fail') }}'
        });
       @endif
       @if(Session:: has('success'))
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        });
        Toast.fire({
        type: 'success',
        title: '{{ Session:: get('success') }}'
        });
       @endif
       @if(Session:: has('login'))
        Swal.fire({
            type: 'success',
            title: '{{ Session:: get('login') }}',
            showConfirmButton: false,
        });
        @endif
    });
</script>     
<script>
    $(document).ready(function () {
        $('.delete').click(async function (e) { 
            e.preventDefault();
            var href = $(this).attr('href');
            const { value: success } = await Swal.fire({
            title: 'Bạn có chắc muốn xóa?',
            text: "Dữ liệu sẽ bị mất hoàn toàn!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Trở về',
            })

            if (success) {
                window.location = href;
            }
        });
    });
</script>

<script src="https://js.pusher.com/5.0/pusher.min.js"></script>
<script>

  // Enable pusher logging - don't include this in production
  Pusher.logToConsole = true;

  var pusher = new Pusher('8bb13050bd56dddd1572', {
    cluster: 'ap1',
    forceTLS: true
  });

  var channel = pusher.subscribe('my-channel');
  channel.bind('my-event', function(data) {
    $.toast({
                text: `<a href="/admin/order_detail/${data.message.id}">#BMHH19${data.message.id}</a>`,
                heading: 'Thông báo',
                icon: 'info',
                showHideTransition: 'fade',
                allowToastClose: true,
                hideAfter: 8000, 
                stack: 5, 
                position: 'bottom-right',
                
                textAlign: 'left',
                loader: true,
                loaderBg: '#9EC600',
                beforeShow: function () {},
                afterShown: function () {},
                beforeHide: function () {},
                afterHidden: function () {}
            })
    $("#music-notify").append('<audio src="{{asset("assets/admin/music/music-notify.mp3")}}" autoplay></audio>');
      $('.alert_notify').prepend(`<li>
                            <a href="/admin/order_detail/${data.message.id}">
                                <div class="icon-circle bg-amber"><i class="zmdi zmdi-shopping-cart"></i></div>
                                <div class="menu-info">
                                    <h4>#BMHH19${data.message.id}</h4>
                                    <p><i class="zmdi zmdi-time"></i>&emsp; 0 phút trước</p>
                                </div>
                            </a>
                        </li>`);
        $('.notify-order').prepend(`<tr>
        <td>#BMHH19${data.message.id}</td><td>${data.message.name}</td>
         <td>${data.message.tel}</td><td>${data.message.address}</td>
         <td>${data.message.total} vnđ</td>
        <td>${data.message.status}</td>
        <td width="17%" class="footable-last-visible" style="display: table-cell;">
        <a href="/admin/order_detail/${data.message.id}"><button class="btn btn-primary btn-sm editorder"><i class="zmdi zmdi-eye zmdi-hc-fw"></i>
        Xem</button></a><a class="delete" href="/admin/order/delete/${data.message.id}"><button
        class="btn btn-danger btn-sm"><i class="zmdi zmdi-delete"></i>Xóa</button></a></td></tr>`);
    // alert(JSON.stringify(data));
  });
</script>

