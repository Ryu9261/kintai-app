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
    <p>変更</p>
    <form action="/manager/timecard/edit?id=<?php echo e($time->id); ?>" method="post" class="container-sm">
        <table>
        <?php echo csrf_field(); ?>
        <tr>
            <th>
            出勤日:
            </th>
            <td>
            <input type="text" name="date" value="<?php echo e($time->date->format('Y-m-d')); ?>">
            </td>
        </tr>
        <tr>
            <th>
            出勤時刻:
            </th>
            <td>
            <input type="text" name="s_time" value="<?php echo e($time->s_time); ?>">
            </td>
        </tr>
        <tr>
            <th>
            退勤時刻:
            </th>
            <td>
            <input type="text" name="e_time" value="<?php echo e($time->e_time); ?>">
            </td>
        </tr>
        <tr>
            <th>
            労働時間:
            </th>
            <td>
            <input type="text" name="time" value="<?php echo e($time->time); ?>">
            </td>
        </tr>
        <tr>
            <th>
            </th>
            <td>
            <input type="submit" value="変更する">
            </td>
        </tr>
        </table>
  </form>
  <p>削除</p>
    <form action="/manager/timecard/delete?id=<?php echo e($time->id); ?>" method="post" class="container-sm">
        <table>
        <?php echo csrf_field(); ?>
        <tr>
            <th>
            出勤日:
            </th>
            <td>
            <input type="text" name="name" value="<?php echo e($time->date->format('Y-m-d')); ?>">
            </td>
        </tr>
        <tr>
            <th>
            </th>
            <td>
            <input type="submit" value="削除する">
            </td>
        </tr>
        </table>
  </form>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\竜太朗\Desktop\kintai\resources\views/timeUpdate.blade.php ENDPATH**/ ?>