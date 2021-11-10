        <!-- Fonts -->
        <!--<link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">-->

        <!-- Styles -->
        <style>
            

            .content {
                text-align: center;
            }

            

            .links > a {
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
    <p><?php echo e($month); ?>月</p>
    <p>表示範囲を指定する</p>
        <form action="<?php echo e(url('/manager/timecard2')); ?>?staff=<?php echo e($staff); ?>" method="post">
        <?php echo csrf_field(); ?>
          <select  name="year">
            <option>2021</option>
                    <?php $__currentLoopData = $years; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $year): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <option value='<?php echo e($year); ?>'><?php echo e($year); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </select>  
          年
          <select  name="month">
            <option>01</option>
                <?php $__currentLoopData = $monthes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $month): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value='<?php echo e($month); ?>'><?php echo e($month); ?></option>";
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </select>
          月
          
          <input type="submit" value="表示">
        </form>
<table border="1" bgcolor="white" class="container-sm">
    <tr><th>変更・削除</th><th>出勤日</th><th bgcolor="green">出勤時</th><th bgcolor="red">退勤時</th><th bgcolor="yellow">勤務時間</th></tr>
    <?php $__currentLoopData = $times; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $time): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
        <td><a href="<?php echo e(url('/manager/timecard/edit')); ?>?id=<?php echo e($time->id); ?>">変更・削除</a></td>
        <td><?php echo e($time->date->format("Y-m-d")); ?></td>
        <td><?php echo e($time->s_time->format("H:i:s")); ?></td>
        <td><?php echo e($time->e_time->format("H:i:s")); ?></td>
        <td><?php echo e($time->time); ?></td>
        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</table>
<p>出勤日数：<?php echo e($days); ?>日</p>
<p>総労働時間：<?php echo e($total_time); ?>時間</p>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\竜太朗\Desktop\kintai\resources\views/timecard.blade.php ENDPATH**/ ?>