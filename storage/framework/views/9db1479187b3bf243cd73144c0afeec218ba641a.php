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
    <p>スタッフ変更</p>
    <form action="/manager/staff/edit?id=<?php echo e($staff->id); ?>" method="post">
        <table>
        <?php echo csrf_field(); ?>
        <tr>
            <th>
            氏名:
            </th>
            <td>
            <input type="text" name="name" value="<?php echo e($staff->name); ?>">
            </td>
        </tr>
        <tr>
            <th>
            雇用形態:
            </th>
            <td>
            <input type="text" name="e_status" value="<?php echo e($staff->e_status); ?>">
            </td>
        </tr>
        <tr>
            <th>
            時給（社員以外）:
            </th>
            <td>
            <input type="text" name="wage" value="<?php echo e($staff->wage); ?>">
            </td>
        </tr>
        <tr>
            <th>
            </th>
            <td>
            <input type="submit" value="send">
            </td>
        </tr>
        </table>
  </form>
  <p>スタッフ削除</p>
    <form action="/manager/staff/delete?id=<?php echo e($staff->id); ?>" method="post">
        <table>
        <?php echo csrf_field(); ?>
        <tr>
            <th>
            氏名:
            </th>
            <td>
            <input type="text" name="name" value="<?php echo e($staff->name); ?>">
            </td>
        </tr>
        <tr>
            <th>
            </th>
            <td>
            <input type="submit" value="send">
            </td>
        </tr>
        </table>
  </form>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\竜太朗\Desktop\kintai\resources\views/staffUpdate.blade.php ENDPATH**/ ?>