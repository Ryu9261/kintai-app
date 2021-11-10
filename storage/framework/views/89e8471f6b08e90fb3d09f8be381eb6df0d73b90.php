        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            

            .links > a{
                color: #636b6f;
                padding: 0 25px;
                font-size: 30px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
<?php $__env->startSection('content'); ?>
<div class="content">
    

    
        
            <p><b><?php echo e($staff); ?></b></p>
            
            <table border="1" bgcolor="white" class="container-sm">
            <tr><th bgcolor="green">出勤</th><th bgcolor="red">退勤</th></tr>
                <?php $__currentLoopData = $times; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $time): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($time->s_time); ?></td>
                        <td><?php echo e($time->e_time); ?></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </table>
            <form action="<?php echo e(url('/attend/attendance/update')); ?>?staff=<?php echo e($staff); ?>" method="post">
            <?php echo csrf_field(); ?>
                <label>休憩時間：</label>
                <input type="text" name="time" size="1px">時間
                <p class="cyui">退勤時に休憩時間を打ち込んでから退勤してください。<br>例　1時間➡1，1時間30分➡1.5</p>
            <div class="container-lg">
                <a href="<?php echo e(url('/attend/attendance/edit')); ?>?staff=<?php echo e($staff); ?>" class="btn btn-primary">出勤</a>
                <!--<input type="hidden" value="<?php echo e($staff); ?>">-->
                <input type="submit" class="btn btn-primary" value="退勤">
                <!--<a href="<?php echo e(url('/attend/attendance/update')); ?>?staff=<?php echo e($staff); ?>">退勤</a>-->
            </form>
                <a id="btn" href="<?php echo e(url('/attend/attendance/delete')); ?>?staff=<?php echo e($staff); ?>" class="btn btn-primary">出勤/退勤消去</a>
                <!--<script>
                    var btn = document.getElementById('btn');
                    
                    btn.addEventListener('click', function() {
                    
                        window.confirm('最新の出勤情報を削除しますか？');
                    
                    })
                </script>-->
                <a href="<?php echo e(url('/attend')); ?>" class="btn btn-primary">スタッフ一覧へ</a>
            </div>
</div>
<!--<script>
var btn = document.getElementById('btn');
 
 btn.addEventListener('click', function() {
  
     window.confirm('最新の出勤情報を削除しますか？');
  
 })
</script>-->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\竜太朗\Desktop\kintai\resources\views/attendance.blade.php ENDPATH**/ ?>