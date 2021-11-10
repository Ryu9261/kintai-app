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
<table border="1" bgcolor="white" class="container-sm">
        <tr><th>氏名</th><th>時給</th><th>労働時間</th><th>給与</th></tr>
            <?php $i = 0 ?>
            <?php $__currentLoopData = $staffes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $staff): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td> <?php echo e($staff->name); ?> </td>
                    <td> <?php echo e($staff->wage); ?> 円 </td>
                    <td> <?php echo e($staff->t_time); ?> 時間</td>
                    <td> <?php echo e($wages[$i]); ?> 円</td>
                </tr>
                <?php $i++ ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </table>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\竜太朗\Desktop\kintai\resources\views/wage.blade.php ENDPATH**/ ?>